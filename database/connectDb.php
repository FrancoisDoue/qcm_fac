<?php

use DevQcm\DotEnv;
(new DotEnv('.env'))->load();

class ConnectDb{

    public static function Db(){
        try{
            $db = new PDO('mysql:host'.$_ENV['DBHOST'].';dbname='.$_ENV['DBNAME'].';charset=utf8',$_ENV['DBLOGIN'],$_ENV['DBPWD']);
            return $db;
        }catch(Exception $e){
            die('ERROR :'.$e->getMessage());
        }
    }
    public static function mysqliDb(){
        mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli($_ENV['DBHOST'],$_ENV['DBLOGIN'],$_ENV['DBPWD'],$_ENV['DBNAME']);
        return $mysqli;
    }
}