<?php
  Route::set("products", function() {
    Controller::CreateView("Products", [
      "products" => Produit_Model::getOne([["filterBy" => "sousCategorie", "opt" => "equal", "filterValue" => $_GET["id"]]])
    ]);
  });

  Route::set("product", function() {
    Controller::CreateView("Product", [
      "product" => Produit_Model::getOne([["filterBy" => "refProduit", "opt" => "equal", "filterValue" => $_GET["id"]]])[0]
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