<?php
  function Auth() {
    session_start();

    if (!isset($_COOKIE["login"])) {
      header("Location: login");
      return false;
    } 

    $_SESSION["login"] = $_COOKIE["login"];

    return $_COOKIE["login"];
  }
?>