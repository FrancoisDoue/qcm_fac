<?php
function connexionAdm(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $admin = new Admin(htmlspecialchars($_POST['login_admin']),htmlspecialchars($_POST['psw_admin']));
        if($admin->connectAdm(ConnectDb::mysqliDb(),reqAdm()) && $admin->getConnected()){
            $_SESSION['admin'] = $admin;
            return true;
        }else{
            unset($admin);
            return false;
        }
    }
}