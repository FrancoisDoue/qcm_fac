<?php
function reqAdm(){
    $req = "SELECT `login_admin`,`psw_admin`
            FROM `administration`
            WHERE `login_admin` = '%s';";
    return $req;
}
function insUser(){
    // to modify
    $req = "INSERT INTO `user` (`last_name`,`first_name`,`mail_user`,`psw_user`)
            VALUES (:LASTNAME, :FIRSTNAME, :MAILUSER, :PSWUSER)";
    return $req;
}