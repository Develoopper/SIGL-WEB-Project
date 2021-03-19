<?php

	Route::post("addCommande", "Auth", function() {
		echo Commande_Controller::post();
	});

	Route::patch("commandes", "Auth", function() {
		Commande_Controller::patch();
	});

	Route::set("commandesUtilisateur", "Auth", function() {
		$commandes = Commande_Model::getOne([
			["filterBy" => "login", "opt" => "equal", "filterValue" => $_SESSION["login"]]
		]);
		Controller::CreateView("CommandesUtilisateur", ["commandes" => $commandes]);
	});

	Route::get("testeCommande", "Auth", function() {
		Commande_Controller::testeCommande();
	});

?>