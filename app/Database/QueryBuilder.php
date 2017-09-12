<?php

namespace Acme\Database;

class QueryBuilder
{
    protected $db;

    private $sql = '';

    public function __construct()
    {
        $this->db = Connection::get();
    }

    private function getModelName()
    {
        $namespaces = explode('\\', get_class($this));
        return $namespaces[count($namespaces) - 1];
    }

    private function getTable()
    {
        if(isset($this->table)) {
            return $this->table;
        }
        return strtolower($this->getModelName()) . 's';
    }

    public function table($table) {
        $this->table = $table;
        return $this;
    }


    public function query($sql, $values = []) {

//        dump($sql);

        if ($query = $this->db->prepare($sql)) {
            if ($query->execute($values)) {
                $queryVerb = explode(' ', $sql)[0];
                if ($queryVerb == 'SELECT') {
//                    if ($query->rowCount()) {
                    $data = $query->fetchAll(\PDO::FETCH_OBJ);
//                        $data = $query->fetchAll(\PDO::FETCH_CLASS, 'Acme\\Database\\Data');
                    $result = new Data;
                    foreach ($data as $key => $item) {
                        $result->{$key} = $item;
                    }
                    return $result;
//                    }
//                    return null;
                } else if ($queryVerb == 'INSERT') {
                    return $this->db->lastInsertId();
                }
                return true;
            }
        }
        return false;
    }

    public function insert($fields) {
        $fieldsArray = array_keys($fields);
        $valuesArray = array_values($fields);

        $table = $this->getTable();

        $values = '\'' . implode('\', \'', $valuesArray) . '\'';

        $sql = "INSERT INTO {$table} (" . implode(', ', $fieldsArray) . ') VALUES (' . $values . ')';
        return $this->query($sql);
    }

    //update method!!!
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

    public function delete()
    {
        $this->sql = "DELETE FROM {$this->getTable()}" . $this->sql;
        return $this->query($this->sql);
    }

    public function truncate() {
        return $this->query("TRUNCATE {$this->getTable()}");
    }

}