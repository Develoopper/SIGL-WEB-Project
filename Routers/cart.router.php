<?php

    Route::post("addToCart", function() {
        Cart_Controller::createCart();
        echo Cart_Controller::addProduct($_POST["data"]);
    });

    Route::post("deleteFromCart", function() {
        echo Cart_Controller::deleteProduct($_GET["refProduit"]);
    });

    Route::set("cart", "Auth", function() {
        // unset($_SESSION["panier"]);
        // setcookie("panier", "");
        // Cart_Controller::createCart();
        Controller::CreateView("Cart", []);
    });


?>