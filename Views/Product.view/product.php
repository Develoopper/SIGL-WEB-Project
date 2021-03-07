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
	<link rel="stylesheet" href="accueil.css">
	<title>Document</title>
	<style>
		<?php include "product.css"; ?>
	</style>
</head>

<body>
	<!-- Nav bar -->
	<?php Component("NavBar", []); ?>

	<div class="d-flex justify-content-center">
		<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">

			<div class="d-flex rounded p-2 text-dark" style="width: 900px">
				<img src="<?php echo $product->img; ?>" class="me-3 rounded border border " style="height: 350px; width: 350px" alt="...">
				<div class="d-flex flex-column justify-content-around">
					<div>
						<h4 style="white-space: initial"><?php echo $product->libelle; ?></h4>
						<span style="white-space: initial; font-size: 15px;">Categorie: <b><?php echo $product->sousCategorie; ?></b></span><br>
						<span style="white-space: initial; font-size: 15px;">Marque: <b><?php echo $product->marque; ?></b></span>
					</div>
					<h2 style="font-family: 'Segoe UI'"><b><?php echo $product->prix; ?> DH</b></h2>
					<button type="button" class="btn btn-dark d-flex justify-content-center align-items-center" style="width: 100%;">
						<i class="material-icons mx-1" style="font-size: 30px;">add_shopping_cart</i>
						Ajouter au panier
					</button>
				</div>
			</div>
			
		</div>
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "accueil.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>