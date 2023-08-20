<?php

namespace core\validations;

use core\library\Session;

class Required
{
    public function validate(array $fields)
    {
        $error = false;
        foreach ($fields as $field) {
            $value = trim($_POST[$field]);
            if (!$value) {
                Session::flash($field, 'Field required');
                $error = true;
            }
        }

        if ($error) {
            return false;
        }
    }
}
