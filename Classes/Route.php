<?php
  class Route {
    public static $valideRoutes = array();

    public static function set() {
      // self::$valideRoutes[] = $route;
      $args = func_get_args();

      if ($_GET["url"] != $args[0])
        return;

      foreach ($args as $i => $func) {
        if ($i == 0)
          continue;
        if (@!$func())
          break;
      }
    }

    public static function get() {
      $args = func_get_args();

      if ($_GET["url"] != $args[0])
        return;

      if ($_POST["method"] != "GET")
        return;

      foreach ($args as $i => $func) {
        if ($i == 0)
          continue;
        if (@!$func())
          break;
      }
    }

    public static function post() {
      $args = func_get_args();

      if ($_GET["url"] != $args[0])
        return;

      if ($_POST["method"] != "POST")
        return;

      foreach ($args as $i => $func) {
        if ($i == 0)
          continue;
        if (@!$func())
          break;
      }
    }

    public static function patch() {
      $args = func_get_args();

      if ($_GET["url"] != $args[0])
        return;

      if ($_POST["method"] != "PATCH")
        return;

      foreach ($args as $i => $func) {
        if ($i == 0)
          continue;
        if (@!$func())
          break;
      }
    }

    public static function delete() {
      $args = func_get_args();

      if ($_GET["url"] != $args[0])
        return;

      if ($_POST["method"] != "DELETE")
        return;


      foreach ($args as $i => $func) {
        if ($i == 0)
          continue;
        if (@!$func())
          break;
      }
    }
  }
?>