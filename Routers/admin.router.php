<?php
  Route::set("admin/users", "auth", function() {
    // echo auth();
    Controller::CreateView("AdminUsers", []);
  });

  Route::set("admin/products", function() {
    Controller::CreateView("AdminProducts", []);
  });
?>