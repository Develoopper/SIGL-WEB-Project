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
	<div style="min-height: calc(100vh - 155px);">
		<!-- NavBar -->
		<?php Component("NavBar", ["utilisateur" => $utilisateur]); ?>

		<!-- Panier -->
		<!-- <div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;"> -->
		<div class="d-flex justify-content-center">
			<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">
				<h3 class="mb-3 ms-4">Panier</h3>

				<div class="d-flex justify-content-between align-items-center p-2 mx-5">
					<h6 class="flex-grow-1 ms-2">
						Article
					</h6>

					<div class="d-flex" style="padding-right: 70px;">
						<h6 class="me-1">
							Quantité
						</h6>
						<h6 class="ms-4">
							Sous total
						</h6>
					</div>
				</div>

				<div class="mx-5" style="width: 900px">
					<form method='GET' action="livraison">
					<?php
						if (isset($_SESSION['panier'])) {
							$produits = $_SESSION["panier"];
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
												<a name="delete"><i class= "material-icons mx-1 text-dark mx-3 ps-2">delete</i></a>
											</div>
										</div>
									</a>
								HTML;
							}
						}
					?>

					<div style="width: 100%" class="d-flex flex-column align-items-end">
						<h6 class="me-3 mt-3">Total : <b class="ms-3" id="total"></b> <b>DH</b></h6>
						<input type="hidden" id="totalInput" name="montant" value="" />
						<div class="d-flex">
							<a href="./" class="text-light" style="text-decoration: none;">
								<button type="button" class="btn btn-outline-dark mt-3 me-2" style="width: 250px">Poursuivre vos achats</button>
							</a>
							<button type="submit" id="commander" class="btn btn-dark mt-3" style="width: 250px">Commander</button>
							<!-- <a href="" class="text-light" style="text-decoration: none;"> -->
							<!-- </a> -->
						</div>
					</div>

				</div>

			</div>
		</div>
		</form>

	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "cart.js"; ?>

		$(document).ready(function() {
			// Calculer les prix par quantites
			calculerPrixQte();

			// Calculer le total
			calculerTotal();
		});

		$("#total").on("change", function() {
			$("#totalInput").attr("value", $(this).html());
		})

		$("a[name=delete]").click(
			function (){
				$refProduit = $(this).parents(".produits").attr("id");
				$.ajax({
					url: "http://localhost:5050/SIGL-WEB-Project/deleteFromCart",
					data: {
						method: "DELETE",
						data: {refProduit : $refProduit}
					},
					dataType: "json",
					type: "POST",
					success: function (data) {
						$(".produits").each( function() {
							console.log(data);
							var contains = false;
							data.forEach(produit => {
								if ($(this).attr("id") == produit.refProduit) {
									contains = true;
								}
							});
							if (!contains) {
								$(this).remove();
								$("#nbreItemsPanier").html(data.length);
							}
							calculerTotal();
						});
					}
				});
			}
		);

// 		$("#commander").on("click", function() {
// 			var today = new Date();
// 			var dd = String(today.getDate()).padStart(2, '0');
// 			var mm = String(today.getMonth() + 1).padStart(2, '0');
// 			var yyyy = today.getFullYear();
// 			today = mm + '/' + dd + '/' + yyyy;
//
// 			produitsCommandes = new Array();
// 			$(".produits").each( function() {
// 				qte = parseFloat($(this).children().last().children(".qte").children("h6").html());
// 				refProduit = $(this).attr("id");
// 				produitsCommandes.push({qte: qte, refProduit: refProduit});
// 			});
//
// 			encodeDataToURL = (data) => {
// 				return Object
// 				.keys(data)
// 				.map(value => `${value}=${encodeURIComponent(data[value])}`)
// 				.join('&');
// 			}
//
// 			$.ajax({
// 				url: "http://localhost:5050/SIGL-WEB-Project/tester",
// 				data: {
// 					method : "GET",
// 					data : "None"
// 				},
// 				dataType: "json",
// 				type: "POST",
// 				success: function (data) {
// 					if (data == "login")
// 						window.location.href = "login";
// 					else {
// 						var url = "livraison?dateCmd=" + today + "&etatCmd=en Attente&montant=" + $("#total").html() + "&produitsCommandes[]=" + encodeURI(produitsCommandes);
// 						window.location.href = url;
// // 						$.ajax({
// // 							url: "http://localhost:5050/SIGL-WEB-Project/postToLivraison",
// // 							data: {
// // 								method: "POST",
// // 								data : {
// // 									dateCmd: today,
// // 									etatCmd: "en Attente",
// // 									montant: $("#total").html(),
// // 									produitsCommandes: produitsCommandes
// // 								}
// // 							},
// // 							dataType: "json",
// // 							type: "POST",
// // 							success: function (data) {
// //
// // 							},
// // 							error: function () {
// // 								console.log("*****");
// // 							}
// // 						});
//
// 					}
// 				},
// 				error: function () {
// 					console.log("*****");
// 				}
// 			});


		// });
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>