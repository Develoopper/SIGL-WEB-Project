<?php
  // include "./Model.php";

  class Produit_Model extends Model {
    public $refProduit;
    public $libelle;
    public $prix;
    public $img;
    public $marque;
    public $sousCategorie;
    public $dateAjout;

    public function __construct($refProduit, $libelle, $prix, $img, $marque, $sousCategorie, $dateAjout) {
      $this->refProduit = $refProduit;
      $this->libelle = $libelle;
      $this->prix = $prix;
      $this->img = $img;
      $this->marque = $marque;
      $this->sousCategorie = $sousCategorie;
      $this->dateAjout =  $dateAjout;
    }

    public static function getNouveaute() {
      $xml = parent::load_xml("produits");

      foreach($xml->children() as $product)
      {
        array_push($products_list, new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout));
      }

      usort($products_list, function($p1, $p2){
        return strtotime($p1->dateAjout) - strtotime($p2->dateAjout);
      });

      $products_list = array_slice($products_list, 0, 12);

      return $products_list;
    }

    public static function getMeilleursVentes() {
      $xml = parent::load_xml("produits");

      $products_list = array();

      foreach ($xml->children() as $product) {
        $produitsCommandees = LigneCommande_Model::getOne([["filterBy" => "produit", "opt" => "equal", "filterValue" => $product->refProduit]]);
        if (is_array($produitsCommandees)) {
          $max = count($produitsCommandees);
          if (count($produitsCommandees) > $max) {
            if (count($products_list) <= 12)
              array_push($products_list, new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout));
            $max = count($produitsCommandees);
          }
        }
      }

      return $products_list;
    }

    public static function getPetitsPrix() {
      $xml = parent::load_xml("produits");

      $products_list = array();

      foreach($xml->children() as $product) {
        array_push($products_list, new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout));
      }

      usort($products_list, function($p1, $p2){
        return (float)($p1->prix) - (float)($p2->prix);
      });

      $products_list = array_slice($products_list, 0, 12);

      return $products_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("produits");

      foreach ($xml->children() as $product) {
        array_push($products_list, new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout));
      }

      return $products_list;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("produits");

      $products_list = array();
      $i = 0;

      foreach ($xml->children() as $product) {
        $i++;
        $valide = true;

        foreach ($where as $filter) {

          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if ($operator == "like" && !(str_contains($product->libelle, $filterValue)))
            $valide = false;

          if ($operator == "equal" && !(($product->{$filterBy} == $filterValue || $product->attributes()[$filterBy] == $filterValue)))
            $valide = false;

          if ($operator == "gt" && !((float)$product->prix > $filterValue))
            $valide = false;

          if ($operator == "gtE" && !((float)$product->prix >= $filterValue))
            $valide = false;

          if ($operator == "lt" && !((float)$product->prix < $filterValue))
            $valide = false;

          if ($operator == "ltE" && !(((float)$product->prix) <= $filterValue))
            $valide = false;

        }

        if ($valide)
          array_push($products_list, new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout));
      }

      if (!isset($products_list))
        return "Pas de produit avec cette signature.";

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
        $produit->addChild("marque", $this->marque);
        $produit->addChild("dateAjout", $this->dateAjout);

        return Parent::saveInFile($xml, "produits");
      }
      else
      {
        return "un produit avec la meme reference existe déjà";
      }
    }

    public static function update($RefProduct, $newProduit) {
      $xml = parent::load_xml("produits");
      $exist = self::searchProductInXML($RefProduct, $xml)[0];

      if ($exist) {
        $refProduit = $xml->xpath("//produit/refProduit[.='$RefProduct']")[0];
        $product = current($refProduit->xpath("parent::*"));

        $product->refProduit = $newProduit->refProduit;
        $product->libelle = $newProduit->libelle;
        $product->prix = $newProduit->prix;
        $product->img = $newProduit->img;
        $product->marque = $newProduit->marque;
        $product->dateAjout = $newProduit->dateAjout;
        $product->attributes()["sousCategorie"] = $newProduit->sousCategorie;

        return Parent::saveInFile($xml,"produits");
      } else {
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
  // $where = array(["filterBy" => "sousCategorie", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "lt", "filterValue" => 600.0]);
  // $products_list = Produit_Model::getOne($where);
  // $p = new Produit_Model("4", "produit4", 6000, "ghali3liya");
  // $p1 = Produit_Model::getOne(array(["filterBy" => "id", "opt" => "equal", "filterValue" => "5"]));
  // echo "<script>console.log(JSON.parse('".json_encode($products_list)."'))</script>"
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