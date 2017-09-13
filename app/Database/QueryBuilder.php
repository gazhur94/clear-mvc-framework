<?php

namespace Acme\Database;

class QueryBuilder
{
    /**
     * @var Connection|null
     */
    protected $db;

    /**
     * Current SQL string
     * @var string
     */
    private $sql = '';

    /**
     * Get connection to DB
     * QueryBuilder constructor
     */
    public function __construct()
    {
        $this->db = Connection::get();
    }

    /**
     * Return model name that call QueryBuilder
     * @return mixed
     */
    private function getModelName()
    {
        $namespaces = explode('\\', get_class($this));
        return $namespaces[count($namespaces) - 1];
    }

    /**
     * Return DB table
     * @return string
     */
    private function getTable()
    {
        if(isset($this->table)) {
            return $this->table;
        }
        return strtolower($this->getModelName()) . 's';
    }

    /**
     * Set table
     *
     * @param $table
     * @return $this
     */
    public function table($table) {
        $this->table = $table;
        return $this;
    }

    /**
     * Preparing and Executing given SQL string
     *
     * @param $sql
     * @param array $values
     * @return array|bool|null|string
     */
    public function query($sql, $values = []) {

        //dump($sql);

        /** Resete sql string after preparing */
        $this->sql = '';

        if ($query = $this->db->prepare($sql)) {
            if ($query->execute($values)) {
                $queryVerb = explode(' ', $sql)[0];
                if ($queryVerb == 'SELECT' || $queryVerb == 'SHOW') {
                    if ($query->rowCount()) {
                        return $query->fetchAll(\PDO::FETCH_CLASS, 'Acme\\Database\\Data');
                    }
                    return null;
                } else if ($queryVerb == 'INSERT') {
                    return $this->db->lastInsertId();
                }
                return true;
            }
        }
        return false;
    }

    /**
     * Inserting array with data to DB
     *
     * @param $fields
     * @return array|bool|null|string
     */
    public function insert($fields) {
        $fieldsArray = array_keys($fields);
        $valuesArray = array_values($fields);

        $table = $this->getTable();

        $values = '\'' . implode('\', \'', $valuesArray) . '\'';

        $sql = "INSERT INTO {$table} (" . implode(', ', $fieldsArray) . ') VALUES (' . $values . ')';
        return $this->query($sql);
    }

    /**
     * Updating DB data
     *
     * @param $set
     * @param array $parameters
     * @return array|bool|null|string
     */
    public function update($set, $parameters = [])
    {

        $updatable = [];
        foreach ($set as $field => $value) {
            $updatable[] = "{$field} = '{$value}'";
        }
        $set = implode(', ', $updatable);

        $this->sql = "UPDATE {$this->getTable()} SET {$set}" . $this->sql;

        return $this->query($this->sql, $parameters);
    }

    /**
     * Add WHERE condition to SQL
     *
     * @param array $conditions
     * @return $this
     */
    public function where(array $conditions)
    {

        $where = [];
        foreach($conditions as $field => $value) {
            $where[] = "{$field} = '{$value}'";
        }
        $where = implode(' AND ', $where);

        $this->sql .= ' WHERE ' . $where;

        return $this;
    }

    /**
     * Read data from SQL
     *
     * @param array ...$fields
     * @return array|bool|null|string
     */
    public function select(...$fields)
    {
        if (empty($fields)) {
            $fields = '*';
        } else {
            $fields = implode(', ', $fields);
        }

        $this->sql = "SELECT $fields FROM {$this->getTable()}" . $this->sql;

        return $this->query($this->sql);
    }

    /**
     * Delete data from DB
     * @return bool
     */
    public function delete()
    {
        $this->sql = "DELETE FROM {$this->getTable()}" . $this->sql;
        return $this->query($this->sql);
    }

    /**
     * Truncate DB table
     *
     * @return bool
     */
    public function truncate() {
        return $this->query("TRUNCATE {$this->getTable()}");
    }

}