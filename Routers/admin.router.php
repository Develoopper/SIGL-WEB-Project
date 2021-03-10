<?php
  Route::set("admin/users", "Auth", function() {
    Controller::CreateView("AdminUsers", []);
  });

  Route::set("admin/products", "Auth", function() {
    Controller::CreateView("AdminProducts", []);
  });
?>