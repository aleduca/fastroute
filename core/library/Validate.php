<?php

namespace core\library;

use core\validations\Email;
use core\validations\Image;
use core\validations\Max;
use core\validations\Min;
use core\validations\Required;
use core\validations\Unique;

class Validate
{
    private bool $errors = false;
    /**
     * @param string $fiel name of the input file
     * @param array $options options to validate ['size' => int in mb, 'extensions' => []]
     */
    public function image(string $field, array $options = [
        'size' => null,
        'extensions' => ['jpeg', 'jpg', 'png'],
    ])
    {
        $image = new Image;
        $validated = $image->validate($field, [
            ...['extensions' => ['jpeg', 'jpg', 'png']],
            ...$options,
        ]);

        if (!$validated) {
            $this->errors = true;
        }
    }

    /**
     * @param array $fields name os the fields required
     */
    public function required(array $fields)
    {
        $required = new Required;
        $validated = $required->validate($fields);

        if (!$validated) {
            $this->errors = true;
        }
    }

    /**
     * @param string $field name of the input
     * @param int $max max characters
     */
    public function max(string $field, int $max_characaters)
    {
        $max = new Max;
        $validated = $max->validate($field, $max_characaters);

        if (!$validated) {
            $this->errors = true;
        }
    }

       /**
     * @param string $field name of the input
     * @param int $min min characters
     */
    public function min(string $field, int $min_characaters)
    {
        $max = new Min;
        $validated = $max->validate($field, $min_characaters);

        if (!$validated) {
            $this->errors = true;
        }
    }

    /**
     * @param string $field name of the input
     */
    public function email(string $field)
    {
        $email = new Email;
        $validated = $email->validate($field);

        if (!$validated) {
            $this->errors = true;
        }
    }

     /**
     * @param string $field name of the input
     * @param string $table
     */
    public function unique(string $field, string $table)
    {
        $unique = new Unique;
        $validated = $unique->validate($field, $table);

        if (!$validated) {
            $this->errors = true;
        }
    }


    public function has_errors()
    {
        return $this->errors;
    }
}
