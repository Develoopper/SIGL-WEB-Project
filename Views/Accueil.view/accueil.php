<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Accueil</title>
  <style>
    <?php include "accueil.css"; ?>
    <?php include "Views/assets/materialize/css/materialize.min.css"; ?>
  </style>
</head>
<body>
  <!-- Nav bar -->
  <nav>
    <div class="nav-wrapper nav-bar">
      <a href="#" class="brand-logo center">
        <img class="logo" src="assets/img/logo.png" style="margin-top: 5px;">
      </a>
      
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#">Femmes</a></li>
        <li><a href="#">Hommes</a></li>
        <li><a href="#">Garçons</a></li>
        <li><a href="#">Filles</a></li>
      </ul>
      <a href="#" class="brand-logo right">
        <span class='left' style='font-size: 20px; margin-right: 7'>
          <?php echo $name; ?>
        </span>
        <i class="material-icons" style="font-size: 30px">account_circle</i>
      </a>
    </div>
  </nav>
        
  <!-- Content -->
  <div class="row content s12 m10">
    <?php echo $users->nom; ?><br>
    <?php echo $user; ?>
  </div>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>
</html>