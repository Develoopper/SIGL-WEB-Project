<?php
  // include "Models/Model.php";

  class SousCategorie_Model extends Model {
    public $id;
    public $libelle;
    public $categorie;

    public function __construct($id, $libelle, $categorie) {
      $this->id = $id;
      $this->libelle = $libelle;
      $this->categorie = $categorie;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("sousCategories") or die("Erreur de recupération des categories.");

      foreach($xml->children() as $sousCategorie) {

        foreach($where as $filter){
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if ($operator == "like" && str_contains($sousCategorie->libelle, $filterValue)) {
            $sousCategorie_list[] = new SousCategorie_Model($sousCategorie->id, $sousCategorie->libelle, $sousCategorie->attributes()["categorie"]);
          }

          if ($operator == "equal" && ($sousCategorie->{$filterBy} == $filterValue || $sousCategorie->attributes()[$filterBy] == $filterValue)) {
            $sousCategorie_list[] = new SousCategorie_Model($sousCategorie->id, $sousCategorie->libelle, $sousCategorie->attributes()["categorie"]);
          }
        }
      }

      if (!isset($sousCategorie_list)) 
        return "Pas de categorie avec cette signature.";

      return $sousCategorie_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("sousCategories");

      foreach( $xml->children() as $sousCategorie){
        $sousCategorie_list[] = new SousCategorie_Model($sousCategorie->id, $sousCategorie->libelle, $sousCategorie->attributes()["categorie"]);
      }

      return $sousCategorie_list;
    }

    public function create() {
      $xml = parent::load_xml("sousCategories");
      $exist = parent::searchInXML($this->id, $xml)[0];

      if(!$exist){
        $sousCategorie = $xml->addChild("sousCategorie");
        $sousCategorie->addAttribute("categorie", $this->categorie);
        $sousCategorie->addChild("id", $this->id);
        $sousCategorie->addChild("libelle", $this->libelle);

        return Parent::saveInFile($xml,"sousCategories");
      }
      else
      {
        return "une sous_catégorie avec le meme identifiant existe déjà";
      }
    }

    public static function update($idSousCategorie, $newSousCategorie) {
      $xml = parent::load_xml("sousCategories");
      $exist = parent::searchInXML($idSousCategorie, $xml)[0];

      if($exist){
            $id = $xml->xpath("//sousCategorie/id[.='$idSousCategorie']")[0];
            $sousCategorie = current($id->xpath("parent::*"));

            $sousCategorie->libelle = $newSousCategorie->libelle;
            $sousCategorie->attributes()["categorie"] = $newSousCategorie->categorie;

            return Parent::saveInFile($xml,"sousCategories");
      }else{
        return "La catégorie n'existe pas.";
      }
    }

    public static function deleteSC($id) {
        if(isset($id))
            return parent::delete($id, "sousCategories", "sousCategorie", "id");
        else
            return "Vous devez entrer un identifiant.";
    }
  }
    // $c = new SousCategorie_Model("4", "libelle4", "1");
    // print_r($c::getAll());
    // echo $c->create();
    // $result = SousCategorie_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1]));
    // $c = is_array($result) ? $result[0] : $result;
    // echo $c->id;
?>