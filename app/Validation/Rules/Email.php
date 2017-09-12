<?php

namespace Acme\Validation\Rules;

class Email extends ValidationRule
{
    public function __invoke()
    {
        return filter_var($this->item, FILTER_VALIDATE_EMAIL);
    }

    public function message()
    {
        return 'Enter correct email!';
    }
}