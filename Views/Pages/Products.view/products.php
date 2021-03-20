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
	<div style="min-height: calc(100vh - 155px);">
		<!-- Nav bar -->
		<?php Component("NavBar", ["utilisateur" => $utilisateur, "nbreProductPanier" => count(unserialize($_COOKIE["panier"]))]); ?>

		<div class="row d-flex my-4 px-5">
			<div class="col bg-light text-dark rounded p-3 py-4" style="min-width: 350px; max-width: 350px;">
				Libellé :
				<input type="text" name="filtre" id="libelle" class="form-control mb-4 mt-2">
				Marque :
				<input type="text" name="filtre" id="marque" class="form-control mb-4 mt-2">
				Prix :
				<input type="text" name="filtre" id="prix" readonly disabled class="bg-light text-dark ms-2 mb-2" style="border:0; font-weight:bold;">

				<div id="slider-range"></div>
			</div>

			<div class="col ms-3 py-3 ps-3 pe-0 bg-light" style="border-radius: 10px; font-size: 13px;">
				<div class="row d-flex ms-2" id="container">
					<?php
					// echo var_dump($products);
					foreach ($products as $product) {
						echo <<<HTML
								<div class="col-3 card shadow-effect p-0 me-4 mb-4" style="width: 200px; height: 270px; border: none;">
									<a href="product?id=$product->refProduit" style="text-decoration: none;" class="text-dark">
										<img src='$product->img'style="height: 200px; width: 200px" class="card-img-top" alt="">
										<div class="card-body p-2">
											<p class="card-text text-truncate" style="font-size: 13px">$product->libelle</p>
											<p class="card-text text-truncate" style="font-size: 14px"><b>$product->prix DH</b></p>
										</div>
									</a>
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
		let id = "<?php echo $_GET["id"]; ?>";
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