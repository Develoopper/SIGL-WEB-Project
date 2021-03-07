<?php
  require_once "Models/User.model.php";

  class Controller {
    private static $data = [];

    public static function CreateView($view_name) {
      Auth::login();

      self::$data = [
        "product" => Produit_Model::getOne([["filterBy" => "refProduit", "opt" => "equal", "filterValue" => $_GET["id"]]])[0]
      ];

      // foreach($data as $key => $val)
      //   self::$vars[$key] = $val;

      extract(self::$data);

      require_once "Views/$view_name.view/".lcfirst($view_name).".php";
    }
  }
?>