<?php
  Route::set("index.php", function() {
    Accueil::CreateView("Accueil");
  });

  Route::set("produits", function() {
    Produits::CreateView("Produits");
  });
?>