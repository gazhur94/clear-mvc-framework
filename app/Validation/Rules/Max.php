<?php

namespace Acme\Validation\Rules;

class Max extends ValidationRule
{
    public function __invoke()
    {
        return iconv_strlen($this->item) < $this->condition;
    }

    public function message()
    {
        return 'Field must be not longer ' . $this->condition . ' chars!';
    }
}