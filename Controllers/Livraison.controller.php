
<?php
    class Livraison_Controller extends Controller {

        public static function post() {
            header('Content-Type: text/json');
            $data = $_POST["data"];
            echo json_encode("OK");
        }

    }
?>