<?php
// here 
function inscriptionUser(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        var_dump($_POST);
        $user = new User(
            $_POST['lastName'],
            $_POST['firstName'],
            $_POST['mailUser'],
            $_POST['pswUser']
        );
        // to modify
        return $user->inscrUser(ConnectDb::db(),insUser());
    }
}