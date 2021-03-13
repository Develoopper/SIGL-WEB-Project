<?php
  Route::set("adminUtilisateurs", function() {
    Controller::CreateView("AdminUtilisateurs", []);
  });

  Route::set("adminProduits", function() {
    Controller::CreateView("AdminProduits", []);
  });

  Route::set("adminCommandes", function() {
    Controller::CreateView("AdminCommandes", []);
  });

  Route::set("adminCategories", function() {
    Controller::CreateView("AdminCategories", []);
  });

  Route::set("adminSousCategories", function() {
    Controller::CreateView("AdminSousCategories", []);
  });

?>