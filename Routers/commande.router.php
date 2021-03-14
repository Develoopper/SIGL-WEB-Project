<?php

	Route::post("addCommande", "Auth", function() {
		echo Commande_Controller::post();
	});

?>