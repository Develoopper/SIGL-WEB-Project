<?php
  Route::set("login", "PreventAuth", function () {
    Controller::CreateView("Login", []);
  });

  Route::set("logout", "Auth", function () {
    Utilisateur_Controller::logout();
  });

  Route::set("signIn", function() {
    Utilisateur_Controller::signIn();
  });

  Route::set("signUp", function() {
    Utilisateur_Controller::signUp();
  });
  

  Route::get("utilisateurs", function() {
    Utilisateur_Controller::get();
  });

  Route::post("utilisateurs", function() {
    Utilisateur_Controller::post();
  });
  
  Route::patch("utilisateurs", function() {
    Utilisateur_Controller::patch();
  });

  Route::delete("utilisateurs", function() {
    Utilisateur_Controller::delete();
  });
?>