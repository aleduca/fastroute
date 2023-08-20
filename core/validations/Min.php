<?php

namespace core\validations;

use core\library\Session;

class Min
{
    public function validate(string $field, int $min)
    {
        $value = $_POST[$field];

        if (strlen($value) < $min) {
            Session::flash($field, "Field can not have less than {$min} characters");

            return false;
        }
    }
}
