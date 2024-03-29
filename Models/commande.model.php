<?php
  // include "./Model.php";

  class Commande_Model extends Model {
    public $numCommande;
    public $libelle;
    public $dateCommande;
    public $etat;
    public $montant;
    public $login;

    public function __construct($numCommande, $libelle, $dateCommande, $etat, $montant, $login) {
      $xml = parent::load_xml("commandes");

      if ($numCommande == "") {
        $this->numCommande = count($xml->children()) + 1;
      } else
        $this->numCommande = $numCommande;

      if ($libelle == "")
        $this->libelle = "commande" . $this->numCommande;
      else
        $this->libelle = $libelle;

      $this->dateCommande = $dateCommande;
      $this->montant = $montant;
      $this->login = $login;
      $this->etat = $etat;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("commandes");

      $cmds_list = array();

      foreach($xml->children() as $cmd) {

        $valide = true;

        foreach($where as $filter) {
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if($operator == "like" && !(str_contains($cmd->libelle, $filterValue)))
            $valide = false;
          if($operator == "equal" && !($cmd->{$filterBy} == $filterValue || $cmd->attributes()[$filterBy] == $filterValue))
            $valide = false;

        }

        if($valide)
          array_push($cmds_list, new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->dateCommande, $cmd->etat, $cmd->montant, $cmd->attributes()["login"]));
      }

      if(!isset($cmds_list))
        return "Pas de commande avec cette signature.";

      return $cmds_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("commandes");

      $cmds_list = array();

      foreach( $xml->children() as $cmd){
        $cmds_list[] = new Commande_Model($cmd->numCommande, $cmd->libelle, $cmd->dateCommande, $cmd->etat, $cmd->montant, $cmd->attributes()["login"]);
      }

      return $cmds_list;
    }

    public function create() {
      $xml = parent::load_xml("commandes");
      $exist = self::searchInCommandeXML($this->numCommande, $xml)[0];;

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

    protected static function searchInCommandeXML($numCommande, $xml) {
      $exist = false;
      foreach($xml->children() as $element){
        if($element->numCommande == $numCommande){
          $exist = true;
          $foundElement = $element;
        }
      }
      return [$exist, @$foundElement];
    }

    public static function update($numCommande, $etat) {
      $xml = parent::load_xml("commandes");
      $exist = self::searchInCommandeXML($numCommande, $xml)[0];

      if($exist){
        $id = $xml->xpath("//commande/numCommande[.='$numCommande']")[0];
        $commande = current($id->xpath("parent::*"));

        $commande->etat = $etat;

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
  $commandes = Commande_Model::getOne([
		["filterBy" => "login", "opt" => "equal", "filterValue" => "7f720bdd61099c18f3fb859a1c035a03"]
	]);
  // var_dump($commandes);

  // $obj = new Commande_Model("", "", "date", "etatCmd", "dateCmd", "montant","login");
  // $res = $obj->create();
  // echo $res;
