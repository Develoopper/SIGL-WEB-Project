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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<title>Document</title>
	<style>
		<?php include "products.css"; ?>
	</style>
</head>

<body>
	<!-- Nav bar -->
	<?php Component("NavBar", ["utilisateur" => $utilisateur, "nbreProductPanier" => count(unserialize($_COOKIE["panier"]))]); ?>


	<div class="d-flex my-4 px-4">
		<div class="bg-light text-dark rounded p-3 py-4" style="min-width: 300px; max-width: 300px;">
			Libellee :
			<input type="text" name="filtre" id="libelle" class="form-control mb-4 mt-2">
			Marque :
			<input type="text" name="filtre" id="marque" class="form-control mb-4 mt-2">
			Prix :
			<input type="text" name="filtre" id="prix" readonly disabled class="bg-light text-dark ms-2 mb-2" style="border:0; font-weight:bold;">

			<div id="slider-range"></div>
		</div>

		<div class="ms-3 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">

			<div class="container-fluid">
				<div class="row d-flex " id="container">
					<?php
					// echo var_dump($products);
						foreach ($products as $product) {
							echo <<<HTML
								<div class="col-3">
									<div class="card shadow-effect p-0" style="width: 200px; height: 270px; border: none;">
										<a href="product?id=$product->refProduit" style="text-decoration: none;" class="text-dark mb-3">
											<img src='$product->img'style="height: 180px; width: 180px" class="card-img-top" alt="...">
											<div class="card-body p-2">
												<p class="card-text text-truncate">$product->libelle</p>
												<p class="card-text text-truncate">$product->prix DH</p>
											</div>
										</a>
									</div>
								</div>
							HTML;
						}
					?>
				</div>
			</div>

		</div>
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 4000,
				values: [0, 4000],
				slide: function(event, ui) {
					$("#prix").val(ui.values[0] + " DH - " + ui.values[1] + " DH");
					$("#prix").trigger("input", { prixMin: ui.values[0], prixMax: ui.values[1] });
				}
			});
			$("#prix").val($("#slider-range").slider("values", 0) + " DH - " + $("#slider-range").slider("values", 1) + " DH");
		});

		$("[name=filtre]").on("input", function (e, { prixMin, prixMax } = { prixMin: 0, prixMax: 0 }) {
			$.ajax({
				url: "http://localhost:5050/SIGL-WEB-Project/products",
				data: {
					method: "GET",
					data: {
						libelle: $("#libelle").val(),
						marque: $("#marque").val(),
						prixMin: parseFloat(prixMin),
						prixMax: parseFloat(prixMax)
					}
				},
				dataType: "json",
				type: "POST",
				// header: { method: "PATCH" },
				success: function (data) {
					console.log("*****", data);
					var html = "";
					data.forEach(produit => {
						html += `
							<div class="col-3">
								<div class="card shadow-effect p-0" style="width: 200px; height: 250px; border: none;">
									<a href="product?id=${produit.refProduit[0]}" style="text-decoration: none;" class="text-dark">
										<img src='${produit.img[0]}'style="height: 180px; width: 180px" class="card-img-top" alt="...">
										<div class="card-body p-2">
											<p class="card-text text-truncate">${produit.libelle[0]}</p>
											<p class="card-text text-truncate">${produit.prix[0]} DH</p>
										</div>
									</a>
								</div>
							</div>
						`;
					});
					$("#container").html(html);
				}
			})
		})
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
	<script>
		<?php include "products.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>