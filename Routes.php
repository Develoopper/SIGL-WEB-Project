<?php
  Route::set("", function() {
    Controller::CreateView("Home");
  });

  Route::set("login", function() {
    // create a session and set a cookie
    Controller::CreateView("Login");
  });
  
  Route::set("cart", function() {
    Controller::CreateView("Cart");
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment");
  });

  Route::set("products", function() {
    Controller::CreateView("Product");
  });

  Route::set("admin/users", function() {
    Controller::CreateView("AdminUsers");
  });

  Route::set("admin/products", function() {
    Controller::CreateView("AdminProducts");
  });
  
  include "Routers/produit.router.php";

?>