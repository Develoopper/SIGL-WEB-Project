<?php
  class SousCategorie_Controller extends Controller {

    public static function post() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $obj = new SousCategorie_Model($data, "", "", "", "", "", "");
      $res = $obj->create();
      echo json_encode($res);
    }

    public static function patch() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = SousCategorie_Model::update($data["id"], new SousCategorie_Model($data["id"], $data["libelle"], $data["categorie"]));
      echo json_encode($res);
    }

    public static function delete() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = SousCategorie_Model::deleteSC($data);
      echo json_encode($res);
    }
  }
?>