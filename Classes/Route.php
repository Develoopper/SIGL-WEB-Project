<?php
  class Route {
    public static $valideRoutes = array();

    public static function set($route, $callback) {
      self::$valideRoutes[] = $route;

      if ($_GET["url"] == $route)
        $callback->__invoke();
    }
  }
?>