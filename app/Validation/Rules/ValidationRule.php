<?php

namespace Acme\Validation\Rules;

/**
 * Class ValidationRule
 * @package Acme\Validation\Rules
 */
abstract class ValidationRule implements IRule
{
    /**
     * ValidationRule constructor.
     * @param $validationArray
     * @param null $field
     * @param null $condition
     */
    public function __construct($validationArray, $field = null, $condition = null)
    {
        $this->validationArray = $validationArray;
        $this->item = $validationArray[$field];
        $this->condition = $condition;
        $this->field = $field;
    }

    /**
     * Main logic of Rule
     * @return mixed
     */
    abstract public function __invoke();

    /**
     * Must return message error as string
     * @return mixed
     */
    abstract public function message();
}