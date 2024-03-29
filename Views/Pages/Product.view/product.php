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
	<div style="min-height: calc(100vh - 155px);">
		<!-- Nav bar -->
		<?php Component("NavBar", ["utilisateur" => $utilisateur]); ?>

		<div class="d-flex justify-content-center">
			<div class="mx-3 my-4 p-3 bg-light" style="border-radius: 10px; font-size: 13px;">

				<div class="d-flex rounded p-2 text-dark" name="refProduit" id="<?php echo $produit->refProduit ?>" style="width: 900px">
					<img id="img" src="<?php echo $produit->img; ?>" class="me-3 rounded border" style="height: 350px; width: 350px" alt="...">
					<div class="d-flex flex-column justify-content-around">
						<div>
							<h4 style="white-space: initial" id="libelle"><?php echo $produit->libelle; ?></h4>
							<span style="white-space: initial; font-size: 15px;" class="mb-4">
								Categorie: <b id="categorie"><?php echo $sousCategorie->libelle ?> - <?php echo $categorie->libelle; ?></b>
								</span><br>
							<span style="white-space: initial; font-size: 15px;">Marque: <b id="marque"><?php echo $produit->marque; ?></b></span>
						</div>
						<h2 style="font-family: 'Segoe UI'"><b id="prix"><?php echo $produit->prix; ?> DH</b></h2>
							<button type="button" class="btn btn-dark d-flex justify-content-center align-items-center" style="width: 100%;" id="addToCart">
								<i class="material-icons me-2" style="font-size: 30px;">add_shopping_cart</i>
								Ajouter au panier
							</button>
					</div>
				</div>

			</div>
		</div>
		
	</div>

	<!-- Footer -->
	<?php Component("Footer", []); ?>

	<script>
		$("#addToCart").on("click", function() {
			var prix = $("#prix").html().split(" ")[0];
			$.ajax({
					url: "http://localhost:5050/SIGL-WEB-Project/addToCart",
					data: {
						method: "POST",
						data: {
							refProduit: $("div[name=refProduit]").attr("id"),
							libelle: $("#libelle").html(),
							img: $("#img").attr("src"),
							prix: prix
						}
					},
					dataType: "json",
					type: "POST",
					success: function (data) {
						if (!isNaN(data))
							$("#nbreItemsPanier").html(data);
						console.log("*****", data);
					}
				});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "product.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>