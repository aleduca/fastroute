<?php

namespace core\validations;

use core\library\Session;

class Image
{
    public function validate(string $field, array $options)
    {
        ['name' => $name, 'error' => $error, 'size' => $size] = $_FILES[$field];
        ['size' => $size_options,'extensions' => $extensions] = $options;


        if ($error === 4) {
            Session::flash($field, 'Please, select an image');

            return false;
        }

        if (empty($extensions)) {
            Session::flash($field, 'Please, select extensions accepted');

            return false;
        }

        if ((int)number_format($size / 1048576) > $size_options) {
            Session::flash($field, 'Image too big');

            return false;
        }

        $extension = pathinfo($name, PATHINFO_EXTENSION);

        if (!in_array($extension, $extensions)) {
            Session::flash($field, 'Only ' . implode(',', $extensions) . ' extensions accepted');

            return false;
        }

        // var_dump((int)number_format($size / 1048576), $size);
        // die();
    }
}
