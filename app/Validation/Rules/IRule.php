<?php

namespace Acme\Validation\Rules;

interface IRule
{
    public function __invoke();
    public function message();
}