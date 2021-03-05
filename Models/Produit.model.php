<?php
  include "./Model.php";
  class Produit_Model extends Model {
    public $refProduit;
    public $libelle;
    public $prix;
    public $description;

    public function __construct($refProduit, $libelle, $prix, $description) {
      $this->refProduit = $refProduit;
      $this->libelle = $libelle;
      $this->prix = $prix;
      $this->description = $description;
    }

    public static function getAll() {
      $xml = parent::load_xml("produits");

      foreach( $xml->children() as $product){
        $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
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
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if(!str_contains($product->{$filterBy}, $filterValue)){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equal" && $product->{$filterBy} == $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($product->{$filterBy} != $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gt" && $product->prix > $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix <= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gtE" &&  (int)$product->prix >= $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
            // supprimerles produits qui ne respectent pas la condition
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix < $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "lt" && (int)$product->prix < $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix >= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "ltE" && (int)$product->prix <= $filterValue){
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle,  $product->prix,  $product->description);
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
        }
      }
      return [$exist, $product];
    }

    public function create() {
      $xml = parent::load_xml("produits");
      $exist = self::searchProductInXML($this->refProduit, $xml)[0];

      if(!$exist){
        $produit = $xml->addChild("produit");
        $produit->addChild("refProduit", $this->refProduit);
        $produit->addChild("libelle", $this->libelle);
        $produit->addChild("prix", $this->prix);
        $produit->addChild("description", $this->description);

        return Parent::saveInFile($xml,"produits");
      }
      else
      {
        return "un produit avec la meme reference existe déjà";
      }
    }

    public static function update($RefProduct, $newProduit) {
      $xml = parent::load_xml("produits");
      [$exist, $oldProduct] = self::searchProductInXML($RefProduct, $xml);

      if($exist){
        $existNew = self::searchProductInXML($newProduit->refProduit, $xml)[0];

        if(!$existNew){
          $refProduit = $xml->xpath("//produit/refProduit[.='$oldProduct->refProduit']")[0];
          $product = current($refProduit->xpath("parent::*"));

          $product->refProduit = $newProduit->refProduit;
          $product->libelle = $newProduit->libelle;
          $product->description = $newProduit->description;
          $product->prix = $newProduit->prix;

          return Parent::saveInFile($xml,"produits");

        }else{
          return "Le nouveau produit existe déjà";
        }
      }else{
        return "Le produit n'existe pas.";
      }
    }

    public static function delete($refProduit) {
      $xml = parent::load_xml("produits");
      [$exist, $Produit] = self::searchProductInXML($refProduit, $xml);

      if($exist) {
        $refProduit = $xml->xpath("//produit/refProduit[.='$Produit->refProduit']");
        $product = current($refProduit[0]->xpath("parent::*"));

        if (!empty($product)) {
          unset($product[0]);
        }
      }

      return Parent::saveInFile($xml,"produits");

    }

  }
  // $where = array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "gtE", "filterValue" => 200]);
  // $products_list = Produit_Model::getOne($where);
  // $p = new Produit_Model("4", "produit4", 6000, "ghali3liya");
  // $p1 = Produit_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => "5"]))[0];
  // $p2 = new Produit_Model("P5", "chiproduit", 6000, "l'innovation dans les produits.");
  // $result = $p->create();
  // $resultModif = Produit_Model::update("P1", $p2);
  // $resultSuppre = Produit_Model::delete($p);
  // print_r($resultModif);
  // print_r($resultSuppre);
  // print_r($result);
  // print_r($products_list);
?>