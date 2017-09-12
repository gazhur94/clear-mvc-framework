<?php

namespace Acme\Validation\Rules;

use Acme\Validation\Validator;

abstract class ValidationRule implements IRule
{
    public function __construct($validationArray, $field = null, $condition = null)
    {
        $this->validationArray = $validationArray;
        $this->item = $validationArray[$field];
        $this->condition = $condition;
        $this->field = $field;
    }

    abstract public function __invoke();
    abstract public function message();
}