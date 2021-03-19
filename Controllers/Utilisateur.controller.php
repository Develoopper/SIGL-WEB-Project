<?php
class Utilisateur_Controller extends Controller {

  public static function logOut() {
    unset($_SESSION['login']);
    setcookie("login", "");
    header("Location: ./");
  }

  public static function signIn() {

    if (isset($_POST["email"]) && isset($_POST["mp"])) {

      $utilisateurs = Utilisateur_Model::getOne([
        ["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["email"]]
      ]);

      if (is_array($utilisateurs)) {
        if ((string)MyEncryption::encrypt($utilisateurs[0]->mp) == (string)MyEncryption::encrypt($_POST["mp"])) {
          $_SESSION["login"] = (string)$utilisateurs[0]->login;
          setcookie("login", $_SESSION['login'], array(
            'expires' => time() + 60 * 60 * 60,
            'httponly' => true,    // or false
            'samesite' => 'Lax' // None || Lax  || Strict
          ));

          if ($utilisateurs[0]->type == "admin")
            header('Location: adminProduits');
          else
            header('Location: ./');
        } else {
          header('Location: login?erreur=2');
        }
      } else {
        header('Location: login?erreur=1');
      }
    }
  }

  public static function signUp() {

    if (isset($_POST['emailIns']) && isset($_POST['mpIns'])) {
      $utilisateurs = Utilisateur_Model::getOne([
        ["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["emailIns"]]
      ]);

      if (!is_array($utilisateurs)) {
        $newUtilisateur = new Utilisateur_Model("", $_POST["nom"], $_POST["prenom"], $_POST["mpIns"], $_POST["emailIns"], "client", "", $_POST["telephone"]);
        if ($newUtilisateur->create())
          header("Location: login");
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
    if ($data["filterBy"] == "login")
      $opt = "equal";
    $res = Utilisateur_Model::getOne([["filterBy" => $data["filterBy"], "opt" => $opt, "filterValue" => $data["filterValue"]]]);
    echo json_encode($res);
  }

  public static function post() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $obj = new Utilisateur_Model($data, "", "", "", "", "", "", "");
    $res = $obj->create();
    echo json_encode($res);
  }

  public static function patch() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Utilisateur_Model::update($data["login"], new Utilisateur_Model($data["login"], $data["nom"], $data["prenom"], $data["mp"], $data["email"], $data["type"], $data["adresse"], $data["tele"]));
    echo json_encode($res);
  }

  public static function delete() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Utilisateur_Model::deleteU($data);
    echo json_encode($res);
  }
}