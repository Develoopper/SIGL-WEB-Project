<?php
  $slider = [
    [
      "title" => "First slide label",
      "content" => "Some representative placeholder content for the first slide.",
      "img" => "https://jennygracejewellery.co.uk/wp-content/uploads/2019/10/silver-fan-jewellery-header-e1604778854767-1200x360.jpg"
    ],
    [
      "libellee" => "Second slide label",
      "prix" => "Some representative placeholder content for the first slide.",
      "img" => "https://cdn.shopify.com/s/files/1/0811/2085/collections/under100banner_1200x1200.jpg?v=1604329232"
    ],
    [
      "libellee" => "Third slide label",
      "prix" => "Some representative placeholder content for the first slide.",
      "img" => "https://img1.wsimg.com/isteam/ip/b93c21eb-4bec-4f15-8616-1a0af4725974/ols/KlaarSmithDesign%20heart%20pendant%20bar.jpg/:/rs=w:1200,h:1200"
    ],
  ];

  $meilleursVentes = [
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360"
    ],
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/42/139382/1.jpg?9659"
    ],
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/16/295183/1.jpg?1806"
    ],
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/71/544163/1.jpg?0556"
    ],
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/344182/1.jpg?2292"
    ],
    [
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579.00,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/85/144613/1.jpg?2808"
    ],
  ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="accueil.css">
  <title>Document</title>
  <style>
    <?php include "home.css"; ?>
  </style>
