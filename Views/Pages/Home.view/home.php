<?php
  $slider = [
    [
      "title" => "First slide label",
      "content" => "Some representative placeholder content for the first slide.",
      "img" => "https://jennygracejewellery.co.uk/wp-content/uploads/2019/10/silver-fan-jewellery-header-e1604778854767-1200x360.jpg"
    ],
    [
      "title" => "Second slide label",
      "content" => "Some representative placeholder content for the first slide.",
      "img" => "https://cdn.shopify.com/s/files/1/0811/2085/collections/under100banner_1200x1200.jpg?v=1604329232"
    ],
    [
      "title" => "Third slide label",
      "content" => "Some representative placeholder content for the first slide.",
      "img" => "https://img1.wsimg.com/isteam/ip/b93c21eb-4bec-4f15-8616-1a0af4725974/ols/KlaarSmithDesign%20heart%20pendant%20bar.jpg/:/rs=w:1200,h:1200"
    ],
  ];

  $meilleursVentes = [
    [
      "id" => 1,
      "libellee" => "Montre water-proof taille standard",
      "prix" => 579,
      "img" => "https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/24/177193/1.jpg?3360"
    ],
    [
      "id" => 2,
      "libellee" => "Porte feuille cuire",
      "prix" => 150,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/42/139382/1.jpg?9659"
    ],
    [
      "id" => 3,
      "libellee" => "Lunettes de soleil",
      "prix" => 200,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/16/295183/1.jpg?1806"
    ],
    [
      "id" => 4,
      "libellee" => "Puzzle pendentif",
      "prix" => 100,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/71/544163/1.jpg?0556"
    ],
    [
      "id" => 5,
      "libellee" => "Bague en argent",
      "prix" => 300,
      "img" => "https://ma.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/344182/1.jpg?2292"
    ],
    [
      "id" => 6,
      "libellee" => "Echarpe pour homme",
      "prix" => 120,
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
  <title>Home</title>
  <style>
    <?php include "home.css"; ?>
  </style>
</head>
<body>
  <!-- Nav bar -->
  <?php 
    Component("NavBar", [
      // "logged" => isset($_SESSION["login"])
    ]); 
  ?>

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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
      <img src="https://ma.jumia.is/cms/000_2021/Week07/DB/MA_W07_DB_ModeHomme.png" style="border-radius: 5px" alt="" srcset="">
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
      <img src="https://ma.jumia.is/cms/000_2021/Week08/DoubleBanners/MA_W08_DB_montres.png" style="border-radius: 5px" alt="" srcset="">
    </div>
  </div>
  

  <!-- Nouveautés -->
  <div class="mx-3 my-4 px-3 py-3 bg-light" style="border-radius: 10px; font-size: 13px;">
    <h3 class="mb-3">Nouveautés</h3>

    <div id="tendance" data-bs-interval="0" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner px-5">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-around my-1">
          <?php
            foreach ($meilleursVentes as $item) {
              echo '
                <div class="card shadow-effect col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" style="width: 180px; height: 250px; border: none;">
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
                  <a href="product?id='.$item["id"].'" style="text-decoration: none;" class="text-dark">
                    <img src='.$item["img"].'style="height: 180px; width: 180px" class="card-img-top" alt="...">
                    <div class="card-body p-2">
                      <p class="card-text text-truncate">'.$item["libellee"].'</p>
                      <p class="card-text text-truncate">'.$item["prix"].' DH</p>
                    </div>
                  </a>
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
	<?php Component("Footer", []); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script>
    <?php include "home.js"; ?>
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->

</body>
</html>