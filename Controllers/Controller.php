<?php
  require_once "Models/Utilisateur.model.php";

  class Controller {

    public static function CreateView($view_name, $data) {
      extract($data);

      require_once "Views/Pages/$view_name.view/".lcfirst($view_name).".php";
    }
  }
  
?>