<?php
include './Model.php';
  class User_Model extends Model {
    public $login;
    public $nom;
    public $prenom;
    public $mp;
    public $email;
    public $type;

    public function __construct($login = "", $nom, $prenom, $mp, $email, $type) {
      if($login == "") $login = md5($nom.$prenom);
      $this->login = $login;
      $this->nom=  $nom;
      $this->prenom = $prenom;
      $this->mp = $mp;
      $this->email = $email;
      $this->type = $type;
    }

    public static function getAll() {
      $xml = parent::load_xml("utilisateurs");

      foreach($xml->children() as $user)
        $users_list[] = new User_Model($user->login, $user->nom, $user->prenom, $user->mp, $user->email, $user->type);

      return $users_list;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("utilisateurs") or die("Erreur de recupération des utilisateurs.");

        foreach($xml->children() as $user){

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "like" && str_contains($user->{$filterBy}, $filterValue)){
                    $users_list[] = new User_Model($user->login, $user->nom, $user->prenom, $user->mp, $user->email, $user->type);
                }
                if($operator == "equal" && $user->{$filterBy} == $filterValue){
                    $users_list[] = new User_Model($user->login, $user->nom, $user->prenom, $user->mp, $user->email, $user->type);
                }

            }
        }
        if(!isset($users_list)) return "Pas d'utilisateur avec cette signature.";
        return $users_list;
    }

    private static function searchUserInXML($login, $xml){
      $exist = false;
      foreach($xml->children() as $user){
        if($user->login == $login){
          $exist = true;
          $foundUser = $user;
        }
      }
      return [$exist, @$foundUser];
    }

    public function create() {
      $xml = parent::load_xml("utilisateurs");
      $exist = self::searchUserInXML($this->login, $xml)[0];

      if(!$exist){
        $user = $xml->addChild("user");
        $user->addChild("login", $this->login);
        $user->addChild("nom", $this->nom);
        $user->addChild("prenom", $this->prenom);
        $user->addChild("mp", hash("sha256",$this->mp));
        $user->addChild("email", $this->email);
        $user->addChild("type", $this->type);

        return Parent::saveInFile($xml,"utilisateurs");
      }
      else
      {
        return "un utilisateur avec le meme login existe déjà";
      }
    }

    public function update($login, $newUser) {
      $xml = parent::load_xml("utilisateurs");
      [$exist, $oldUser] = self::searchUserInXML($login, $xml);

      if($exist){
            $id = $xml->xpath("//user/login[.='$oldUser->login']")[0];
            $user = current($id->xpath("parent::*"));

            $user->nom = $newUser->nom;
            $user->prenom = $newUser->prenom;
            $user->mp = $newUser->mp;
            $user->email = $newUser->email;
            $user->type = $newUser->type;

            return Parent::saveInFile($xml, "utilisateurs");
      }else{
        return "L'utilisateur n'existe pas.";
      }
    }

    public static function delete($login) {
      $xml = parent::load_xml("utilisateurs");
      [$exist, $user] = self::searchUserInXML($login, $xml);

      if($exist) {
        $login = $xml->xpath("//user/login[.='$user->login']");
        $userSupri = current($login[0]->xpath("parent::*"));

        if (!empty($userSupri)) {
          unset($userSupri[0]);
        }
      }

      return Parent::saveInFile($xml, "utilisateurs");
    }
  }
  $user = new User_Model("","salem","mohammed","salem010203","salem.mhmed@yahoo.com","client");
  $user->create();
  echo User_Model::getAll()[0]->login;
  echo User_Model::delete($user->login);
?>