<?php

    Route::post("addToCart", function() {
        Cart_Controller::createCart();
        echo Cart_Controller::addProduct($_POST["data"]);
    });

    Route::delete("deleteFromCart", function() {
        echo Cart_Controller::deleteProduct($_POST["data"]);
    });

    Route::set("cart", function() {
        // unset($_SESSION["panier"]);
        // setcookie("panier", "");
        // Cart_Controller::createCart();
        Controller::CreateView("Cart", []);
    });


?>