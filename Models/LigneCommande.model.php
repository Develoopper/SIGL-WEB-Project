<?php
  include "./Model.php";

  class LigneCommande_Model extends Model {
    public $id;
    public $commande;
    public $produit;

    public function __construct($commande, $produit) {
      $this->id = md5($commande.$produit);
      $this->commande = $commande;
      $this->produit = $produit;
    }

    public static function getOne($where) {
        $xml = parent::load_xml("ligneCommandes");

        foreach($xml->children() as $ligneCmd){

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "equal" && $ligneCmd->{$filterBy} == $filterValue){
                    $lignesCmds_list[] = new LigneCommande_Model($ligneCmd->commande, $ligneCmd->produit);
                }
            }
        }
        if(!isset($lignesCmds_list)) return "Pas de ligne de commande avec cette signature.";
        return $lignesCmds_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("ligneCommandes");

      foreach( $xml->children() as $ligneCmd){
        $lignesCmds_list[] = new LigneCommande_Model($ligneCmd->commande, $ligneCmd->produit);
      }

      return $lignesCmds_list;
    }

    public function create() {
      $xml = parent::load_xml("ligneCommandes");
      $exist = parent::searchInXML($this->id, $xml)[0];

      if(!$exist){
        $commande = $xml->addChild("ligneCommande");
        $commande->addChild("commande", $this->commande);
        $commande->addChild("produit", $this->produit);

        return Parent::saveInFile($xml, "ligneCommandes");
      }
      else
      {
        return "une ligne de commande avec le meme numéro existe déjà";
      }
    }

    public static function update($id, $newLigneCommande) {
      $xml = parent::load_xml("ligneCommandes");
      $exist = parent::searchInXML($id, $xml)[0];

      if($exist){
        $id = $xml->xpath("//ligneCommande/id[.='$id']")[0];
        $ligneCommande = current($id->xpath("parent::*"));

        $ligneCommande->commande = $newLigneCommande->commande;
        $ligneCommande->produit = $newLigneCommande->produit;

        return Parent::saveInFile($xml,"commandes");
      }else{
        return "La ligne de commande n'existe pas.";
      }
    }

    public static function deleteLigneCmd($id) {
      if(isset($id))
        return parent::delete($id, "ligneCommandes", "ligneCommande", "id");
      else
        return "Vous devez entrer un numero de ligne de commande.";
    }
  }

?>