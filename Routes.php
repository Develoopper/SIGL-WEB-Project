<?php
  Route::set("index.php", function() {
    Accueil::CreateView("Home");
  });

  Route::set("login", function() {
    Produits::CreateView("Login");
  });
  
  Route::set("create", function() {
    Produits::CreateView("Create");
  });

  Route::set("produits", function() {
    Produits::CreateView("Produits");
  });
?>