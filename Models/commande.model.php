<?php
  include "./Model.php";

  class Commande_Model extends Model {
    public $numCommande;
    public $libelle;
    public $dateCommande;
    public $montant;
    public $login;

    public function __construct($numCommande, $libelle, $dateCommande, $montant, $login) {
      $this->numCommande = $numCommande;
      $this->libelle = $libelle;
      $this->dateCommande = $dateCommande;
      $this->montant = $montant;
      $this->login = $login;
    }

    public static function getOne($where) {
        $xml = parent::load_xml("commandes") or die("Erreur de recupération des commandes.");

        foreach($xml->children() as $cmd){

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "like" && str_contains($cmd->libelle, $filterValue)){
                    $cmds_list[] = new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->);
                }
                if($operator == "equal" && $cmd->{$filterBy} == $filterValue){
                    $cmds_list[] = new Commande_Model($cmd->id, $cmd->libelle);
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

?>