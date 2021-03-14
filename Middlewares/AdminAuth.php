<?php
  function AdminAuth() {
    if (!isset($_COOKIE["login"])) {
      header("Location: login");
      return false;
    }

    $utilisateur = Utilisateur_Model::getOne([["filterBy" => "login", "opt" => "equal", "filterValue" => $_COOKIE["login"]]])[0];
    if ($utilisateur->type != "admin") {
      header("Location: login");
      return false;
    }

    $_SESSION['login'] = $_COOKIE['login'];

    return $_COOKIE['login'];
  }
?>