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
          $resLigne = $ligneCmd->create();
        }
        echo json_encode($resLigne);
      }
			echo json_encode($res);
    }

    public static function patch() {
      header('Content-Type: text/json');
      $data = $_POST["data"];
      $res = Commande_Model::update($data["numCommande"], $data["etat"]);
      echo json_encode($res);
    }

  }

?>