<?php
function ctrlSessionAdm(){
    if(isset($_SESSION['admin'])){
        return $_SESSION['admin']->getConnected();
    }else{
        return false;
    }
}