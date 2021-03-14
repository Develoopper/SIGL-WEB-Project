<?php
  Route::set("adminUtilisateurs", "AdminAuth", function() {
    Controller::CreateView("AdminUtilisateurs", []);
  });

  Route::set("adminProduits", "AdminAuth", function() {
    Controller::CreateView("AdminProduits", []);
  });

  Route::set("adminCommandes", "AdminAuth", function() {
    Controller::CreateView("AdminCommandes", []);
  });

  Route::set("adminCategories", "AdminAuth", function() {
    Controller::CreateView("AdminCategories", []);
  });

  Route::set("adminSousCategories", "AdminAuth", function() {
    Controller::CreateView("AdminSousCategories", []);
  });

?>