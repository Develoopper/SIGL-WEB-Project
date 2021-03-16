<?php
  Route::post("sousCategories", function() {
    SousCategorie_Controller::post();
  });
  
  Route::patch("sousCategories", function() {
    SousCategorie_Controller::patch();
  });

  Route::delete("sousCategories", function() {
    SousCategorie_Controller::delete();
  });
?>