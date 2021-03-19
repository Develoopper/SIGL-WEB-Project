<?php
  // include 'Models/Model.php';
  include "Classes/Cryptographie.php";

  class Utilisateur_Model extends Model {

    public $login;
    public $nom;
    public $prenom;
    public $mp;
    public $email;
    public $type;
    public $adresse;
    public $tele;

    public function __construct($login, $nom, $prenom, $mp, $email, $type, $adresse, $tele) {
      if ($login == "")
        $login = md5($nom.$prenom);

      $this->login = $login;
      $this->nom=  $nom;
      $this->prenom = $prenom;
      $this->mp = $mp;
      $this->email = $email;
      $this->type = $type;
      $this->adresse = $adresse;
      $this->tele = $tele;
    }

    public static function getAll() {
      $xml = parent::load_xml("utilisateurs");

      $utilisateurs_list = array();

      foreach ($xml->children() as $utilisateur)
        $utilisateurs_list[] = new Utilisateur_Model($utilisateur->login, $utilisateur->nom, $utilisateur->prenom, MyEncryption::decrypt((string)$utilisateur->mp), $utilisateur->email, $utilisateur->type, $utilisateur->adresse, $utilisateur->tele);

      return $utilisateurs_list;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("utilisateurs");

      $utilisateurs_list = array();

      foreach ($xml->children() as $utilisateur) {
        foreach ($where as $filter) {
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if ($operator == "equal" && $utilisateur->{$filterBy} == $filterValue) {
            $utilisateurs_list[] = new Utilisateur_Model($utilisateur->login, $utilisateur->nom, $utilisateur->prenom, MyEncryption::decrypt((string)$utilisateur->mp), $utilisateur->email, $utilisateur->type, $utilisateur->adresse, $utilisateur->tele);
          }
        }
      }

      if (!isset($utilisateurs_list))
        return "Pas d'utilisateur avec cette signature.";

      return $utilisateurs_list;
    }

    public function create() {
      $xml = parent::load_xml("utilisateurs");
      $exist = parent::searchInXML($this->login, $xml)[0];

      if (!$exist) {
        $utilisateur = $xml->addChild("utilisateur");
        $utilisateur->addChild("login", $this->login);
        $utilisateur->addChild("nom", $this->nom);
        $utilisateur->addChild("prenom", $this->prenom);
        $utilisateur->addChild("mp", MyEncryption::encrypt((string)$this->mp));
        $utilisateur->addChild("email", $this->email);
        $utilisateur->addChild("type", $this->type);
        $utilisateur->addChild("adresse", $this->adresse);
        $utilisateur->addChild("tele", $this->tele);

        return Parent::saveInFile($xml, "utilisateurs");
      } else {
        return "un utilisateur avec le meme login existe déjà";
      }
    }

    public static function update($login, $newUtilisateur) {
      $xml = parent::load_xml("utilisateurs");

      $id = $xml->xpath("//utilisateur/login[.='$login']")[0];
      $utilisateur = current($id->xpath("parent::*"));

      $utilisateur->nom = $newUtilisateur->nom;
      $utilisateur->prenom = $newUtilisateur->prenom;
      $utilisateur->mp = MyEncryption::encrypt((string)$newUtilisateur->mp);
      $utilisateur->email = $newUtilisateur->email;
      $utilisateur->type = $newUtilisateur->type;
      $utilisateur->adresse = $newUtilisateur->adresse;
      $utilisateur->tele = $newUtilisateur->tele;

      return Parent::saveInFile($xml, "utilisateurs");
    }

    public static function deleteU($login) {
      if (isset($login))
        return parent::delete($login, "utilisateurs", "utilisateur", "login");
      else
        return "Vous devez entrer un login.";
    }
  }
  // $utilisateur = new Utilisateur_Model("","salem","mohammed","salem010203","salem.mhmed@yahoo.com","client");
  // $utilisateur->create();
  // echo Utilisateur_Model::getAll()[0]->login;
  // echo Utilisateur_Model::deleteU($utilisateur->login);
?>