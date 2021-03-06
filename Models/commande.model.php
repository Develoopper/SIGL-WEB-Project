<?php
  include "./Model.php";

  class Commande_Model extends Model {
    public $numCommande;
    public $libelle;
    public $dateCommande;
    public $etat;
    public $montant;
    public $login;

    public function __construct($numCommande, $libelle, $dateCommande, $etat, $montant, $login) {
      $this->numCommande = $numCommande;
      $this->libelle = $libelle;
      $this->dateCommande = $dateCommande;
      $this->montant = $montant;
      $this->login = $login;
      $this->etat = $etat;
    }

    public static function getOne($where) {
        $xml = parent::load_xml("commandes");

        foreach($xml->children() as $cmd){

            foreach($where as $filter){
                $filterBy = $filter["filterBy"];
                $operator = $filter["opt"];
                $filterValue = $filter["filterValue"];

                if($operator == "like" && str_contains($cmd->libelle, $filterValue)){
                    $cmds_list[] = new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->dateCommande, $cmd->etat, $cmd->montant, $cmd->attributes()["login"]);
                }
                if($operator == "equal" && $cmd->{$filterBy} == $filterValue){
                    $cmds_list[] = new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->dateCommande, $cmd->etat, $cmd->montant, $cmd->attributes()["login"]);
                }

            }
        }
        if(!isset($cmds_list)) return "Pas de commande avec cette signature.";
        return $cmds_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("commandes");

      foreach( $xml->children() as $cmd){
        $cmds_list[] = new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->dateCommande, $cmd->etat, $cmd->montant, $cmd->attributes()["login"]);
      }

      return $cmds_list;
    }

    public function create() {
      $xml = parent::load_xml("commandes");
      $exist = parent::searchInXML($this->id, $xml)[0];

      if(!$exist){
        $commande = $xml->addChild("commande");
        $commande->addAttribute("login", $this->login);
        $commande->addChild("numCommande", $this->numCommande);
        $commande->addChild("libelle", $this->libelle);
        $commande->addChild("date", $this->dateCommande->format('Y-m-d H:i:s'));
        $commande->addChild("etat", $this->etat);
        $commande->addChild("montant", $this->montant);

        return Parent::saveInFile($xml, "commandes");
      }
      else
      {
        return "une commande avec le meme numéro existe déjà";
      }
    }

    public static function update($numCommande, $newCommande) {
      $xml = parent::load_xml("commandes");
      $exist = parent::searchInXML($numCommande, $xml)[0];

      if($exist){
        $id = $xml->xpath("//commande/numCommande[.='$numCommande']")[0];
        $categorie = current($id->xpath("parent::*"));

        $categorie->libelle = $newCommande->libelle;

        return Parent::saveInFile($xml,"commandes");
      }else{
        return "La commande n'existe pas.";
      }
    }

    public static function deleteCmd($id) {
      if(isset($id))
        return parent::delete($id, "commandes", "commande", "numCommande");
      else
        return "Vous devez entrer un numero de commande.";
    }
  }

?>