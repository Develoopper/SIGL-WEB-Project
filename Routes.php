<?php
  Route::set("index.php", function() {
    Controller::CreateView("Home");
  });

  Route::set("login", function() {
    Controller::CreateView("Login");
  });
  
  Route::set("cart", function() {
    Controller::CreateView("Cart");
  });

  Route::set("produits", function() {
    Controller::CreateView("Produits");
  });
?>