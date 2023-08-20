<?php

namespace core\validations;

use core\library\Session;

class Email
{
    public function validate(string $field)
    {
        $value = $_POST[$field];
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            Session::flash($field, 'Email invalid');

            return false;
        }
    }
}
