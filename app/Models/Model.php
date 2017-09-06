<?php

namespace Acme\Models;

class Model
{
    private $db;

    public function __construct()
    {
        $this->db = QueryBuilder::new();
//        $this->checkCookieToken();
    }

    public function db()
    {
        return $this->db;
    }
}