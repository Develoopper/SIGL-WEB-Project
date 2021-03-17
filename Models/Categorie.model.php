<?php
  // include "./Model.php";

  class Categorie_Model extends Model {
    public $id;
    public $libelle;

    public function __construct($id, $libelle) {
      $this->id = $id;
      $this->libelle = $libelle;
    }

    public static function getOne($where) {
        $xml = parent::load_xml("categories") or die("Erreur de recupération des categories.");

        foreach($xml->children() as $categorie){

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "like" && str_contains($categorie->libelle, $filterValue)){
                    $categories_list[] = new Categorie_Model($categorie->id, $categorie->libelle);
                }
                if($operator == "equal" && $categorie->{$filterBy} == $filterValue){
                    $categories_list[] = new Categorie_Model($categorie->id, $categorie->libelle);
                }

            }
        }
        if(!isset($categories_list)) return "Pas de categorie avec cette signature.";
        return $categories_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("categories");

      foreach( $xml->children() as $categorie){
        $categories_list[] = new Categorie_Model($categorie->id, $categorie->libelle);
      }

      return $categories_list;
    }

    public function create() {
      $xml = parent::load_xml("categories");
      $exist = parent::searchInXML($this->id, $xml)[0];

      if(!$exist){
        $categorie = $xml->addChild("categorie");
        $categorie->addChild("id", $this->id);
        $categorie->addChild("libelle", $this->libelle);

        return Parent::saveInFile($xml,"categories");
      }
      else
      {
        return "une catégorie avec le meme identifiant existe déjà";
      }
    }

    public static function update($idCategorie, $newCategorie) {
      $xml = parent::load_xml("categories");
      $exist = parent::searchInXML($idCategorie, $xml)[0];

      if($exist){
            $id = $xml->xpath("//categorie/id[.='$idCategorie']")[0];
            $categorie = current($id->xpath("parent::*"));

            $categorie->libelle = $newCategorie->libelle;

            return Parent::saveInFile($xml,"categories");
      }else{
        return "La catégorie n'existe pas.";
      }
    }

    public static function deleteC($id) {
      if(isset($id))
        return parent::delete($id, "categories", "categorie", "id");
      else
        return "Vous devez entrer un identifiant.";
    }
  }
    // $c = new Categorie_Model("4", "libelle4");
    // print_r($c::getAll());
    // echo $c->create();
    // $result = Categorie_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1]));
    // $c = is_array($result) ? $result[0] : $result;
    // if(!is_string($c)){
    //   echo $c->id;
    //   echo Categorie_Model::deleteC($c->id);
    // }else{
    //   echo $c;
    // }
?>