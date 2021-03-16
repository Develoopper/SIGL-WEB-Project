<?php

  Route::set("livraison", "Auth", function() {
    Controller::CreateView("Livraison", []);
  });

  Route::post("postToLivraison", function() {
    Livraison_Controller::post();
  });


?>