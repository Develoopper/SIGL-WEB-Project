<?php
class Utilisateur_Controller extends Controller {

  public static function logout() {
    session_destroy();
    setcookie("login", "", time() - 3600);
    header("Location: ./");
  }

  public static function signIn() {
    if (isset($_POST["email"]) && isset($_POST["mp"])) {
      echo "*";
      $utilisateurs = Utilisateur_Model::getOne([
        ["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["email"]],
        ["filterBy" => "mp", "opt" => "equal", "filterValue" => hash("sha256", $_POST["mp"])]
      ]);

      if (is_array($utilisateurs)) {
        $_SESSION["login"] = (string)$utilisateurs[0]->login;
        setcookie("login", $_SESSION["login"], time() + 60 * 60 * 60, "" , "" , false , true);

        if ($utilisateurs[0]->type == "admin")
          header('Location: adminProduits');
        else
          header("Location: ./");
      } else {
        header("Location: login?erreur=1");
      }
    }
  }

  public static function signUp() {
    if (isset($_POST["emailIns"]) && isset($_POST["mpIns"])) {
      $utilisateurs = Utilisateur_Model::getOne([["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["emailIns"]]]);
      if (!is_array($utilisateurs)) {
        $newUtilisateur = new Utilisateur_Model("", $_POST["nom"], $_POST["prenom"], $_POST["mpIns"], $_POST["emailIns"], "client");
        if ($newUtilisateur->create())
          header("Location: ./");
      } else {
        header("Location: login?exist=1");
      }
    }
  }

  public static function set()
  {
  }

  public static function get() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $opt = "like";
    if ($data["filterBy"] == "prix")
      $opt = "equal";
    $res = Produit_Model::getOne([["filterBy" => $data["filterBy"], "opt" => $opt, "filterValue" => $data["filterValue"]]]);
    echo json_encode($res);
  }

  public static function post() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $obj = new Produit_Model($data, "", "", "", "", "");
    $res = $obj->create();
    echo json_encode($res);
  }

  public static function patch() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::update($data["refProduit"], new Produit_Model($data["refProduit"], $data["libelle"], $data["prix"], $data["img"], $data["marque"], $data["sousCategorie"]));
    echo json_encode($res);
  }

  public static function delete() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::deleteP($data);
    echo json_encode($res);
  }
}