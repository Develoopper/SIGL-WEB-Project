<?php
  Route::set("login", "preventAuth", function () {
    // create a session and set a cookie
    Controller::CreateView("Login", []);
  });

  Route::set("signIn", function() {
    Utilisateur_Controller::signIn();
  });

  Route::set("signUp", function() {
    Utilisateur_Controller::signUp();
  });
?>