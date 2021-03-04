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
  }
?>