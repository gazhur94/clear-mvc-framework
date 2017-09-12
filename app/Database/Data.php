<?php

namespace Acme\Database;

class Data
{
    public function first()
    {
        if (isset($this->{'0'})) {
            return $this->{'0'};
        }
        return null;
    }
}