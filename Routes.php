<?php
  // include "./Models/Model.php";
  include "./Models/Produit.model.php";
  // include "./Models/Categorie.model.php";
  // include "./Models/Commande.model.php";
  // include "./Models/SousCategorie.model.php";
  // include "./Models/Utilisateur.model.php";
  include './Controllers/panier.php';

  Route::set("", function() {
    Controller::CreateView("Home", []);
  });

  Route::set("login", function () {
    // create a session and set a cookie
    Controller::CreateView("Login", []);
  });

  Route::set("cart", function() {
    Controller::CreateView("Cart", []);
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment", []);
  });

  Route::set("admin/users", function() {
    Controller::CreateView("AdminUsers", []);
  });

  Route::set("admin/products", function() {
    Controller::CreateView("AdminProducts", []);
  });

  Route::set("signIn", function(){
    Utilisateur_Controller::signIn();
    // CreateView("SignIn", []);
  });

  Route::set("signUp", function(){
    Utilisateur_Controller::signUp();
  });

  Route::set("addToCart", function(){
    // addProduct();
  });

  include "Routers/produit.router.php";

?>