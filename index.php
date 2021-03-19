<?php
  session_start();

  spl_autoload_register(function ($class_name) {
    if (file_exists("./Classes/".$class_name.".php"))
      require_once "./Classes/".$class_name.".php";
    else if ($class_name == "Controller" && file_exists("./Controllers/Controller.php"))
      require_once "./Controllers/Controller.php";
    else if (file_exists("./Controllers/".explode("_", $class_name)[0].".controller.php"))
      require_once "./Controllers/".explode("_", $class_name)[0].".controller.php";
    else if ($class_name == "Model" && file_exists("./Models/Model.php"))
      require_once "./Models/Model.php";
    else if (file_exists("./Models/".explode("_", $class_name)[0].".model.php"))
      require_once "./Models/".explode("_", $class_name)[0].".model.php";
  });

  function Component($fileName, $variables) {
    extract($variables);
    require_once "Views/Components/".$fileName.".php";
  }

  require_once "Routes.php";
?>