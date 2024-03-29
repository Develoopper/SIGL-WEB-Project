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
	<div>
	<!-- Nav bar -->
	<?php Component("NavBar", ["utilisateur" => $utilisateur]); ?>

	<!-- Formulaires -->
	<div class="d-flex justify-content-center align-items-center mt-3 mb-5">
		<!-- S'inscrire -->
		<div class="d-flex border flex-column align-items-center me-5 p-4 bg-light" style="border-radius: 10px;">
			<h3 class="mb-5">S'inscrire</h3>
			<form action="signUp" method="post">
				<div class="d-flex justify-content-between">
					<div class="mb-3">
						<label class="form-label">Nom*</label>
						<input type="text" name="nom" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="nom" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Prénom*</label>
						<input type="text" name="prenom" style="width: 210px" class="form-control" id="exampleFormControlInput1" placeholder="prénom" required>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label">E-mail*</label>
					<input type="email" name="emailIns" pattern="^[a-zA-Z0-9]{6,}@[a-z]{1,10}\.[a-z]{1,5}$" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="e-mail" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Téléphone*</label>
					<input type="tel" name="telephone" placeholder="0788888888" pattern="^0[6-7]{1}[0-9]{8}$" style="width: 450px" class="form-control" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Mot de passe*</label>
					<input type="password" name="mpIns" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="mot de passe" required>
				</div>
				<div class="mb-3">
					<?php
						if (isset($_GET["exist"])) {
							echo "Utilisateur exist déjà.";
						} else if (isset($_GET["signed"])) {
							echo "Inscription réussite.";
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
					<input type="email"  name="email" pattern="^[a-zA-Z0-9]{6,}@[a-z]{1,10}\.[a-z]{1,5}$" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="e-mail" required>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
					<input type="password" name="mp" style="width: 450px" class="form-control" id="exampleFormControlInput1" placeholder="mot de passe" required>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<?php
						if (isset($_GET["erreur"]) && $_GET["erreur"] == 1)
							echo "* L'utilisateur n'éxiste pas";
						if (isset($_GET["erreur"]) && $_GET["erreur"] == 2)
							echo "* Mot de passe incorrect";
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