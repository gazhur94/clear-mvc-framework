<?php

namespace Acme\Views;

use Acme\Helpers\Config;

class View
{
    public function render($layout, $page, $data = null) {

        if (is_array($data)) {
            extract($data);
        }

        $page = $this->findView('page', $page);

        $layout = $this->findView('layout', $layout);

        require_once $layout;

        return true;

    }

    public function findView($type, $name)
    {
        $view = Config::get('path/' . $type . 's'). $name. '.' . $type . '.php';
        if (!file_exists($view)) {
            throw new \CoreException($view . ' view is not found');
        }
        return $view;
    }
}