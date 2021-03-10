<?php
  Route::set("products", function() {
    Controller::CreateView("Products", [
      "products" => Produit_Model::getOne([["filterBy" => "sousCategorie", "opt" => "equal", "filterValue" => $_GET["id"]]])
    ]);
  });

  Route::set("product", function() {
    Controller::CreateView("Product", [
      "product" => Produit_Model::getOne([["filterBy" => "refProduit", "opt" => "equal", "filterValue" => $_GET["id"]]])[0]
    ]);
  });

  Route::get("products", function() {
    header('Content-Type: text/json');
    $data = $_POST["data"];
    $opt = "like";
    if ($data["filterBy"] == "prix")
      $opt = "equal";
    $res = Produit_Model::getOne([["filterBy" => $data["filterBy"], "opt" => $opt, "filterValue" => $data["filterValue"]]]);
    echo json_encode($res);
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