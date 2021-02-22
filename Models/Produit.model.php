<?php
  include "./Model.php";
  class ProduitModel extends Model {
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
        $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
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
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if(!str_contains($product->{$filterBy}, $filterValue)){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equal" && $product->{$filterBy} == $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($product->{$filterBy} != $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "equalP" && $product->prix == $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
             for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix != $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gt" && $product->prix > $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix <= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "gtE" &&  (int)$product->prix >= $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
            // supprimerles produits qui ne respectent pas la condition
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix < $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "lt" && $product->prix < $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
            for($i = array_key_first($products_list); $i < count($products_list); $i++){
              if($products_list[$i]->prix >= $filterValue){
                unset($products_list[$i]);
              }
            }
          }
          if($operator == "ltE" && $product->prix <= $filterValue){
            $products_list[] = new ProduitModel($product->id, $product->libelle,  $product->prix,  $product->description);
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
        echo $xml->saveXML();
        return $xml->saveXML();
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
          //foreach ($xml->xpath("//produit[@id=$oldProduct->id]") as $produit) {
          foreach($xml->children() as $product) {
            if($product->id == $oldProduct->id) {
              $product->id = $newProduit->id;
              $product->libelle = $newProduit->libelle;
              $product->description = $newProduit->description;
              $product->prix = $newProduit->prix;
            }
          }

          return $xml->saveXML();

        }else{
          return "Le nouveau produit existe déjà";
        }
      }else{
        return "Le produit n'existe pas.";
      }
    }

    public function delete($product) {
      return;
    }

  }
  $where = array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "gtE", "filterValue" => 200]);
  $products_list = ProduitModel::getOne($where);
  $p = new ProduitModel("4", "makidadssaboun", 5000, "ghaliya3liya");
  $p1 = ProduitModel::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1]))[0];
  $p2 = new ProduitModel("5", "chiproduit", 5000, "l'innovation dans les produits.");
  $result = $p->create();
  $resultModif = ProduitModel::update($p, $p2);
  print_r($resultModif);
  print_r($result);
  print_r($products_list);
?>