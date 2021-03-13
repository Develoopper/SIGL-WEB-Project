
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid mx-3">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand me-4" style="font-family: 'Dancing Script'; font-size: 35px;" href="./">Elegance</a>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="adminUtilisateurs">Utilisateurs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="adminProduits">Produits</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="adminCommandes">Commandes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="adminCategories">Categories</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="adminSousCategories">Sous categories</a>
				</li>
			</ul>

			<div class="d-flex align-items-center justify-content-between" style="font-size: 15px;">
				<div class="dropdown">
					<a href="#" class="nav-link dropdown-toggle d-flex align-items-center mx-3 text-dark" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
						<i class="material-icons mx-1" style="font-size: 30px;">account_circle</i>
						<span class="me-1"id="bonjourUtilisateur"><?php echo "Bienvenue " . $utilisateur->nom . " " . $utilisateur->prenom ;?></span>
					</a>
					<ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="logOut">Se déconnecter</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</nav>