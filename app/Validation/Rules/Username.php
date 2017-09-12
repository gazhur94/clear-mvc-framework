<?php

namespace Acme\Validation\Rules;

class Username extends ValidationRule
{
    public function __invoke()
    {
        return preg_match("/^[a-zA-Z0-9]*$/", $this->item);
    }

    public function message()
    {
        return 'Enter correct username!';
    }
}

