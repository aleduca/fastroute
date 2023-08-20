<?php

namespace core\library;

class Sanitize
{
    private static $data = [];

    private static function fields_from_post_request()
    {
        $values = $_POST;
        foreach ($values as $index => $value) {
            self::$data[$index] = trim(strip_tags($value));
        }
    }

    private static function fields_from_array(array $fields)
    {
        foreach ($fields as $field) {
            self::$data[$field] = trim(strip_tags($_POST[$field]));
        }
    }

    public static function execute(array $fields = [])
    {
        (empty($fields)) ?
            static::fields_from_post_request() :
            static::fields_from_array($fields);

        return new static;
    }

    public function all()
    {
        return self::$data;
    }

    public function get(string $field)
    {
        return self::$data[$field] ?? null;
    }
}
