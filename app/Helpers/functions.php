<?php

function ddump($var) {
    die(var_dump($var));
}

function dump($var) {
    var_dump($var);
}

function assets($file) {
    return Acme\Helpers\Config::get('path/assets') . $file;
}

function view($type, $name) {
    $view = Acme\Helpers\Config::get('path/' . $type . 's'). $name. '.php';
    if (!file_exists($view)) {
        throw new \CoreException($view . ' view is not found');
    }
    return $view;
}


function route($name) {
    $url = RouteHandler::getRouteByName($name)->url;
    if ($url === '/') {
        return $url;
    }
    return '/' . $url;
}

function input($field) {
    return Acme\Helpers\Input::$field();
}

function isLoggedIn() {
    return Acme\Helpers\Session::get('user');
}

function csrf_generate() {
    echo '<input type="hidden" name="csrf" value="' . Acme\Helpers\Token::generate('csrf') . '">';
}

function flash_message() {
    echo Acme\Helpers\FlashMessage::get();
}

function input_field($field_name, $label = false, $placeholder = false, $errors = false, $oldData = false, $form_controls = null)
{
    $field = '<div class="form-group';
    if (isset($errors[$field_name]) &&  $form_controls && in_array('danger', $form_controls)) {
        $field .= ' has-danger';
    } else if (input($field_name) && $form_controls && in_array('success', $form_controls)) {
        $field .= ' has-success';
    }
    $field .= "\">\n";

    if ($label) {
        $field .= "\t" . '<label for="' . $field_name . '" class="col col-form-label">' . $label . '</label>' . "\n";
    }

    $field .= "\t" . '<div class="col">' . "\n";

    $field .= "\t\t" . '<input type="text" name="' . $field_name . '"';

    $field .= ' class="form-control';
    if ($form_controls) {
        foreach ($form_controls as $style) {
            $field .= ' form-control-' . $style;
        }
    }
    $field .= ' id="' . $field_name . '"';


    if ($placeholder) {
        $field .= ' placeholder="' . $placeholder . '"';
    }

    if ($oldData && input($field_name)) {
        $field .= ' value="' . input($field_name) . '"';
    }
    $field .= ">\n";


    if (isset($errors[$field_name])) {
        $field .= "\t\t" . '<div class="form-control-feedback">' . $errors[$field_name][0] . "</div>\n";
    }

    $field .= "\t" . "</div>\n";

    $field .= "</div>\n";

    echo $field;
}