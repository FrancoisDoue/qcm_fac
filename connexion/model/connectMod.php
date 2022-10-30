<?php
function tryConnexionUser(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $veriField = true;
        if(count($_POST) === 2){
            foreach($_POST as $field){
                if($field == ''){
                    $veriField = false;
                }
            }
        }else{
            $veriField = false;
        }
        if($veriField && isset($_POST['mailUser'])){
            if(User::userExists($_POST['mailUser'])){
                $val = User::getUser(ConnectDb::mysqliDb(), reqGetUser(), $_POST['mailUser']);
                $_SESSION['user'] = new User(
                    $val->last_name,
                    $val->first_name,
                    $val->mail_user,
                    ''
                );
                $_SESSION['user']->setId($val->id_user);
                $_SESSION['user']->simpleSetPsw($val->psw_user);
                if($_SESSION['user']->comparePsw($_POST['pswUser'])){
                    $_SESSION['user']->setConnect(true);
                    return true;
                }else{
                    unset($_SESSION['user']);
                    return ErrorMessage::errorConnect();
                }
            }else{
                return ErrorMessage::errorMail();
            }
        }else{
            return ErrorMessage::errorField();
        }
    }else{
        return false;
    }
}