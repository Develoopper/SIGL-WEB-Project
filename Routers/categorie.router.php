<?php
  Route::post("categories", function() {
    Categorie_Controller::post();
  });
  
  Route::patch("categories", function() {
    Categorie_Controller::patch();
  });

  Route::delete("categories", function() {
    Categorie_Controller::delete();
  });
?>