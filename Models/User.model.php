<?php
  class UserModel extends Model {
    public $id;
    public $nom;
    public $sexe;

    public function __construct($id, $nom, $sexe) {
      $this->id = $id;
      $this->nom = $nom;
      $this->sexe= $sexe;
    }

    public static function getAll() {
      $xml = self::load_xml("utilisateurs");

      foreach($xml->children() as $user)
        $users_list[] = new UserModel($user->id, $user->nom, $user->sexe);

      return $users_list;
    }

    public static function getOne($id) {
      $xml = self::load_xml("utilisateurs");
      
      foreach($xml->children() as $user)
        if ($id == $user->id)
          return new UserModel($user->id, $user->nom, $user->sexe);
    }

    public function create() {
      return;
    }

    public function update($newproduit) {
      return;
    }

    public function delete() {
      return;
    }
  }
?>