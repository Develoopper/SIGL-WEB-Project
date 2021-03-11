<?php
  Route::set("adminusers", "Auth", function() {
    Controller::CreateView("AdminUsers", []);
  });

  Route::set("adminproducts", "Auth", function() {
    Controller::CreateView("AdminProducts", []);
  });
?>