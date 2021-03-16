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

      $products_list = array();
      $i = 0;
      $listProduits = (array)$xml->children();
      foreach ($listProduits as $product) {
        $iMin = $i;
        for ($j = $i + 1; $j < count($listProduits); $j++) {
          $date = DateTime::createFromFormat('j/m/Y', $product->dateAjout);
          //if (date_diff(new DateTime(), $date)->d < );
        }
        if (count($products_list) <= 12)
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
        $i++;
      }

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
              $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            $max = count($produitsCommandees);
          }
        }
      }

      return $products_list;
    }

    public static function getPetitsPrix() {
      $xml = parent::load_xml("produits");

      $products_list = array();
      foreach ($xml->children() as $product) {
        if((float)$product->prix <= 300.0) {
          if (count($products_list) <= 12)
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
        }
      }

      return $products_list;
    }

    public static function getAll() {
      $xml = parent::load_xml("produits");

      foreach ($xml->children() as $product) {
        $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
      }

      return $products_list;
    }

    public static function getOne($where) {
      $xml = parent::load_xml("produits") or die("Erreur de recupération des produits.");

      foreach ($xml->children() as $product) {

        foreach ($where as $filter) {
          $filterBy = $filter["filterBy"];
          $operator = $filter["opt"];
          $filterValue = $filter["filterValue"];

          if ($operator == "like" && str_contains($product->libelle, $filterValue)) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if (!str_contains($product->{$filterBy}, $filterValue)) {
                unset($products_list[$i]);
              }
            }
          }

          if ($operator == "equal" && ($product->{$filterBy} == $filterValue || $product->attributes()[$filterBy] == $filterValue)) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if ($product->{$filterBy} != $filterValue && $product->attributes()[$filterBy] != $filterValue) {
                unset($products_list[$i]);
              }
            }
          }

          if ($operator == "gt" && $product->prix > $filterValue) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if ($products_list[$i]->prix <= $filterValue) {
                unset($products_list[$i]);
              }
            }
          }

          if ($operator == "gtE" &&  (int)$product->prix >= $filterValue) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            // supprimerles produits qui ne respectent pas la condition
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if ($products_list[$i]->prix < $filterValue) {
                unset($products_list[$i]);
              }
            }
          }

          if ($operator == "lt" && (int)$product->prix < $filterValue) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if ($products_list[$i]->prix >= $filterValue) {
                unset($products_list[$i]);
              }
            }
          }

          if ($operator == "ltE" && (int)$product->prix <= $filterValue) {
            $products_list[] = new Produit_Model($product->refProduit, $product->libelle, $product->prix, $product->img, $product->marque, $product->attributes()["sousCategorie"], $product->dateAjout);
            for ($i = array_key_first($products_list); $i < count($products_list); $i++) {
              if ($products_list[$i]->prix > $filterValue) {
                unset($products_list[$i]);
              }
            }
          }
        }
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