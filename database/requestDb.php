<?php
function reqAdm(){
    $req = "SELECT `login_admin`,`psw_admin`
            FROM `administration`
            WHERE `login_admin` = '%s';";
    return $req;
}
function reqInsUser(){
    $req = "INSERT INTO `user` (`last_name`,`first_name`,`mail_user`,`psw_user`)
            VALUES ('%s', '%s', '%s', '%s')";
    return $req;
}
function reqSearchUser(){
    $req = "SELECT `id_user`
            FROM `user`
            WHERE `mail_user` = '%s'";
    return $req;
}