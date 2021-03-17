<?php
  class Categorie_Controller extends Controller {

    public static function post() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $obj = new Categorie_Model($data, "", "", "", "", "", "");
      $res = $obj->create();
      echo json_encode($res);
    }

    public static function patch() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Categorie_Model::update($data["id"], new Categorie_Model($data["id"], $data["libelle"]));
      echo json_encode($res);
    }

    public static function delete() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Categorie_Model::deleteC($data);
      echo json_encode($res);
    }
  }
?>