<?php
session_start();
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
	<link rel="stylesheet" href="accueil.css">
	<title>Panier</title>
	<style>
		<?php include "cart.css"; ?>
	</style>
</head>

<body>
	<?php Component("NavBar", []); ?>

	<!-- Panier -->
	<!-- <div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;"> -->
	<div class="d-flex justify-content-center">
		<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">
			<h3 class="mb-3 ms-4">Panier</h3>

			<div class="d-flex justify-content-between align-items-center p-2 mx-5">
				<h6>
					Articles
				</h6>

				<div class="d-flex">
					<h6 class="me-5">
						Quantité
					</h6>
					<h6 class="ms-5">
						Sous total
					</h6>
				</div>
			</div>

			<div class="mx-5" style="width: 900px">
				<?php
				if (isset($_COOKIE["panier"])) {
					$produits = unserialize($_COOKIE["panier"]);
					var_dump($produits);
					foreach ($produits as $produit) {
						echo '<div class="d-flex justify-content-between align-items-center rounded p-2 bg-white text-dark border border-dark mb-3 produits" id="' . $produit["refProduit"] . '">
											<div class="d-flex align-items-center">
												<img src="' . $produit["img"] . '" class="me-3 rounded" style="height: 70px; width: 70px" alt="..." name="img">
												<div>
													<h6 class="text-truncate" name="libelle">' . $produit["libelle"] . '</h6>
													<span style="font-size: 15px" name="prix">' . $produit["prix"] . '</span>
												</div>
											</div>

											<div class="d-flex justify-content-between align-items-center">
												<div class="bg-dark" style="height: 60px; width: 1px;"></div>

												<div class="d-flex mx-3">
													<a href="#" style="" name="decrement"><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">remove</i></a>
													<h6 class="mx-4 mb-0" name="qte">1</h6>
													<a href="#" style="" name="increment"><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">add</i></a>
												</div>

												<div class="bg-dark" style="height: 60px; width: 1px;"></div>

												<div>
													<h6 class="mx-5 mb-0"><b name="prixQte"></b></h6>
												</div>

												<div class="bg-dark" style="height: 60px; width: 1px;"></div>

												<a href="#"><i class= "material-icons mx-1 text-dark mx-3 ps-2">delete</i></a>
											</div>
										</div>';
						$i++;
					}
				}
				?>


				<!--				<div class="d-flex justify-content-between align-items-center rounded p-2 bg-white text-dark border border-dark mb-3">
					<div class="d-flex align-items-center">
						<img src="https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360" class="me-3 rounded" style="height: 70px; width: 70px" alt="...">
						<div>
							<h6 class="text-truncate">Montre water-proof taille standard</h6>
							<span style="font-size: 15px">579 DH</span>
						</div>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<div class="d-flex mx-3">
							<a href="#" style=""><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">remove</i></a>
							<h6 class="mx-4 mb-0">1</h6>
							<a href="#" style=""><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">add</i></a>
						</div>

						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<div>
							<h6 class="mx-5 mb-0"><b>1158 DH</b></h6>
						</div>

						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<a href="#"><i class= "material-icons mx-1 text-dark mx-3 ps-2">delete</i></a>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center rounded p-2 bg-white text-dark border border-dark mb-3">
					<div class="d-flex align-items-center">
						<img src="https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360" class="me-3 rounded" style="height: 70px; width: 70px" alt="...">
						<div>
							<h6 class="text-truncate">Montre water-proof taille standard</h6>
							<span style="font-size: 15px">579 DH</span>
						</div>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<div class="d-flex mx-3">
							<a href="#" style=""><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">remove</i></a>
							<h6 class="mx-4 mb-0">1</h6>
							<a href="#" style=""><i class= "material-icons mx-1 text-dark" style="font-size: 20px;">add</i></a>
						</div>

						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<div>
							<h6 class="mx-5 mb-0"><b>1158 DH</b></h6>
						</div>

						<div class="bg-dark" style="height: 60px; width: 1px;"></div>

						<a href="#"><i class= "material-icons mx-1 text-dark mx-3 ps-2">delete</i></a>
					</div>
				</div>
-->
				<div style="width: 100%" class="d-flex flex-column align-items-end">
					<h6 class="me-3 mt-3">Totale : <b class="ms-3" id="totale"></b></h6>
					<div class="d-flex">
						<a href="./" class="text-light" style="text-decoration: none;">
							<button type="button" class="btn btn-outline-dark mt-3 me-2" style="width: 250px">Poursuivre vos achats</button>
						</a>
						<a href="payment" class="text-light" style="text-decoration: none;">
							<button type="button" class="btn btn-dark mt-3" style="width: 250px">Commander</button>
						</a>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "cart.js"; ?>

		$(document).ready(function() {

			// Calculer le totale
			var totale;

			$("b[name=prixQte]").each( function() {
				totale += parseInt($(this).html());
			});

			// Calculer les prix par quantites
			var prix;
			var qte;

			$("div[id=produits]").each( function(produit) {
				prix = parseInt(produit.children("span[name=prix]")[0].html());
				qte = parseInt(produit.children("h6[name=qte]")[0].html());
				produit.children("b[name=prixQte]").html(prix * qte);
			});

			$("#totale").html(totale);
		})

		// function increment(target) {
		// 	target
		// }
		$("a[name=increment]").on("click", function() {
			var number = parseInt($(this).prev("h6[name=qte]").html());
			number++;
			$(this).prev("h6[name=qte]").html(number);
		});

		$("a[name=decrement]").on("click", function() {
			var number = parseInt($(this).next("h6[name=qte]").html());
			if (number > 1)
				number--;
			$(this).next("h6[name=qte]").html(number);
		});

		function decrement(target) {

		}

		function deleteFromCart(){
			$.ajax({
			url: "http://localhost/Projects/SIGL-WEB-Project/deleteFromCart",
			data: {
				method: "POST",
				data: {refProduit : $("#refProduit").attr("id")}
			},
			dataType: "json",
			type: "POST",
			// header: { method: "PATCH" },
			success: function (data) {
				console.log("*****", data);
			}
			});
      	}
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>