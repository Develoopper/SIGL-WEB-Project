<?php

    Route::set("addToCart", function() {
        Cart_Controller::addProduct($_POST["refProduit"], $_POST["libelle"], $_POST[""], $_POST[], $_POST[], $_POST[]);
    });

    Route::set("deleteFromCart", function() {
        Cart_Controller::deleteProduct($_GET["refProduit"]);
    });

    Route::set("cart", "Auth", function() {
        Cart_Controller::createCart();
        Controller::CreateView("Cart", []);
    });


?>