<?php
function ctrlSessionAdm(){
    if(isset($_SESSION['admin'])){
        if($_SESSION['admin']->getConnected()){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}