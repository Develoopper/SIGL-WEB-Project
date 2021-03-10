<?php
  // include "./Models/Model.php";
  include "./Models/Produit.model.php";
  // include "./Models/Categorie.model.php";
  // include "./Models/Commande.model.php";
  // include "./Models/SousCategorie.model.php";
  // include "./Models/User.model.php";
  include "./Middlewares/login.php";

  Route::set("", function() {
    Controller::CreateView("Home", []);
  });

  Route::set("login", function () {
      Auth()
    },
    function() {
    // create a session and set a cookie
    Controller::CreateView("Login", []);
  });

  Route::set("cart", function() {
    Controller::CreateView("Cart", []);
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment", []);
  });

  Route::set("product", function() {
    Controller::CreateView("Product", [
      "product" => Produit_Model::getOne([["filterBy" => "refProduit", "opt" => "equal", "filterValue" => $_GET["id"]]])[0]
    ]);
  });

  Route::set("admin/users", function() {
    Controller::CreateView("AdminUsers", []);
  });

  Route::set("admin/products", function() {
    Controller::CreateView("AdminProducts", []);
  });

  Route::set("signIn", function(){
      signIn();
      // CreateView("SignIn", []);
  });

  Route::set("signUp", function(){
      signUp();
  });

  include "Routers/produit.router.php";

?>