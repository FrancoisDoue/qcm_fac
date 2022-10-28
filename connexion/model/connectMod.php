<?php
function connexionUser(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $veriField = true;
        if(count($_POST) === 2){
            foreach($_POST as $field){
                if($field == ''){
                    $veriField = false;
                }
            }
        }
    }else{
        return false;
    }
}