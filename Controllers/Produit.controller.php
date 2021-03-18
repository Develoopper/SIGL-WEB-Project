<?php
  class Produit_Controller extends Controller {

    public static function get() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Produit_Model::getOne([
        ["filterBy" => "libelle", "opt" => "like", "filterValue" => $data["libelle"]],
        ["filterBy" => "marque", "opt" => "like", "filterValue" => $data["marque"]],
        ["filterBy" => "prix", "opt" => "gtE", "filterValue" => (float)$data["prixMin"]],
        ["filterBy" => "prix", "opt" => "ltE", "filterValue" => (float)$data["prixMax"]]
      ]);
      echo json_encode("*");
      // header('Content-Type: text/json');
      // $data = $_POST["data"];
      // $opt = "like";
      // if ($data["filterBy"] == "prix")
      //   $opt = "equal";
      // $res = Produit_Model::getOne([
      //   ["filterBy" => $data["filterBy"], "opt" => $opt, "filterValue" => $data["filterValue"]]
      // ]);
      // echo json_encode($res);
    }

    public static function post() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $obj = new Produit_Model($data, "", "", "", "", "", "");
      $res = $obj->create();
      echo json_encode($res);
    }

    public static function patch() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Produit_Model::update($data["refProduit"], new Produit_Model($data["refProduit"], $data["libelle"], $data["prix"], $data["img"], $data["marque"], $data["sousCategorie"], $data["dateAjout"]));
      echo json_encode($res);
    }

    public static function delete() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Produit_Model::deleteP($data);
      echo json_encode($res);
    }
  }
?>