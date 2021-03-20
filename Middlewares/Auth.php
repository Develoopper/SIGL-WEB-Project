<?php
  function Auth() {
    if (!isset($_SESSION["login"])) {
      header("Location: login");
      return false;
    }

    return $_COOKIE['login'];
  }
?>