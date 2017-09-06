<?php

namespace Acme\Views;

use Acme\Helpers\Config;

class View
{
    public function render($layout, $page, $data = null) {

        if (is_array($data)) {
            extract($data);
        }

        require_once $layout;

    }
}