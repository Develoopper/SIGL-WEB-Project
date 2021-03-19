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
		<?php include "adminSousCategories.css"; ?>
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
          <th scope="col">Libellé</th>
          <th scope="col">Categorie</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach (SousCategorie_Model::getAll() as $sousCategorie) {
            $categorie = Categorie_Model::getOne([
              ["filterBy" => "id", "opt" => "equal", "filterValue" => (int)$sousCategorie->categorie]
            ])[0];
            
            echo <<<HTML
              <tr>
                <td>$sousCategorie->id</td>
                <td>$sousCategorie->libelle</td>
                <td><span id="$sousCategorie->categorie">$categorie->libelle</span></td>
              </tr>
            HTML;
          }
        ?>
      </tbody>
    </table>
    <button id="table-new-row-button" class="btn btn-outline-dark d-flex align-items-center mb-1">
      <i class="material-icons me-1" style="font-size: 20px;">add</i>
      Nouvelle ligne
    </button>
  </div>

  <script>
    let selectOptions = JSON.parse('<?php echo json_encode(Categorie_Model::getAll()) ?>');
  </script>

  <script><?php include "bstable.js"; ?></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script>
		<?php include "adminSousCategories.js"; ?>
	</script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>

</html>