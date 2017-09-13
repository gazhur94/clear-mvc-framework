<?php

namespace Acme\Validation;

class Validator {

    /**
     * Array with validation errors
     *
     * @var array
     */
    private $errors = [];

    /**
     * Validate array with given rules
     *
     * @param $arrayForValidation
     * @param $rules
     * @param null $messages
     * @throws \CoreException
     */
    public function __construct($arrayForValidation, $rules, $messages = null) {

        /**
         * Looping through every validation rules
         */
        foreach($rules as $field => $rules) {
            /**
             * Looping through every rule:value
             */
            foreach (explode('|', $rules) as $rule) {
                $rule_value = explode(':', $rule);
                $ruleNamespace = 'Acme\\Validation\\Rules\\';
                $ruleClass = $ruleNamespace . ucfirst($rule_value[0]);
                /**
                 * Check if class with rule exists
                 */
                if (class_exists($ruleClass)) {
                    if (!is_subclass_of($ruleClass,  $ruleNamespace . 'ValidationRule'))
                    {
                        throw new \CoreException($ruleClass . ' must extends ValidationRule class');
                    }

                    $ruleValue = $rule_value[1] ?? null;

                    /** If field is not sent, do nothing */
                    if (!isset($arrayForValidation[$field])) {
                        break;
                    }

                    /**
                     * Validate value with rule
                     */
                    $ruleObj = new $ruleClass($arrayForValidation, $field, $ruleValue);

                    /**
                     * Add error if value is invalid
                     */
                    if (!$ruleObj()) {
                        if (isset($messages[$field][$rule_value[0]])) {
                            $this->errors[$field][] = $messages[$field][$rule_value[0]];
                        } else {
                            $this->errors[$field][] = $ruleObj->message();
                        }
                    }
                } else {
                    throw new \CoreException($ruleClass . ' doesn\'t exists');
                }
            }
        }
    }

    /**
     * Return errors array
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}