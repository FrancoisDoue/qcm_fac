<?php
function inscriptionUser($validate = false){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $verifInputs = true;
        foreach($_POST as $input){
            if($input == '' || !is_string($input)){
                $verifInputs = false;
            }
        }
        if($verifInputs){
            if(!User::userExists($_POST['mailUser'])){
                $user = new User(
                    $_POST['lastName'],
                    $_POST['firstName'],
                    $_POST['mailUser'],
                    $_POST['pswUser']
                );
                if($validate){
                    return $user->inscrUser(ConnectDb::mysqliDb(),reqInsUser());
                }else{
                    return true;
                }
            }else{
                return ErrorMessage::inscrMail();
            }
        }else{
            return ErrorMessage::errorPost();
        }
    }
}