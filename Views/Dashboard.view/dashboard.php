
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Dashboard</title>
    <style>
        <?php
            include "./dashboard.css";
            include "../assets/materialize/css/materialize.min.css";
            include "../assets/bootstrap/bootstrap.min.css";
        ?>
    </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li><a href="">Produits</a></li>
                    <li><a href="">Utilisateurs</a></li>
                    <li><a href="">Commandes</a></li>
                </ul>
            </div>

        <div class="main-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-access" id="menu-toggle"></a>
                        <h1>Sidebar Layouts are cool</h1>
                        <p>hey you.
                            hey you.
                            hey you.
                            hey you.
                            hey you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
        </script>
        <?php include './sidebar.php';?>
    </body>
</html>