<?php
  include "./Model.php";
  class ProduitModel extends Model{
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

          if($operator == "like" && str_contains($product->{$filterBy}, $filterValue)){
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

    public function create() {
    /*  $productString = "<produit>
                          <id>$this->id</id>
                          <libelle>$this->libelle</libelle>
                          <prix>$this->prix</prix>
                          <description>$this->description</description>
                        </produit>";*/
      //$xml = simplexml_load_string($productString);
      /*$xml = new XMLWriter();
      $xml->openUri($_SERVER['DOCUMENT_ROOT']."/Database/produits.xml");
      $xml->startDocument(); //create the document tag, you can specify the version and encoding here
      $xml->startElement("Produit"); //Create an element
        $xml->writeElement("id", $this->id);
        $xml->writeElement("libelle", $this->libelle);
        $xml->writeElement("prix", $this->prix);
        $xml->writeElement("description", $this->description);
      $xml->endElement(); //End the element
      return $xml->flush();*/
      $doc = new DOMDocument();
      $doc->preserveWhiteSpace = false;
      $doc->load($_SERVER['DOCUMENT_ROOT']."/Database/produits.xml");
      $allProducts = $doc->getElementsByTagName("produit");
      for($i = 0; $i < count($allProducts); $i++){
        if($allProducts->item($i)->firstChild);
      }
      $produitsList = $doc->getElementsByTagName("produits");
      $doc->formatOutput = true;
      $produits = $produitsList->item(0);
      $produit = $doc->createElement("produit");
        $id = $doc->createElement("id", $this->id);
        $description = $doc->createElement("description", $this->description);
        $libelle = $doc->createElement("libelle", $this->libelle);
        $prix = $doc->createElement("prix", $this->prix);
        $produit->appendChild($id);
        $produit->appendChild($libelle);
        $produit->appendChild($prix);
        $produit->appendChild($description);
      $produits->appendChild($produit);
      echo $doc->save($_SERVER['DOCUMENT_ROOT']."/Database/produits.xml");
    }

    public function update($oldProduct, $newproduit) {
      return;
    }

    public function delete($product) {
      return;
    }

  }
  $where = array(["filterBy" => "id", "opt" => "equal", "filterValue" => 1], ["filterBy" => "prix", "opt" => "gtE", "filterValue" => 200]);
  $products_list = ProduitModel::getOne($where);
  $p = new ProduitModel("4", "makidadssaboun", 5000, "ghaliya3liya");
  $result = $p->create();
  print_r($result);
  print_r($products_list);
?>