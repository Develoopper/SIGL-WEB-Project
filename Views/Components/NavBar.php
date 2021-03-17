<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid mx-3">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand me-4" style="font-family: 'Dancing Script'; font-size: 35px;" href="./">Elegance</a>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php
					foreach (Categorie_Model::getAll() as $categorie) {
						echo <<<HTML
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									$categorie->libelle
								</a>
								<ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
						HTML;

						foreach (SousCategorie_Model::getOne([
							["filterBy" => "categorie", "opt" => "equal", "filterValue" => (int)($categorie->id)]
						]) as $sousCategorie) {
							echo <<<HTML
								<li><a class="dropdown-item" href="products?id=$sousCategorie->id">$sousCategorie->libelle</a></li>
							HTML;
						}

						echo <<<HTML
								</ul>
							</li>
						HTML;
					}
				?>
			</ul>

			<div class="d-flex align-items-center justify-content-between" style="font-size: 15px;">
				<!-- <form class="d-flex me-2">
					<input class="form-control me-2" style="font-size: 14px; width: 200px" type="search" placeholder="Chercher un produit" aria-label="Search">
					<button class="btn btn-outline-dark" style="font-size: 14px;" type="submit">Rechercher</button>
				</form> -->

				<?php
					if (isset($_SESSION["login"])) {
						echo <<<HTML
							<div class="dropdown">
								<a href="#" class="nav-link dropdown-toggle d-flex align-items-center mx-3 text-dark" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
									<i class="material-icons mx-1" style="font-size: 30px;">account_circle</i>
									<span class="me-1" id="bonjourUtilisateur" >Bienvenue $utilisateur->prenom</span>
								</a>
								<ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href='logOut'>Se déconnecter</a></li>
								</ul>
							</div>
						HTML;
					} else {
						echo <<<HTML
							<a href="login" class="d-flex align-items-center mx-3 text-dark" style="text-decoration: none;">
								<i class="material-icons mx-1" style="font-size: 30px;">account_circle</i>
								<span class="me-1">Compte</span>
							</a>
						HTML;
					}
				?>

				<a href="cart" class="d-flex align-items-center text-dark" style="text-decoration: none;">
					<i class="large material-icons mx-1" style="font-size: 30px;">shopping_cart</i>
					<span class="col-6">Panier</span>
					<span class="badge bg-danger" style="left: 70px;" id="nbreItemsPanier"><?php echo $nbreProductPanier ?></span>
				</a>
			</div>
		</div>
	</div>
</nav>