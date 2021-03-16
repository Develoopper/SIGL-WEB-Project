<?php
  // include "./Model.php";

  class Commande_Model extends Model {
    public static $NbreCommandes;
    public $numCommande;
    public $libelle;
    public $dateCommande;
    public $etat;
    public $montant;
    public $login;

    public function __construct($numCommande, $libelle, $dateCommande, $etat, $montant, $login) {
      if ($numCommande == "")
        $this->numCommande = self::$NbreCommandes++;
      else
        $this->numCommande = $numCommande;

      if ($libelle == "")
        $this->libelle = "commande".$this->numCommande;
      else
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
      $exist = parent::searchInXML($this->numCommande, $xml)[0];

      if(!$exist){
        $commande = $xml->addChild("commande");
        $commande->addAttribute("login", $this->login);
        $commande->addChild("numCommande", $this->numCommande);
        $commande->addChild("libelle", $this->libelle);
        $commande->addChild("dateCommande", $this->dateCommande);
        $commande->addChild("etat", $this->etat);
        $commande->addChild("montant", $this->montant);

        if (Parent::saveInFile($xml, "commandes") == 1)
          return $this->numCommande;
      } else {
        return "une commande avec le meme numéro existe déjà";
      }
    }

    public static function update($numCommande, $newCommande) {
      $xml = parent::load_xml("commandes");
      $exist = parent::searchInXML($numCommande, $xml)[0];

      if($exist){
        $id = $xml->xpath("//commande/numCommande[.='$numCommande']")[0];
        $commande = current($id->xpath("parent::*"));

        $commande->dateCommande = $newCommande->dateCommande;
        $commande->etat = $newCommande->etat;
        $commande->montant = $newCommande->montant;
        $commande->libelle = $newCommande->libelle;

        return Parent::saveInFile($xml,"commandes");
      }else{
        return "La commande n'existe pas.";
      }
    }

    public static function deleteCmd($numCommande) {
      if(isset($numCommande))
        return parent::delete($numCommande, "commandes", "commande", "numCommande");
      else
        return "Vous devez entrer un numero de commande.";
    }
  }

  // $obj = new Commande_Model("", "", "date", "etatCmd", "dateCmd", "montant","login");
  // $res = $obj->create();
  // echo $res;

?>