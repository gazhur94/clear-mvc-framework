<?php

namespace Acme\Models;

use Acme\Database\QueryBuilder;

class Model extends QueryBuilder
{

    public function db()
    {
        return $this->db;
    }

    public static function rules()
    {
        return static::$rules;
    }
}