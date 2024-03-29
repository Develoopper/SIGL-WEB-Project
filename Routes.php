<?php
  // include "./Models/Model.php";
  include "./Models/Produit.model.php";
  include "./Models/Categorie.model.php";
  include "./Models/Commande.model.php";
  include "./Models/SousCategorie.model.php";
  // include "./Models/Utilisateur.model.php";
  include 'Middlewares/Auth.php';
  include 'Middlewares/AdminAuth.php';
  include 'Middlewares/PreventAuth.php';

  Route::set("", function() {
    Controller::CreateView("Home", [
      // "meilleursVentes" => Produit_Model::getMeilleursVentes(),
      "nouveautes" => Produit_Model::getNouveaute(),
      "petitsPrix" => Produit_Model::getPetitsPrix()
    ]);
  });

  Route::set("enAttente", function() {
    unset($_SESSION["panier"]);
    setcookie("panier", "");
    Controller::CreateView("EnAttente", []);
  });

  include "Routers/cart.router.php";
  include "Routers/payement.router.php";
  include "Routers/livraison.router.php";
  include "Routers/admin.router.php";
  include "Routers/produit.router.php";
  include "Routers/utilisateur.router.php";
  include "Routers/categorie.router.php";
  include "Routers/sousCategorie.router.php";
  include "Routers/commande.router.php";


?>