<?php
  require_once "Models/User.model.php";

  class Controller {
    // private static $data = [];

    public static function CreateView($view_name, $data) {
      // Auth::login();

      // self::$data = [
        
      // ];

      // foreach($data as $key => $val)
      //   self::$vars[$key] = $val;

      extract($data);

      require_once "Views/$view_name.view/".lcfirst($view_name).".php";
    }
  }
  
?>