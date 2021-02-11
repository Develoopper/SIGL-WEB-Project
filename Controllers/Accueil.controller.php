<?php
  class Accueil extends Controller {
    public static function Test() {
      print_r(UserModel::getAll());
    }
  }
?>