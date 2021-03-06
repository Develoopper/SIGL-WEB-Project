<?php
  class Model {

    public static function load_xml($entity) {
      $xml = simplexml_load_file("../Database/$entity.xml") or die("Error: Cannot create object");
      return $xml;
    }

    protected static function saveInFile($xml, $fileName){
        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->saveXML());
        $dom->save("../Database/$fileName.xml");
        return true;
    }

    public function join() {
      # code...
    }
  }
?>