<?php
  // include "./Models/Model.php";
  include "./Models/Produit.model.php";
  // include "./Models/Categorie.model.php";
  // include "./Models/Commande.model.php";
  // include "./Models/SousCategorie.model.php";
  // include "./Models/Utilisateur.model.php";
  include './Controllers/panier.php';
  include 'Middlewares/Auth.php';
  include 'Middlewares/PreventAuth.php';

  Route::set("", function() {
    Controller::CreateView("Home", []);
  });

  Route::set("cart", function() {
    Controller::CreateView("Cart", []);
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment", []);
  });

  Route::set("addToCart", "Auth", function() {
    // addProduct();
  });

  include "Routers/admin.router.php";
  include "Routers/produit.router.php";
  include "Routers/utilisateur.router.php";
  include "Routers/categorie.router.php";
  include "Routers/sousCategorie.router.php";

?>