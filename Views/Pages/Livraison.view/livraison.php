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
	<title>Produit</title>
	<style>
		<?php include "product.css"; ?>
	</style>
</head>

<body>
	<!-- Nav bar -->
	<?php Component("NavBar", []); ?>

	<div class="d-flex align-items-center justify-content-center mt-5">
		<div class="d-flex border flex-column align-items-center me-5 p-4 bg-light card" style="border-radius: 10px;">
			<form>
				<fieldset>
					<div class="row d-flex align-items-center g-3 needs-validation">
						<h3 class="mb-5">Informations de livraison</h3>
						<div class="row">
							<div class="mb-3 col-6 form-floating">
								<input type="text" id="prenom" class="form-control" placeholder="Entrer votre prénom">
								<label style="margin-left: 15px;" for="prenom" class="form-label">Prénom* </label>
							</div>
							<div class="mb-3 col-6 form-floating">
								<input type="text" id="nom" class="form-control" placeholder="Entrer votre nom">
								<label style="margin-left: 15px;" for="nom" class="form-label">Nom* </label>
							</div>
							<div class="mb-3 col-6 form-floating">
								<input type="text" id="numTel" class="form-control" placeholder="Entrer votre numéro de télephone">
								<label style="margin-left: 15px;" for="numTel" class="form-label">Numéro de télephone* </label>
							</div>
							<div class="mb-3 col-6 form-floating">
								<textarea class="form-control" placeholder="Entrer votre adresse" id="adresse"></textarea>
								<label style="margin-left: 15px;" for="adresse">Adresse* </label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "product.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>