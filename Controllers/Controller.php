<?php
  require_once "Models/User.model.php";

  class Controller {
    private static $vars = [];

    public static function CreateView($view_name) {
      Auth::login();

      $data = [
        "name" => "Bo9al",
        "sex" => "homme",
        "users" => UserModel::getOne(2),
        "user" => $_SESSION["user"]
      ];

      foreach($data as $key => $val)
        self::$vars[$key] = $val;

      extract(self::$vars);

      require_once "Views/$view_name.view/".lcfirst($view_name).".php";
    }
  }
?>