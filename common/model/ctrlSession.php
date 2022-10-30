<?php
function modifyHeader(){
    if(isset($_SESSION['admin'])){
        return $_SESSION['admin']->getConnected();
    }else if(isset($_SESSION['user'])){
        return $_SESSION['user']->getConnect();
    }else{
        return false;
    }
}
session_start();
// var_dump($_SESSION);