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

    protected static function searchInXML($id, $xml){
      $exist = false;
      foreach($xml->children() as $element){
        if($element->id == $id){
          $exist = true;
          $foundElement = $element;
        }
      }
      return [$exist, @$foundElement];
    }

    public static function delete($id, $nomFichier, $element, $elementId) {
      $xml = self::load_xml($nomFichier);
      $exist = self::searchInXML($id, $xml);

      if($exist) {
        $id = $xml->xpath("//$element/".$elementId."[.='$id']");
        if(isset($id))
            $elementSupri = current($id[0]->xpath("parent::*"));

        if (!empty($elementSupri)) {
          unset($elementSupri[0]);
        }
      }

      return self::saveInFile($xml, $nomFichier);
    }

    public function join() {
      # code...
    }
  }
?>