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
  <title>EnAttente</title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
  <style>
    <?php include "enAttente.css"; ?>
  </style>
</head>
<body>
    <!-- Nav bar -->
    <?php Component("NavBar", ["utilisateur" => $utilisateur]); ?>

    <?php
      setcookie("panier", "", time() - 3600);
      unset($_SESSION["panier"]);
    ?>

    <div class="d-flex flex-column centre">
      <div class="d-flex align-items-center justify-content-center flex-row-container" style="height: 130px;">
        <div class="me-3 flex-row-item" id="iconContainer">
          <i class="fas fa-check-circle" id="icon" style="font-size: 120px;"></i>
        </div>
        <div class="flex-row-item" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 20px;" id="message"></div>
      </div>

      <!-- <div id="paypal-button"></div> -->
      <div id="smart-button-container" class="pt-5">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
          <a href="./" ><button id="toHome" class="btn btn-dark">Retourner a la page d'accueil</button></a>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php Component("Footer", []); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
  <script src="https://www.paypal.com/sdk/js?client-id=AaeAULfxD5RTmtp6BB7VObKlhuZ0mb9UQ7nJrid6h4bQUX0bdyG-HH395H-KTOh9AtxjQ8v_a4FingvZ&disable-funding=credit,card" data-sdk-integration-source="button-factory"></script>
  <script>
    <?php include "home.js"; ?>

    $("#iconContainer").hide();
    $("#paypal-button-container").hide();
    $("#toHome").hide();
    var total = "";
    var afficher_payment = false;

    var interval = setInterval(() => {

      $.ajax({
        url: "http://localhost:5050/SIGL-WEB-Project/testeCommande",
        data: {
          method: "GET",
          data: {
            idCommande: <?php echo $_GET["idCommande"]; ?>,
          }
        },
        dataType: "json",
        type: "POST",
        success: function (data) {
          console.log(data);
          var message = "";
          if (data["etat"][0] == "validé") {
            message = "Notre chère client " + <?php echo "'" .$utilisateur->nom . " " . $utilisateur->prenom . "'" ;?> + " </br>Votre commande est validée.";
            afficher_payment = true;
            window.total = data["total"][0];
            afficherPayement();
          }
          if(data["etat"][0] == "annulé") {
            message = "Notre chère client " + <?php echo "'" .$utilisateur->nom . " " . $utilisateur->prenom . "'" ;?> + " </br>Votre commande a été annulée. ";
            $("#icon").removeClass('fas');
            $("#icon").removeClass('fa-check-circle');
            $("#icon").addClass('fa');
            $("#icon").addClass('fa-window-close');
            $("#iconContainer").show();
            clearInterval(interval);
          }
          if(data["etat"][0] == "En attente")
            message = "Notre chère client " + <?php echo "'" .$utilisateur->nom . " " . $utilisateur->prenom . "'" ;?> +  ", votre Commande est en cours de traitement.";
          if(data["etat"][0] == "payée") {
            message = "Félicitation, " + <?php echo "'" .$utilisateur->nom . " " . $utilisateur->prenom . "'" ;?> + "<br> votre paiement a été éffectué avec succès."
            $("#iconContainer").show();
            clearInterval(interval);
          }
          $("#message").html(message);
        },
        error: function () {
          console.log("*****");
        }
        });
    }, 100);

    function afficherPayement() {
      if (window.afficher_payment && !$("#paypal-button-container").is(":visible")) {
        $("#iconContainer").show();
        $("#paypal-button-container").show();
        initPayPalButton();
        clearInterval(interval);
      }
    }

    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'black',
          layout: 'vertical',
          label: 'paypal',
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [
              {"amount":{
                "currency_code":"USD",
                "value":  String((parseFloat(window.total) / 8.98).toFixed(2))
              }
            }]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            $("#message").html("Félicitation, " + details.payer.name.given_name + " votre paiement a été éffectué avec succès.");
            $("#paypal-button-container").hide();
            $.ajax({
              url: "http://localhost:5050/SIGL-WEB-Project/commandes",
              data: {
                method: "PATCH",
                data: {
                  numCommande: <?php echo $_GET["idCommande"]; ?>,
                  etat: "payée"
                }
              },
              dataType: "json",
              type: "POST",
              success: function (data) {
                $("#toHome").show();
              }
            });
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }

  </script>


</body>
</html>