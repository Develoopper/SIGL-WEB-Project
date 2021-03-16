<?php
  class Commande_Controller extends Controller {

    public static function post() {
      header('Content-Type: text/json');

      $data = $_POST["data"];
      $obj = new Commande_Model("", "", $data["dateCmd"], $data["etatCmd"], $data["montant"], $data["login"]);
      $res = $obj->create();
      if (is_numeric((int)$res)) {
        foreach ($data["produitsCommandes"] as $produitCommande) {
          $ligneCmd = new LigneCommande_Model($res, $produitCommande->refProduit, $produitCommande->qte);
          $ligneCmd->create();
        }
        return json_encode("livraison");
      }
			return json_encode($res);
    }

    public static function testerUtilisateur() {
      if (!isset($_SESSION["login"]))
        return json_encode("login");
      else
        return json_encode("livraison");
    }

    public static function patch() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Commande_Model::update($data["numCommande"], $data["etat"]);
      echo json_encode($res);
    }

  }

?>