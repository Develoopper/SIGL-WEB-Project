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
?>