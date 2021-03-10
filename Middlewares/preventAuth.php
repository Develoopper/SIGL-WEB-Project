<?php
  function preventAuth() {
    if (isset($_COOKIE["login"]) && $_GET["url"] == "login") {
      header("Location: ./");
      return false;
    }

    return true;
  }
?>