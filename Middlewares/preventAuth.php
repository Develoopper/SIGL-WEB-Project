<?php
  function PreventAuth() {
    if (isset($_SESSION['login']) && $_GET["url"] == "login") {
      header("Location: ./");
      return false;
    }

    return true;
  }
?>