<?php
  class Model {

    public static function load_xml($entity) {
      $xml = simplexml_load_file("../Database/$entity.xml") or die("Error: Cannot create object");
      return $xml;
    }


    public function join() {
      # code...
    }
  }
?>