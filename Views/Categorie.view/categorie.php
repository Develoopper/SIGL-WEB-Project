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
	<title>Document</title>
	<style>
		<?php include "categorie.css"; ?>
	</style>
</head>

<body>
	<!-- Nav bar -->
	<?php Component("NavBar", []); ?>

	<div class="d-flex justify-content-center">
		<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">

			<div class="d-flex rounded p-2 text-dark" style="width: 1200px">
				<select class="form-select" aria-label="Default select example" style="width: 200px">
					<option selected value="libelle">Libellee</option>
					<option value="prix">Prix</option>
					<option value="marque">Marque</option>
					<option value="sousCategorie">Sous categorie</option>
				</select>
			</div>

			<div class="row">
				<?php
				echo var_dump($products)
					// foreach ($products as $product) {
					// 	echo '
					// 		<div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
					// 			<a href="product?id='.$product->id.'" style="text-decoration: none;" class="text-dark">
					// 				<img src='.$product->img.'style="height: 180px; width: 180px" class="card-img-top" alt="...">
					// 				<div class="card-body p-2">
					// 					<p class="card-text text-truncate">'.$product->libellee.'</p>
					// 					<p class="card-text text-truncate">'.$product->prix.' DH</p>
					// 				</div>
					// 			</a>
					// 		</div>
					// 	';
					// }
				?>
			</div>
			
		</div>
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "categorie.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>