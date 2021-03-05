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

  Route::set("products", function() {
    Controller::CreateView("Products");
  });
?>