<?php

namespace Acme\Validation\Rules;

use Acme\Database\QueryBuilder;

class Unique extends ValidationRule
{
    public function __invoke()
    {
        $db = new QueryBuilder();

        return empty($db->table($this->condition)->where([$this->field => ($this->item)])->select());

    }

    public function message()
    {
        return 'Entered ' . $this->field . ' already registered!';
    }
}