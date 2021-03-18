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
	<title>Panier</title>
	<style>
		<?php include "cart.css"; ?>
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
				<h6 class="flex-grow-1">
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
					if (isset($_COOKIE["panier"])) {
						$produits = unserialize($_COOKIE["panier"]);
						foreach ($produits as $produit) {
							echo <<<HTML
								<a href="product?id={$produit['refProduit']}">
								<input type="hidden" name="refProduit[]" value="{$produit['refProduit']}" />
									<div class="d-flex justify-content-between rounded p-2 bg-white text-dark border border-secondary mb-3 produits" id="{$produit['refProduit']}">
										<div class="d-flex align-items-center">
											<img src="{$produit['img']}" class="me-3 rounded" style="height: 70px; width: 70px" alt="..." name="img">
											<div>
												<h6 class="text-truncate" style="width: 500px" name="libelle">{$produit["libelle"]}</h6>
												<span style="font-size: 15px" name="prix">{$produit["prix"]}</span>
												<span style="font-size: 15px">DH</span>
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center">
											<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
											<div class="d-flex mx-2 qte">
												<a style="" name="decrement"><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">remove</i></a>
												<h6 class="mx-3 mb-0" name="qte">{$produit["qte"]}</h6>
												<input type="hidden" name="qte[]" value="{$produit['qte']}" />
												<a style="" name="increment"><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">add</i></a>
											</div>
											<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
											<div class="prixQte">
												<h6 class="mx-4 mb-0">
													<b name="prixQte"></b>
													<b>DH</b>
												</h6>
											</div>
											<div class="bg-secondary" style="height: 60px; width: 1px;"></div>
										</div>
									</div>
								</a>
							HTML;
						}
					}
				?>
		</div>
  </div>




	<!-- Footer -->
	<?php Component("Footer", []); ?>
</body>

</html>