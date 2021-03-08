<?php
  include "./Model.php";
  class Produit_Model extends Model {
    public $refProduit;
    public $libelle;
    public $prix;
    public $img;
    public $marque;
    public $sousCategorie;

    public function __construct($refProduit, $libelle, $prix, $img, $marque, $sousCategorie) {
      $this->refProduit = $refProduit;
      $this->libelle = $libelle;
      $this->prix = $prix;
      $this->img = $img;
      $this->marque = $marque;
      $this->sousCategorie= $sousCategorie;
    }

    public static function getAll() {
      $xml = parent::load_xml("produits");

      foreach($xml->children() as $product) {
        $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
      }

      return $products_list;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("produits") or die("Erreur de recupération des produits.");

      foreach($xml->children() as $product){

        foreach($where as $filter){
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if($operator == "like" && str_contains($product->libelle, $filterValue)){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if(!str_contains($product->{$filterBy}, $filterValue)){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equal" && $product->{$filterBy} == $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($product->{$filterBy} != $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gt" && $product->prix > $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix <= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gtE" &&  (int)$product->prix >= $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            // supprimerles produits qui ne respectent pas la condition
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix < $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "lt" && (int)$product->prix < $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix >= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "ltE" && (int)$product->prix <= $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"]);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix > $filterValue){
                unset($products_list[$i]);
              }
            }
          }
        }
      }
      if(!isset($products_list)) return "Pas de produit avec cette signature.";
      return $products_list;
    }

    private static function searchProductInXML($refProduit, $xml){
      $exist = false;
      foreach($xml->children() as $product){
        if($product->refProduit == $refProduit){
          $exist = true;
          $foundProduct = $product;
        }
      }
      return [$exist, @$foundProduct];
    }

    public function create() {
      $xml = parent::load_xml("produits");
      $exist = self::searchProductInXML($this->refProduit, $xml)[0];

      if(!$exist){
        $produit = $xml->addChild("produit");
        $produit->addAttribute("sousCategorie", $this->sousCategorie);
        $produit->addChild("refProduit", $this->refProduit);
        $produit->addChild("libelle", $this->libelle);
        $produit->addChild("prix", $this->prix);
        $produit->addChild("img", $this->img);

        return Parent::saveInFile($xml,"produits");
      }
      else
      {
        return "un produit avec la meme reference existe déjà";
      }
    }

    public static function update($RefProduct, $newProduit) {
      $xml = parent::load_xml("produits");
      $exist = self::searchProductInXML($RefProduct, $xml)[0];

      if($exist){
          $refProduit = $xml->xpath("//produit/refProduit[.='$RefProduct']")[0];
          $product = current($refProduit->xpath("parent::*"));

          $product->refProduit = $newProduit->refProduit;
          $product->libelle = $newProduit->libelle;
          $product->img = $newProduit->img;
          $product->prix = $newProduit->prix;

          return Parent::saveInFile($xml,"produits");
      }else{
        return "Le produit n'existe pas.";
      }
    }

    public static function deleteP($refProduit) {
      if(isset($refProduit))
        return parent::delete($refProduit, "produits", "produit", "refProduit");
      else
          return "Vous devez entrer une reference.";
    }

  }
  // $where = array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "gtE", "filterValue" => 200]);
  // $products_list = Produit_Model::getOne($where);
  // $p = new Produit_Model("4", "produit4", 6000, "ghali3liya");
  // $p1 = Produit_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => "5"]))[0];
  // $p2 = new Produit_Model("P5", "chiproduit", 6000, "l'innovation dans les produits.");
  // $result = $p->create();
    // echo Produit_Model::getAll()[0]->sousCategorie;
  // $resultModif = Produit_Model::update("P1", $p2);
  // $resultSuppre = Produit_Model::delete($p);
  // print_r($resultModif);
  // print_r($resultSuppre);
  // print_r($result);
  // print_r($products_list);
?>