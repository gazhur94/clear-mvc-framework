<?php

namespace Acme\Validation;

use Acme\Database\QueryBuilder;

class Validator {
    private $errors = [];

//$arrayForValidation,
//        $rules = [],
//        ;


    //    private $currentField = null,;
//        $fieldNames = [],
//        $errMsg = [],
//        $pass = null,
//        $rules = [],
//        $arrayForValidation;

    //database connecttion
    public function __construct($arrayForValidation, $rules, $messages = null) {

        foreach($rules as $field => $rules) {
            foreach (explode('|', $rules) as $rule) {
                $rule_value = explode(':', $rule);

                $ruleNamespace = 'Acme\\Validation\\Rules\\';
                $ruleClass = $ruleNamespace . ucfirst($rule_value[0]);

                if (class_exists($ruleClass)) {
                    if (!is_subclass_of($ruleClass,  $ruleNamespace . 'ValidationRule'))
                    {
                        throw new \CoreException($ruleClass . ' must extends ValidationRule class');
                    }

                    $ruleValue = $rule_value[1] ?? null;

                    if (!isset($arrayForValidation[$field])) {
                        break;
                    }

                    $ruleObj = new $ruleClass($arrayForValidation, $field, $ruleValue);

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

    public function errors()
    {
        return $this->errors;
    }



//
//    private function exists($table) {
//        if (empty(($this->db->get($table, [$this->currentField => $this->arrayForValidation[$this->currentField]])))) {
//            if (isset($this->fieldNames[$this->currentField])) {
//                $field = $this->fieldNames[$this->currentField];
//            } else {
//                $field = $this->currentField;
//            }
//            return $this->addError("Такой {$field} не зарегистрирован");
//        }
//    }
}