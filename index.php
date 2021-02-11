<?php
  session_start();
  require_once "Routes.php";

  function __autoload($class_name) {
    if (file_exists("./Classes/".$class_name.".php"))
      require_once "./Classes/".$class_name.".php";
    else if ($class_name == "Controller" && file_exists("./Controllers/Controller.php"))
      require_once "./Controllers/Controller.php";
    else if (file_exists("./Controllers/".$class_name.".controller.php"))
      require_once "./Controllers/".$class_name.".controller.php";
    else if ($class_name == "Model" && file_exists("./Models/Model.php"))
      require_once "./Models/Model.php";
    else if (file_exists("./Models/".$class_name.".model.php"))
      require_once "./Models/".$class_name.".model.php";
  }
?>