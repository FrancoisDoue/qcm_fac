<?php
function inscriptionUser($validate = false){
    $veriFields = true;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($_POST as $field){
            if($field == ''){
                $veriFields = false;

                // possibilité de renvoyer un message d'erreur?
            }
        }
    }
    if(!$validate){
        if($veriFields && count($_POST) == 4){
            $_SESSION['user'] = new User(
                $_POST['lastName'],
                $_POST['firstName'],
                $_POST['mailUser'],
                $_POST['pswUser']
            );
            unset($_POST);
            return true;
        }else{
            return false;
        }
    }else{
        if(isset($_SESSION['user']) && isset($_POST['pswUser'])){
            if(!User::userExists($_SESSION['user']->getMail()) && $_SESSION['user']->comparePsw($_POST['pswUser'])){
                return $_SESSION['user']->inscrUser(ConnectDb::mysqliDb(),reqInsUser());
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}