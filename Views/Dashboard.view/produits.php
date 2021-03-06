
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<title>Produits</title>
	<style>
			<?php
					include "./dashboard.css";
					#include "../assets/materialize/css/materialize.min.css";
					include "../assets/bootstrap/bootstrap.min.css";
			?>
	</style>
</head>
<body>
	<?php require 'sidebar.php';?>
			<div class="main col-md-9 col-sm-auto col-lg-10 sm px-4">
				<div class="main-content">
					<div class="container">
						<h3 class="panel-title"> Produits </h3>
						<hr>
						<div class="tab-responsive">
							<table class="table">
								<thead>
										<tr>
										<th scope="col">Reference</th>
										<th scope="col">Libelle</th>
										<th scope="col">prix</th>
										<th scope="col">marque</th>
										<th scope="col">Categorie</th>
										</tr>
								</thead>
								<tbody>
									<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
									</tr>
									<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
									</tr>
									<tr>
									<th scope="row">3</th>
									<td colspan="2">Larry the Bird</td>
									<td>@twitter</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>