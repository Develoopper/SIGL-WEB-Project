<?php
  include "./Model.php";

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
        $xml = parent::load_xml("Sous_categories") or die("Erreur de recupération des categories.");

        foreach($xml->children() as $Sous_categorie) {

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "like" && str_contains($Sous_categorie->libelle, $filterValue)){
                    $Sous_categorie_list[] = new SousCategorie_Model($Sous_categorie->id, $Sous_categorie->libelle, $Sous_categorie->attributes()["categorie"]);
                }
                if($operator == "equal" && $Sous_categorie->{$filterBy} == $filterValue){
                    $Sous_categorie_list[] = new SousCategorie_Model($Sous_categorie->id, $Sous_categorie->libelle, $Sous_categorie->attributes()["categorie"]);
                }

            }
        }
        if(!isset($Sous_categorie_list)) return "Pas de categorie avec cette signature.";
        return $Sous_categorie_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("Sous_categories");

      foreach( $xml->children() as $Sous_categorie){
        $Sous_categorie_list[] = new SousCategorie_Model($Sous_categorie->id, $Sous_categorie->libelle, $Sous_categorie->attributes()["categorie"]);
      }

      return $Sous_categorie_list;
    }

    public function create() {
      $xml = parent::load_xml("Sous_categories");
      $exist = parent::searchInXML($this->id, $xml)[0];

      if(!$exist){
        $sousCategorie = $xml->addChild("sousCategorie");
        $sousCategorie->addAttribute("categorie", $this->categorie);
        $sousCategorie->addChild("id", $this->id);
        $sousCategorie->addChild("libelle", $this->libelle);

        return Parent::saveInFile($xml,"Sous_categories");
      }
      else
      {
        return "une sous_catégorie avec le meme identifiant existe déjà";
      }
    }

    public static function update($idSousCategorie, $newSousCategorie) {
      $xml = parent::load_xml("Sous_categories");
      $exist = parent::searchInXML($idSousCategorie, $xml)[0];

      if($exist){
            $id = $xml->xpath("//sousCategorie/id[.='$idSousCategorie']")[0];
            $SousCategorie = current($id->xpath("parent::*"));

            $SousCategorie->libelle = $newSousCategorie->libelle;

            return Parent::saveInFile($xml,"Sous_categories");
      }else{
        return "La catégorie n'existe pas.";
      }
    }

    public static function deleteSC($id) {
        if(isset($id))
            return parent::delete($id, "Sous_Categories", "sousCategorie", "id");
        else
            return "Vous devez entrer un identifiant.";
    }
  }
    $c = new SousCategorie_Model("4", "libelle4", "1");
    print_r($c::getAll());
    echo $c->create();
    $result = SousCategorie_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1]));
    $c = is_array($result) ? $result[0] : $result;
    echo $c->id;
?>