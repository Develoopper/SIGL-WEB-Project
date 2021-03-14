<?php

	Route::post("addCommande", "Auth", function() {
		Commande_Controller::post();
	});

?>