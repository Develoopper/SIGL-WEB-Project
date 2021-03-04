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
		<?php include "cart.css"; ?>
	</style>
</head>

<body>
	<?php include "Views/Components/NavBar.php"; ?>

	<!-- Panier -->
	<!-- <div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;"> -->
	<div class="d-flex justify-content-center">
		<div class="mx-3 my-4 px-3 py-3 bg-light" style="border-radius: 10px; font-size: 13px;">
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
				<div class="d-flex justify-content-between align-items-center rounded p-2 bg-dark text-light mb-3">
					<div class="d-flex align-items-center">
						<img src="https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360" class="me-3 rounded" style="height: 70px; width: 70px" alt="...">
						<div>
							<h6 class="text-truncate">Montre water-proof taille standard</h6>
							<span style="font-size: 15px">579 DH</span>
						</div>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div class="d-flex mx-3">
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">remove</i></a>
							<h6 class="mx-4 mb-0">1</h6>
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">add</i></a>
						</div>

						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div>
							<h6 class="mx-5 mb-0">1158 DH</h6>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center rounded p-2 bg-dark text-light mb-3">
					<div class="d-flex align-items-center">
						<img src="https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360" class="me-3 rounded" style="height: 70px; width: 70px" alt="...">
						<div>
							<h6 class="text-truncate">Montre water-proof taille standard</h6>
							<span style="font-size: 15px">579 DH</span>
						</div>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div class="d-flex mx-3">
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">remove</i></a>
							<h6 class="mx-4 mb-0">1</h6>
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">add</i></a>
						</div>

						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div>
							<h6 class="mx-5 mb-0">1158 DH</h6>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-between align-items-center rounded p-2 bg-dark text-light mb-3">
					<div class="d-flex align-items-center">
						<img src="https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360" class="me-3 rounded" style="height: 70px; width: 70px" alt="...">
						<div>
							<h6 class="text-truncate">Montre water-proof taille standard</h6>
							<span style="font-size: 15px">579 DH</span>
						</div>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div class="d-flex mx-3">
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">remove</i></a>
							<h6 class="mx-4 mb-0">1</h6>
							<a href="#" style=""><i class= "material-icons mx-1 text-light" style="font-size: 20px;">add</i></a>
						</div>

						<div class="bg-light" style="height: 60px; width: 1px;"></div>

						<div>
							<h6 class="mx-5 mb-0">1158 DH</h6>
						</div>
					</div>
				</div>

				<h6 class="ms-auto">Total: <b>500 DH</b></h6>
			</div>
		
		</div>
	</div>

	<!-- Footer -->
	<?php include "Views/Components/Footer.php"; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "accueil.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>