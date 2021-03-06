<?php
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

    public static function getOne($id) {
    }

    private static function searchUserInXML($login, $xml){
      $exist = false;
      foreach($xml->children() as $user){
        if($user->login == $login){
          $exist = true;
          $foundUser = $user;
        }
      }
      return [$exist, $foundUser];
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

    public function update($newproduit) {
      return;
    }

    public function delete() {
      return;
    }
  }
  $user = new User_Model($nom =);
?>