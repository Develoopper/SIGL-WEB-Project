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
	<title>Login</title>
	<style>
		<?php include "login.css"; ?>
	</style>
</head>

<body>

	<!-- Nav bar -->
	<?php Component("NavBar", ["utilisateur" => $utilisateur, "nbreProductPanier" => count(unserialize($_COOKIE["panier"]))]); ?>

	<!-- Formulaires -->
	<div class="d-flex justify-content-center align-items-center mt-3">
		<!-- S'inscrire -->
		<div class="d-flex border flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;">
			<h3 class="mb-5">S'inscrire</h3>
			<form action="signUp" method="post">
				<div class="d-flex justify-content-between">
					<div class="mb-3">
						<label class="form-label">Nom*</label>
						<input type="text" name="nom" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="nom">
					</div>
					<div class="mb-3">
						<label class="form-label">Prénom*</label>
						<input type="text" name="prenom" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="prénom">
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">E-mail*</label>
					<input type="email" name="emailIns" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="e-mail">
				</div>
				<div class="mb-3">
					<label class="form-label">Téléphone*</label>
					<input type="telephone" name="telephone" style="width: 450px" class="form-control" placeholder="téléphone">
				</div>
				<div class="mb-3">
					<label class="form-label">Mot de passe*</label>
					<input type="password" name="mpIns" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="mot de passe">
				</div>
				<div class="mb-3">
					<?php
						if (isset($_GET["exist"])) {
							echo "utilisateur exist déjà";
						}
					?>
				</div>

				<button type="submit" class="btn btn-dark" style="width: 100%">S'inscrire</button>
			</form>
		</div>

		<!-- Se connecter -->
		<div class="d-flex border flex-column align-items-center p-4 bg-light" style="border-radius: 10px;">
			<h3 class="mb-5">Se connecter</h3>
			<form action="signIn" method="post">
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">E-mail</label>
					<input type="email"  name="email" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="e-mail">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
					<input type="password" name="mp" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="mot de passe">
				</div>
				<div class="d-flex justify-content-between mb-3">
					<?php
						if (isset($_GET["erreur"]) && $_GET["erreur"] == 1)
							echo "utilisateur n'existe pas";
						if (isset($_GET["erreur"]) && $_GET["erreur"] == 2)
							echo "mot de passe incorrect";
					?>
				</div>

				<button type="submit" class="btn btn-dark" style="width: 100%">Se connecter</button>
			</form>
		</div>
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "login.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>