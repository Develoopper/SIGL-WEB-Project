<?php

	Route::post("addCommande", function() {
		echo Commande_Controller::post();
	});

	Route::patch("commandes", "Auth", function() {
		Commande_Controller::patch();
	});

	Route::get("testeCommande", function() {
		echo Commande_Controller::testeCommande();
	});
?>