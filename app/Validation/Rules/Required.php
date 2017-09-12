<?php

namespace Acme\Validation\Rules;

class Required extends ValidationRule
{
    public function __invoke()
    {
        return !empty($this->item);
    }

    public function message()
    {
        return 'Field is required!';
    }
}