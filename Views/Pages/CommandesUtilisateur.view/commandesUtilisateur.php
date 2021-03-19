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
		body {
			font-family: Montserrat;
			font-size: 15px;
		}

		a {
			cursor: pointer;
			text-decoration: none;
			color: black;
		}

		a:hover {
			color:black;
		}
	</style>
</head>

<body>
	<!-- NavBar -->
	<?php Component("NavBar", ["utilisateur" => $utilisateur, "nbreProductPanier" => count(unserialize($_COOKIE["panier"]))]); ?>

	<!-- Commandes d'utilisateur -->
	<!-- <div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;"> -->
	<div class="d-flex justify-content-center">
		<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">
			<h3 class="mb-3 ms-4">Mes commandes</h3>

			<div class="d-flex justify-content-between align-items-center p-2 mx-5">
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
					Totale
				</h6>
			</div>

			<div class="mx-5" style="width: 900px">
				<?php
					foreach ($commandes as $commande) {
						echo <<<HTML
							<a href="enAttente?idCommande={$commande->numCommande}">
								<input type="hidden" name="numCommande[]" value="{$commande->numCommande}"/>
								<div class="d-flex justify-content-between rounded p-2 bg-white text-dark border border-secondary mb-3 commandes" id="{$commande->numCommande}">
									<div class="d-flex align-items-center justify-content-between">
										<div class="me-3">
											<h6 class="text-truncate" name="numCommande">{$commande->numCommande}</h6>
										</div>
										<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
										<div class="ms-3">
											<h6 class="text-truncate" name="dateCommande">{$commande->dateCommande}</h6>
										</div>
									</div>
									<div class="d-flex justify-content-between align-items-center">
										<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
										<div class="d-flex mx-2">
											<h6 class="mx-3 mb-0" name="totale">{$commande->montant}</h6>
											<b>DH</b>
											<input type="hidden" name="totale[]" value="{$commande->totale}" />
										</div>
										<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
										<div class="etat">
											<h6 class="mx-4 mb-0">
												<b name="etat">{$commande->etat}</b>
											</h6>
										</div>
										<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
									</div>
								</div>
							</a>
						HTML;
					}
				?>
			</div>
		</div>
	</div>


	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>