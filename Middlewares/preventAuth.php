<?php
  function PreventAuth() {
    if (isset($_COOKIE["login"]) && $_GET["url"] == "login") {
      header("Location: ./");
      return false;
    }

    return true;
  }
?>