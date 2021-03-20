<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<!-- JQuery library -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
	<title>Mes commandes</title>

	<style>
		<?php include "commandesUtilisateur.css"; ?>
	</style>
</head>

<body>
	<div style="min-height: calc(100vh - 155px);">
		<!-- NavBar -->
		<?php Component("NavBar", ["utilisateur" => $utilisateur, "nbreProductPanier" => count(unserialize($_COOKIE["panier"]))]); ?>

		<!-- Commandes d'utilisateur -->
		<!-- <div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;"> -->
		<div class="d-flex justify-content-center">
			<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">
				<h3 class="mb-3 ms-4">Mes commandes</h3>

				<div class="d-flex justify-content-between align-items-center p-2 px-3 mx-5">
					<h6 class="me-1">
						N°
					</h6>
					<h6 class="me-1">
						Date
					</h6>
					<h6 class="ms-4">
						Etat
					</h6>
					<h6 class="ms-4">
						Total
					</h6>
				</div>

				<div class="mx-5" style="width: 900px">
					<?php
						foreach ($commandes as $commande) {
							echo <<<HTML
								<a href="enAttente?idCommande={$commande->numCommande}">
									<div class="d-flex justify-content-around align-items-center rounded p-2 bg-white text-dark border border-secondary mb-3 commandes" id="{$commande->numCommande}">
										<h6 class="text-truncate">{$commande->numCommande}</h6>

										<div class="bg-secondary" style="height: 50px; width: 1px;"></div>
										
										<h6 class="text-truncate">{$commande->dateCommande}</h6>

										<div class="bg-secondary" style="height: 50px; width: 1px;"></div>
										
										<h6 name="total">{$commande->montant} DH</h6>

										<div class="bg-secondary" style="height: 50px; width: 1px;"></div>
										
										<h6>{$commande->etat}</h6>
									</div>
								</a>
							HTML;
						}
					?>
				</div>
			</div>
		</div>

	</div>
	
	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>