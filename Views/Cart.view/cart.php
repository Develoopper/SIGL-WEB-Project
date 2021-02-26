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
			<a class="navbar-brand" style="font-family: 'Dancing Script'; font-size: 35px;" href="">Elegance</a>
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
					<a href="#" class="d-flex align-items-center text-dark" style="text-decoration: none;">
						<i class="large material-icons mx-1" style="font-size: 30px;">shopping_cart</i>
						Panier
					</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="d-flex justify-content-center align-items-center mt-3">
		<div class="d-flex flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;">
			<h3 class="mb-5">S'inscrire</h3>
			<form action="" method="post">
				<div class="d-flex justify-content-between">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nom</label>
						<input type="email" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Prénom</label>
						<input type="email" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
					</div>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">E-mail</label>
					<input type="email" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Téléphone</label>
					<input type="email" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
					<input type="password" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="form-check mb-4">
					<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">
						J'ai lu et j'accepte les <a href="#" class="link-dark">Conditions générales de vente</a>
					</label>
				</div>
				<button type="button" class="btn btn-dark" style="width: 100%">S'inscrire</button>
			</form>
		</div>

		<div class="d-flex flex-column align-items-center p-4 bg-light" style="border-radius: 10px;">
			<h3 class="mb-5">Se connecter</h3>
			<form action="" method="post">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">E-mail</label>
					<input type="email" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
					<input type="password" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="d-flex justify-content-between">
					<div class="form-check mb-4">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">
							Rester connecté
						</label>
					</div>
					<a href="#" class="link-dark">Mot de passe oublié ?</a>
				</div>
				<button type="button" class="btn btn-dark" style="width: 100%">Se connecter</button>
			</form>
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