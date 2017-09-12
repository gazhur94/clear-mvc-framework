<?php

namespace Acme\Validation\Rules;

class Match extends ValidationRule
{
    public function __invoke()
    {
        return $this->item === $this->validationArray[$this->condition];
    }

    public function message()
    {
        return 'Fields don\'t match!';
    }
}