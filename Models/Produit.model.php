<?php
  include "./Model.php";
  class Produit_Model extends Model {
    private $id;
    private $libelle;
    private $prix;
    private $description;

    public function __construct($id, $libelle, $prix, $description) {
      $this->id = $id;
      $this->libelle = $libelle;
      $this->prix = $prix;
      $this->description = $description;
    }

    public static function getAll() {
      $xml = parent::load_xml("produits");

      foreach( $xml->children() as $product){
        $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
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
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if(!str_contains($product->{$filterBy}, $filterValue)){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equal" && $product->{$filterBy} == $filterValue){
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($product->{$filterBy} != $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gt" && $product->prix > $filterValue){
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix <= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gtE" &&  (int)$product->prix >= $filterValue){
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            // supprimerles produits qui ne respectent pas la condition
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix < $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "lt" && $product->prix < $filterValue){
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix >= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "ltE" && $product->prix <= $filterValue){
            $products_list[] = new Produit_Model($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix > $filterValue){
                unset($products_list[$i]);
              }
            }
          }
        }
      }
      return $products_list;
    }

    private static function searchProductInXML($produit, $xml){
      $exist = false;
      foreach($xml->children() as $product){
        if($product->id == $produit->id){
          $exist = true;
        }
      }
      return [$exist, $produit];
    }

    public function create() {
      $xml = parent::load_xml("produits");
      $exist = self::searchProductInXML($this, $xml)[0];
      if(!$exist){
        $produit = $xml->addChild("produit");
        $produit->addChild("id", $this->id);
        $produit->addChild("libelle", $this->libelle);
        $produit->addChild("prix", $this->prix);
        $produit->addChild("description", $this->description);

        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->saveXML());
        $dom->save("../Database/produits.xml");
        return true;
      }
      else
      {
        return "un produit avec le meme identifiant existe déjà";
      }
    }

    public static function update($oldProduct, $newProduit) {
      $xml = parent::load_xml("produits");
      [$exist, $oldProduct] = self::searchProductInXML($oldProduct, $xml);

      if($exist){
        echo $oldProduct->id ."</br>";
        [$existNew, $newProduct] = self::searchProductInXML($newProduit, $xml);

        if(!$existNew){
          echo $newProduct->id . "</br>";
          $id = $xml->xpath("//produit/id[.='$oldProduct->id']")[0];
          $product = current($id->xpath("parent::*"));

          $product->id = $newProduit->id;
          $product->libelle = $newProduit->libelle;
          $product->description = $newProduit->description;
          $product->prix = $newProduit->prix;

          $dom = new DOMDocument("1.0");
          $dom->preserveWhiteSpace = false;
          $dom->formatOutput = true;
          $dom->loadXML($xml->saveXML());
          $dom->save("../Database/produits.xml");
          return true;

        }else{
          return "Le nouveau produit existe déjà";
        }
      }else{
        return "Le produit n'existe pas.";
      }
    }

    public static function delete($product) {
      $xml = parent::load_xml("produits");
      [$exist, $oldProduct] = self::searchProductInXML($product, $xml);

      if($exist) {
        $id = $xml->xpath("//produit/id[.='$oldProduct->id']");
        $product = current($id[0]->xpath("parent::*"));
        echo $product[0];
        if (!empty($product)) {
          unset($product[0]);
        }
      }

      $dom = new DOMDocument("1.0");
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;
      $dom->loadXML($xml->saveXML());
      $dom->save("../Database/produits.xml");
      return true;
    }

  }
  // $where = array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "gtE", "filterValue" => 200]);
  // $products_list = Produit_Model::getOne($where);
  $p = new Produit_Model("4", "produit4", 6000, "ghali3liya");
  // $p1 = Produit_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => "5"]))[0];
  $p2 = new Produit_Model("5", "chiproduit", 6000, "l'innovation dans les produits.");
  // $result = $p->create();
  $resultModif = Produit_Model::update($p, $p2);
  // $resultSuppre = Produit_Model::delete($p);
  print_r($resultModif);
  // print_r($resultSuppre);
  // print_r($result);
  // print_r($products_list);
?>