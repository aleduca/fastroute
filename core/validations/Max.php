<?php

namespace core\validations;

use core\library\Session;

class Max
{
    public function validate(string $field, int $max)
    {
        $value = $_POST[$field];

        if (strlen($value) > $max) {
            Session::flash($field, "Field can not have more than {$max} characters");

            return false;
        }
    }
}
