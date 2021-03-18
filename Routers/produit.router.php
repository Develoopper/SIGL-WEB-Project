<?php
  Route::set("products", function() {
    Controller::CreateView("Products", [
      "products" => Produit_Model::getOne([["filterBy" => "sousCategorie", "opt" => "equal", "filterValue" => $_GET["id"]]])
    ]);
  });

  Route::set("product", function() {
    $produit = Produit_Model::getOne([["filterBy" => "refProduit", "opt" => "equal", "filterValue" => $_GET["id"]]])[0];
    $sousCategorie = SousCategorie_Model::getOne([["filterBy" => "id", "opt" => "equal", "filterValue" => (int)$produit->sousCategorie]])[0];
    $categorie = Categorie_Model::getOne([["filterBy" => "id", "opt" => "equal", "filterValue" => (int)$sousCategorie->categorie]])[0];

    Controller::CreateView("Product", [
      "produit" => $produit,
      "sousCategorie" => $sousCategorie,
      "categorie" => $categorie,
    ]);
  });

  Route::get("products", function() {
    Produit_Controller::get();
  });

  Route::post("products", function() {
    Produit_Controller::post();
  });
  
  Route::patch("products", function() {
    Produit_Controller::patch();
  });

  Route::delete("products", function() {
    Produit_Controller::delete();
  });
?>