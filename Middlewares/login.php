<?php
    function signIn() {
        session_start();
        if(isset($_POST["email"]) && isset($_POST["mp"])){
            $Users = User_Model::getOne([["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["email"]], ["filterBy" => "mp", "opt" => "equal", "filterValue" => hash("sha256", $_POST["mp"])]]);
            if(is_array($Users)){
                $_SESSION["login"] = (string)$Users[0]->login;
                if($Users[0]->type == "admin"){
                    header('Location: admin/products');
                }
                else{
                    header("Location: ./");
                }
            }else{
                header("Location:login?erreur=1");
            }
        }

    }
    function signUp() {
        if(isset($_POST["emailIns"]) && isset($_POST["mpIns"])){
            $Users = User_Model::getOne([["filterBy" => "email", "opt" => "equal", "filterValue" => $_POST["emailIns"]]]);
            if(!is_array($Users)){
                $newUser = new User_Model("", $_POST["nom"], $_POST["prenom"], $_POST["mpIns"], $_POST["emailIns"], "client");
                if($newUser->create())
                    Header("Location:");
            }else{
                echo '<script>alert("'.$Users.'")</script>';
                Header("Location:login");
            }
        }
    }

?>