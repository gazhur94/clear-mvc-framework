<?php

namespace Acme\Validation\Rules;

class Nospace extends ValidationRule
{
    public function __invoke()
    {
        return preg_match("/\\s/", $this->item);
    }

    public function message()
    {
        return 'Fields don\' match!';
    }
}