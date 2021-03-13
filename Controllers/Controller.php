<?php
  require_once "Models/Utilisateur.model.php";

  class Controller {

    public static function CreateView($view_name, $data) {
      extract($data);

      if (isset($_SESSION['login'])) {
        $utilisateur = Utilisateur_Model::getOne([
            ["filterBy" => "login", "opt" => "equal", "filterValue" => $_SESSION["login"]]
        ])[0];
	    }

      extract($utilisateur);

      require_once "Views/Pages/$view_name.view/".lcfirst($view_name).".php";
    }
  }

?>