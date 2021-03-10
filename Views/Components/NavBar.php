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
						echo '
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									'.$categorie->libelle.'
								</a>
								<ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">						
						';

						foreach (SousCategorie_Model::getOne([
							["filterBy" => "categorie", "opt" => "equal", "filterValue" => (int)($categorie->id)]
						]) as $sousCategorie) {
							echo '<li><a class="dropdown-item" href="categorie?id='.$sousCategorie->id.'">'.$sousCategorie->libelle.'</a></li>';
						}
						
						echo '
								</ul>
							</li>
						';
					}
				?>					
			</ul>

			<div class="d-flex align-items-center justify-content-between" style="font-size: 15px;">
				<!-- <form class="d-flex me-2">
					<input class="form-control me-2" style="font-size: 14px; width: 200px" type="search" placeholder="Chercher un produit" aria-label="Search">
					<button class="btn btn-outline-dark" style="font-size: 14px;" type="submit">Rechercher</button>
				</form> -->
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