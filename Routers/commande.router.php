<?php

	Route::post("addCommande", "Auth", function() {
		echo Commande_Controller::post();
	});

	Route::patch("commandes", "Auth", function() {
		Commande_Controller::patch();
	});

	Route::get("testeCommande", "Auth", function() {
		echo Commande_Controller::testeCommande();
	});

?>