</head>
<body>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mx-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" style="font-family: 'Dancing Script'; font-size: 35px;" href="">Elegance</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Femmes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hommes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filles
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Garçons
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>

        <div class="d-flex align-items-center justify-content-between" style="font-size: 15px;">
          <form class="d-flex me-2">
            <input class="form-control me-2" style="font-size: 14px; width: 200px" type="search" placeholder="Chercher un produit" aria-label="Search">
            <button class="btn btn-outline-dark" style="font-size: 14px;" type="submit">Rechercher</button>
          </form>
            <a href="login" class="d-flex align-items-center mx-3 text-dark" style="text-decoration: none;">
              <i class= "material-icons mx-1" style="font-size: 30px;">account_circle</i>
              Compte
            </a>
            <a href="#" class="d-flex align-items-center text-dark" style="text-decoration: none;">
              <i class="large material-icons mx-1" style="font-size: 30px;">shopping_cart</i>
              Panier
            </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Slider -->
  <div id="carouselExampleCaptions" data-bs-interval="3000" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner mb-4">
    <?php
      foreach ($slider as $index => $item) {
        echo '
          <div class="carousel-item '.($index == 0 ? "active" : "").'">
            <img src="'.$item["img"].'" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        ';
      }
    ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Meilleures ventes -->
  <div class="mx-3 my-4 px-3 py-3 bg-light" style="border-radius: 10px; font-size: 13px;">
    <h3 class="mb-3">Meilleur ventes</h3>

    <div id="meilleurs-ventes" data-bs-interval="0" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner px-5">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text text-truncate">'.$item["libellee"].'</p>
                    <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev ms-3" style="width: 0px;" type="button" data-bs-target="#meilleurs-ventes"  data-bs-slide="prev">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_left</i>
      </button>
      <button class="carousel-control-next me-3" style="width: 0px;" type="button" data-bs-target="#meilleurs-ventes"  data-bs-slide="next">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_right</i>
      </button>
    </div>
  </div>

  <!-- Ads row -->
  <div class="d-flex justify-content-evenly mx-3 my-4 px-3 py-3 ">
    <div class="shadow-effect bg-light d-flex justify-content-center p-2" style="border-radius: 10px; font-size: 13px;">
      <img src="https://ma.jumia.is/cms/000_2021/Week08/DoubleBanners/MA_W08_DB_montres.png" style="border-radius: 5px" alt="" srcset="">
    </div>
    <div class="shadow-effect bg-light d-flex justify-content-center p-2" style="border-radius: 10px; font-size: 13px;">
      <img src="https://ma.jumia.is/cms/000_2021/Week08/DoubleBanners/MA_W08_DB_Beaute.png" style="border-radius: 5px" alt="" srcset="">
    </div>
  </div>

  <!-- Petits prix -->
  <div class="mx-3 my-4 px-3 py-3 bg-light" style="border-radius: 10px; font-size: 13px;">
    <h3 class="mb-3">Petits prix</h3>

    <div id="petits-prix" data-bs-interval="0" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner px-5">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text text-truncate">'.$item["libellee"].'</p>
                    <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev ms-3" style="width: 0px;" type="button" data-bs-target="#petits-prix"  data-bs-slide="prev">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_left</i>
      </button>
      <button class="carousel-control-next me-3" style="width: 0px;" type="button" data-bs-target="#petits-prix"  data-bs-slide="next">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_right</i>
      </button>
    </div>
  </div>

  <!-- Ads row -->
  <div class="d-flex justify-content-evenly mx-3 my-4 px-3 py-3 ">
    <div class="shadow-effect bg-light d-flex justify-content-center p-2" style="border-radius: 10px; font-size: 13px;">
      <img src="https://ma.jumia.is/cms/000_2021/Week07/DB/MA_W07_DB_ModeFemme.png" style="border-radius: 5px" alt="" srcset="">
    </div>
    <div class="shadow-effect bg-light d-flex justify-content-center p-2" style="border-radius: 10px; font-size: 13px;">
      <img src="https://ma.jumia.is/cms/000_2021/Week07/DB/MA_W07_DB_ModeHomme.png" style="border-radius: 5px" alt="" srcset="">
    </div>
  </div>

  <!-- Tendance -->
  <div class="mx-3 my-4 px-3 py-3 bg-light" style="border-radius: 10px; font-size: 13px;">
    <h3 class="mb-3">Tendance</h3>

    <div id="tendance" data-bs-interval="0" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner px-5">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text text-truncate">'.$item["libellee"].'</p>
                    <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row mx-6 d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                  <div class="card-body p-2">
                    <p class="card-text cut-text">'.$item["libellee"].'</p>
                    <p class="card-text cut-text">'.$item["prix"].' DH</p>
                  </div>
                </div>
              ';
            }
          ?>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev ms-3" style="width: 0px;" type="button" data-bs-target="#tendance"  data-bs-slide="prev">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_left</i>
      </button>
      <button class="carousel-control-next me-3" style="width: 0px;" type="button" data-bs-target="#tendance"  data-bs-slide="next">
        <i class="material-icons text-dark" style="font-size: 50px;">keyboard_arrow_right</i>
      </button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-center text-light">
    <!-- Grid container -->
    <div class="container p-4 mt-5">
      <span class="text-light" style="font-family: 'Dancing Script'; font-size: 35px;" href="#">Elegance</span>
      <!-- Section: Social media -->
      <section class="my-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
      </section>
      <!-- Section: Social media -->

      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Abonnez-vous pour recevoir nos meilleures offres!</strong>
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" placeholder="name@example.com"/>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                S'abonner
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->

      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
          repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
          eum harum corrupti dicta, aliquam sequi voluptate quas.
        </p>
      </section>
      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row" style="font-size: 10px; text-decoration: none !important;">
          <!--Grid column-->
          <div class="col">
            <h5 class="text-uppercase">Service client</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Aide & FAQ</a>
              </li>
              <li>
                <a href="#!" class="text-white">Commandez par Tél: 05.22.33.44.55</a>
              </li>
              <li>
                <a href="#!" class="text-white">Politique de retour</a>
              </li>
              <li>
                <a href="#!" class="text-white">Signaler un Produit</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col">
            <h5 class="text-uppercase">À PROPOS</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Qui sommes-nous</a>
              </li>
              <li>
                <a href="#!" class="text-white">Conditions Générales d'Utilisation</a>
              </li>
              <li>
                <a href="#!" class="text-white">Politique de Confidentialité</a>
              </li>
              <li>
                <a href="#!" class="text-white">Travailler chez <span style="font-family: 'Dancing Script'; font-size: 15px;">Elegance</span></a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script>
    <?php include "accueil.js"; ?>
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>
</html>