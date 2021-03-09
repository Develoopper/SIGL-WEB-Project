<?php
  Route::get("products", function() {
    
  });

  Route::post("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $obj = new Produit_Model($data, "", "", "", "", "");
    $res = $obj->create();
    echo json_encode($res);
  });
  
  Route::patch("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::update($data["refProduit"], new Produit_Model($data["refProduit"], $data["libelle"], $data["prix"], $data["img"], $data["marque"], $data["sousCategorie"]));
    echo json_encode($res);
  });

  Route::delete("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $res = Produit_Model::deleteP($data);
    echo json_encode($res);
  });
?>