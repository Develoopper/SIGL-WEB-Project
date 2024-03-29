<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS-->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css"> -->

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- JQuery library -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>

	<title>Dashboard</title>
	<style>
		<?php include "adminCommandes.css"; ?>
	</style>
</head>

<body class="bg-white">
	<!-- Nav bar -->
	<?php Component("AdminNavBar",  ["utilisateur" => $utilisateur]); ?>


	<div class="jquery-script-clear"></div>
  <div class="mx-3 mt-5">
    <table class="table table-striped table-bordered" id="table">
      <thead class="text-light" style="background-color: #343a40;">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Client</th>
          <th scope="col">Date</th>
          <th scope="col">Etat</th>
          <th scope="col">Montant</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach (Commande_Model::getAll() as $commande) {
						$utilisateur = Utilisateur_Model::getOne([["filterBy" => "login", "opt" => "equal", "filterValue" => (string)$commande->login]])[0];
						echo <<<HTML
							<tr>
								<td name="numCommande">$commande->numCommande</td>
								<td>$utilisateur->nom $utilisateur->prenom</td>
								<td>$commande->dateCommande</td>
								<td name="etat">$commande->etat</td>
								<td>$commande->montant</td>
								<td style="width: 140px">
									<a href="adminLignesCommande?numCommande={$commande->numCommande}">
										<i class="material-icons text-dark" name="lignesCom">list</i>
									</a>
									<i class="material-icons text-dark" name="valider">check</i>
									<i class="material-icons text-dark" name="annuler">clear</i>
								</td>
							</tr>
						HTML;
          }
        ?>
      </tbody>
    </table>
  </div>

	<script>
		$("i[name=valider]").click(function (e) {
			const tr = $(this).parent().parent();
			$.ajax({
				url: "http://localhost:5050/SIGL-WEB-Project/commandes",
				data: {
					method: "PATCH",
					data: {
						numCommande: tr.children("td[name=numCommande]").html(),
						etat: "validé"
					}
				},
				dataType: "json",
				type: "POST",
				// header: { method: "PATCH" },
				success: function (data) {
					tr.children("td[name=etat]").html("validé");
				}
			});
		})

		$("i[name=annuler]").click(function (e) {
			const tr = $(this).parent().parent();
			$.ajax({
				url: "http://localhost:5050/SIGL-WEB-Project/commandes",
				data: {
					method: "PATCH",
					data: {
						numCommande: tr.children("td[name=numCommande]").html(),
						etat: "annulé"
					}
				},
				dataType: "json",
				type: "POST",
				// header: { method: "PATCH" },
				success: function (data) {
					tr.children("td[name=etat]").html("annulé");
				}
			});		
		})
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "adminCommandes.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>