<?php

/**
 * Dump variable with breaking script
 *
 * @param $var
 */
function ddump($var) {
    die(var_dump($var));
}

/**
 * Dump variable
 *
 * @param $var
 */
function dump($var) {
    var_dump($var);
}

/**
 * Return path to assets folder
 * @param $file
 * @return string
 */
function assets($file) {
    return Acme\Helpers\Config::get('path/assets') . $file;
}

/**
 * Return path to view folder
 *
 * @param $type
 * @param $name
 * @return string
 * @throws CoreException
 */
function view($type, $name) {
    $view = Acme\Helpers\Config::get('path/' . $type . 's'). $name. '.php';
    if (!file_exists($view)) {
        throw new \CoreException($view . ' view is not found');
    }
    return $view;
}

/**
 * Return url of given name of route
 *
 * @param $name
 * @return mixed
 */
function route($name) {
    return RouteHandler::getRouteBy('name', $name)->url;
}

/**
 * Return input value of $field
 *
 * @param $field
 * @return mixed
 */
function input($field) {
    return Acme\Helpers\Input::$field();
}

/**
 * Check if user is logged in
 *
 * @return boolean
 */
function isLoggedIn() {
    return Acme\Helpers\Session::get('user');
}

/**
 * Prints CSRF field
 */
function csrf_generate() {
    echo '<input type="hidden" name="csrf" value="' . Acme\Helpers\Token::generate('csrf') . '">';
}

/**
 * Prints flash message
 */
function flash_message() {
    echo Acme\Helpers\FlashMessage::get();
}

/**
 * Generate Input html field with given parameters
 *
 * @param $field_name
 * @param $type
 * @param bool $label
 * @param bool $placeholder
 * @param bool $errors
 * @param bool $oldData
 * @param null $form_controls
 */
function input_field($field_name, $type, $label = false, $placeholder = false, $errors = false, $oldData = false, $form_controls = null)
{
    $field = '<div class="form-group';
    if (isset($errors[$field_name]) &&  $form_controls && in_array('danger', $form_controls)) {
        $field .= ' has-danger';
    } else if (input($field_name) && $form_controls && in_array('success', $form_controls)) {
        $field .= ' has-success';
    }
    $field .= "\">\n";
    /** Label tag */
    if ($label) {
        $field .= "\t" . '<label for="' . $field_name . '" class="col col-form-label">' . $label . '</label>' . "\n";
    }
    $field .= "\t" . '<div class="col">' . "\n";
    /** Input tag */
    $field .= "\t\t" . '<input type="' . $type . '" name="' . $field_name . '"';
    $field .= ' class="form-control';
    if ($form_controls) {
        foreach ($form_controls as $style) {
            $field .= ' form-control-' . $style;
        }
    }
    $field .= '" id="' . $field_name . '"';
    /** Placeholder */
    if ($placeholder) {
        $field .= ' placeholder="' . $placeholder . '"';
    }
    /** Value with old data */
    if ($oldData && input($field_name)) {
        $field .= ' value="' . input($field_name) . '"';
    }
    $field .= ">\n";
    /** Errors */
    if (isset($errors[$field_name])) {
        $field .= "\t\t" . '<div class="form-control-feedback">' . $errors[$field_name][0] . "</div>\n";
    }

    $field .= "\t" . "</div>\n";
    $field .= "</div>\n";
    echo $field;
}
