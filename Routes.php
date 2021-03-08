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
  
  Route::set("admin/orders", function() {
    Controller::CreateView("AdminOrders");
  });
?>