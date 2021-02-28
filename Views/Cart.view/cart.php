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
	<!-- Nav bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid mx-3">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" style="font-family: 'Dancing Script'; font-size: 35px;" href="index.php">Elegance</a>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Femmes
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Hommes
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Filles
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Garçons
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>

				<div class="d-flex align-items-center justify-content-between" style="font-size: 15px;">
					<form class="d-flex me-2">
						<input class="form-control me-2" style="font-size: 14px; width: 200px" type="search" placeholder="Chercher un produit" aria-label="Search">
						<button class="btn btn-outline-dark" style="font-size: 14px;" type="submit">Rechercher</button>
					</form>
					<a href="login" class="d-flex align-items-center mx-3 text-dark" style="text-decoration: none;">
						<i class="material-icons mx-1" style="font-size: 30px;">account_circle</i>
						Compte
					</a>
					<a href="cart" class="d-flex align-items-center text-dark" style="text-decoration: none;">
						<i class="large material-icons mx-1" style="font-size: 30px;">shopping_cart</i>
						Panier
					</a>
				</div>
			</div>
		</div>
	</nav>

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
			
			<div class="d-flex justify-content-between align-items-center rounded p-2 mx-5 bg-dark text-light mb-3" style="width: 900px">
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

			<div class="d-flex justify-content-between align-items-center rounded p-2 mx-5 bg-dark text-light mb-3" style="width: 900px">
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

			<div class="d-flex justify-content-between align-items-center rounded p-2 mx-5 bg-dark text-light mb-3" style="width: 900px">
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
		</div>
	</div>

	<!-- Footer -->
	<footer class="bg-dark text-center text-light">
		<!-- Grid container -->
		<div class="container p-4 mt-5">
			<span class="text-light" style="font-family: 'Dancing Script'; font-size: 35px;" href="#">Elegance</span>
			<!-- Section: Social media -->
			<section class="my-4">
				<!-- Facebook -->
				<a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>


				<!-- Twitter -->
				<a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

				<!-- Instagram -->
				<a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
			</section>
			<!-- Section: Social media -->

			<!-- Section: Form -->
			<section class="">
				<form action="">
					<!--Grid row-->
					<div class="row d-flex justify-content-center">
						<!--Grid column-->
						<div class="col-auto">
							<p class="pt-2">
								<strong>Abonnez-vous pour recevoir nos meilleures offres!</strong>
							</p>
						</div>
						<!--Grid column-->

						<!--Grid column-->
						<div class="col-md-5 col-12">
							<!-- Email input -->
							<div class="form-outline form-white mb-4">
								<input type="email" id="form5Example2" class="form-control" placeholder="name@example.com" />
							</div>
						</div>
						<!--Grid column-->

						<!--Grid column-->
						<div class="col-auto">
							<!-- Submit button -->
							<button type="submit" class="btn btn-outline-light mb-4">
								S'abonner
							</button>
						</div>
						<!--Grid column-->
					</div>
					<!--Grid row-->
				</form>
			</section>
			<!-- Section: Form -->

			<!-- Section: Text -->
			<section class="mb-4">
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
					repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
					eum harum corrupti dicta, aliquam sequi voluptate quas.
				</p>
			</section>
			<!-- Section: Text -->

			<!-- Section: Links -->
			<section class="">
				<!--Grid row-->
				<div class="row" style="font-size: 10px; text-decoration: none !important;">
					<!--Grid column-->
					<div class="col">
						<h5 class="text-uppercase">Service client</h5>

						<ul class="list-unstyled mb-0">
							<li>
								<a href="#!" class="text-white">Aide & FAQ</a>
							</li>
							<li>
								<a href="#!" class="text-white">Commandez par Tél: 05.22.33.44.55</a>
							</li>
							<li>
								<a href="#!" class="text-white">Politique de retour</a>
							</li>
							<li>
								<a href="#!" class="text-white">Signaler un Produit</a>
							</li>
						</ul>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col">
						<h5 class="text-uppercase">À PROPOS</h5>

						<ul class="list-unstyled mb-0">
							<li>
								<a href="#!" class="text-white">Qui sommes-nous</a>
							</li>
							<li>
								<a href="#!" class="text-white">Conditions Générales d'Utilisation</a>
							</li>
							<li>
								<a href="#!" class="text-white">Politique de Confidentialité</a>
							</li>
							<li>
								<a href="#!" class="text-white">Travailler chez <span style="font-family: 'Dancing Script'; font-size: 15px;">Elegance</span></a>
							</li>
						</ul>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col">
						<h5 class="text-uppercase">Links</h5>

						<ul class="list-unstyled mb-0">
							<li>
								<a href="#!" class="text-white">Link 1</a>
							</li>
							<li>
								<a href="#!" class="text-white">Link 2</a>
							</li>
							<li>
								<a href="#!" class="text-white">Link 3</a>
							</li>
							<li>
								<a href="#!" class="text-white">Link 4</a>
							</li>
						</ul>
					</div>
					<!--Grid column-->
				</div>
				<!--Grid row-->
			</section>
			<!-- Section: Links -->
		</div>
		<!-- Grid container -->

		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2021 Copyright
		</div>
		<!-- Copyright -->
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "accueil.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>