<?php
function reqAdm(){
    $req = "SELECT `login_admin`,`psw_admin`
            FROM `administration`
            WHERE `login_admin` = '%s';";
    return $req;
}