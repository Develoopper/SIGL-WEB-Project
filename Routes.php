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

  Route::set("payment", function() {
    Controller::CreateView("Payment");
  });

  Route::set("payment", function() {
    Controller::CreateView("Payment");
  });

  Route::set("product", function() {
    Controller::CreateView("Product");
  });
?>