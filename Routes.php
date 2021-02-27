<?php
  Route::set("index.php", function() {
    Accueil::CreateView("Home");
  });

  Route::set("login", function() {
    Produits::CreateView("Login");
  });
  
  Route::set("cart", function() {
    Produits::CreateView("Cart");
  });

  Route::set("produits", function() {
    Produits::CreateView("Produits");
  });
?>