<?php
  Route::set("adminUtilisateurs", "Auth", function() {
    Controller::CreateView("AdminUtilisateurs", []);
  });

  Route::set("adminProduits", "Auth", function() {
    Controller::CreateView("AdminProduits", []);
  });

  Route::set("adminCommandes", "Auth", function() {
    Controller::CreateView("AdminCommandes", []);
  });

  Route::set("adminCategories", "Auth", function() {
    Controller::CreateView("AdminCategories", []);
  });

  Route::set("adminSousCategories", "Auth", function() {
    Controller::CreateView("AdminSousCategories", []);
  });

?>