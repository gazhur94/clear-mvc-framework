<?php

namespace Acme\Models;

use Acme\Database\QueryBuilder;

class Model extends QueryBuilder
{

    /**
     * Return DB connection singleton object
     *
     * @return \Acme\Database\Connection|null
     */
    public function db()
    {
        return $this->db;
    }

    /**
     * Return validation rules from Model
     *
     * @return mixed
     */
    public static function rules()
    {
        return static::$rules;
    }
}