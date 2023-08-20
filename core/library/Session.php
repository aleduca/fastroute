<?php

namespace core\library;

class Session
{
    public static function set(string $index, mixed $value)
    {
        $_SESSION[$index] = $value;
    }

      public static function has(string $index)
      {
          return isset($_SESSION[$index]);
      }

      public static function get(string $index)
      {
          if (self::has($index)) {
              return $_SESSION[$index];
          }
      }

      public static function remove_session(string $index)
      {
          if (self::has($index)) {
              unset($_SESSION[$index]);
          }
      }

      public static function remove_all_sessions()
      {
          session_destroy();
      }

      public static function flash(string $index, mixed $value, string $icon = '<i class="bi bi-exclamation-circle"></i>')
      {
          $_SESSION['__flash'][$index] = $icon . $value;
      }

      public static function flash_remove()
      {
          if ($_SERVER['REQUEST_METHOD'] === 'GET' && self::has('__flash')) {
              unset($_SESSION['__flash']);
          }
      }

      public static function debug()
      {
          var_dump($_SESSION);
          exit;
      }
}
