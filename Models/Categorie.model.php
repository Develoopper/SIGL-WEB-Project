<?php
  include "./Model.php";

  class Categorie_Model extends Model {
    public $id;
    public $libelle;

    public function __construct($id, $libelle) {
      $this->id = $id;
      $this->libelle = $libelle;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("produits") or die("Erreur de recupération des produits.");

      foreach($xml->children() as $categorie){

        foreach($where as $filter){
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if($operator == "like" && str_contains($categorie->libelle, $filterValue)){
            $products_list[] = new Categorie_Model($categorie->refProduit, $categorie->libelle);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if(!str_contains($categorie->{$filterBy}, $filterValue)){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equal" && $categorie->{$filterBy} == $filterValue){
            $categories_list[] = new Categorie_Model($categorie->refProduit, $categorie->libelle);
            for($i = array_key_first($categories_list); $i < count($categories_list); $i++){
              if($categorie->{$filterBy} != $filterValue){
                unset($categories_list[$i]);
              }
            }
          }
        }
      }
      return $categories_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("categories");

      foreach( $xml->children() as $categorie){
        $categories_list[] = new Categorie_Model($categorie->id, $categorie->libelle);
      }

      return $categories_list;
    }

    private static function searchCategorieInXML($idCategorie, $xml){
      $exist = false;
      foreach($xml->children() as $categorie){
        if($categorie->id == $idCategorie){
          $exist = true;
        }
      }
      return [$exist, $categorie];
    }

    public function create() {
      $xml = parent::load_xml("categories");
      $exist = self::searchCategorieInXML($this, $xml)[0];

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
      [$exist, $oldProduct] = self::searchCategorieInXML($idCategorie, $xml);

      if($exist){
        $existNew = self::searchCategorieInXML($newCategorie->id, $xml)[0];

        if(!$existNew){
            $id = $xml->xpath("//categorie/id[.='$oldProduct->id']")[0];
            $categorie = current($id->xpath("parent::*"));

            $categorie->id = $newCategorie->id;
            $categorie->libelle = $newCategorie->libelle;

            return Parent::saveInFile($xml,"categories");
        }else{
          return "La nouvelle catégorie existe déjà";
        }
      }else{
        return "La catégorie n'existe pas.";
      }
    }
  }
    $c = new Categorie_Model("4", "libelle4");
    echo $c::getAll()[0]->id;

?>