<?php

namespace core\validations;

use app\database\Connection;
use core\library\Session;

class Unique
{
    public function validate(string $field, string $table)
    {
        $connection = Connection::get();
        $prepare = $connection->prepare("select {$field} from {$table} where {$field} = :{$field}");
        $value = $_POST[$field];
        $prepare->execute([$field => $value]);

        if ($prepare->rowCount() > 0) {
            Session::flash($field, "Value {$value} is not unique in table {$table}");

            return false;
        }
    }
}
