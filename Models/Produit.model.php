<?php
  class ProduitModel extends Model {
    public $id;
    public $libellee;
    public $prix;
    public $description;

    public function __construct($id, $libellee, $prix, $description) {
      $this->id = $id;
      $this->libellee = $libellee;
      $this->prix = $prix;
      $this->description = $description;
    }

    public static function getAll() {
      $xml = self::load_xml("produit");

      return $xml->children();
    }

    public static function getOne($where) {
      return;
    }

    public function create() {
      return;
    }

    public function update($newproduit) {
      return;
    }

    public function delete() {
      return;
    }
  }
?>