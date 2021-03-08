<?php
  Route::set("", function() {
    Controller::CreateView("Home");
  });

  Route::set("login", function() {
    Controller::CreateView("Login");
  });
  
  Route::set("cart", function() {
    Controller::CreateView("Cart");
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment");
  });

  Route::set("product", function() {
    Controller::CreateView("Product");
  });

  Route::set("admin/users", function() {
    Controller::CreateView("AdminUsers");
  });

  Route::set("admin/products", function() {
    Controller::CreateView("AdminProducts");
  });
  
  Route::post("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $obj = new Produit_Model($data, "", "", "", "", "");
    $res = $obj->create();
    echo json_encode($res);
  });
  
  Route::patch("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::update($data["refProduit"], new Produit_Model($data["refProduit"], $data["libelle"], $data["prix"], $data["img"], $data["marque"], $data["sousCategorie"]));
    echo json_encode($res);
  });

  Route::delete("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::deleteP($data);
    echo json_encode($res);
  });

?>