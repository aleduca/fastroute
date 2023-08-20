<?php

use core\library\Session;

function public_path()
{
    return $_SERVER['DOCUMENT_ROOT'];
}

function base_path()
{
    return dirname(__FILE__, 4);
}

function path_or_include(string $folder_and_file, bool $require = true)
{
    if ($require) {
        require base_path() . DIRECTORY_SEPARATOR . $folder_and_file;

        return;
    }

    return base_path() . DIRECTORY_SEPARATOR . $folder_and_file;
}

function view(string $folder_and_file, array $data = [])
{
    if (!empty($data)) {
        extract($data);
    }
    require base_path() . DIRECTORY_SEPARATOR . $folder_and_file;
}

function partials(string $partial)
{
    path_or_include('app/views/partials/' . $partial);
}

function redirect(string $to)
{
    return header("Location:{$to}");
}

function flash(string $index, string $cssClass = 'error')
{
    $flash = Session::get('__flash');
    if (isset($flash[$index])) {
        return "<span class='{$cssClass}'>{$flash[$index]}</span>";
    }
}

function remove_file(string $file)
{
    @unlink(public_path() . $file);
}
