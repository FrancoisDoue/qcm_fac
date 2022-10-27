<?php
class ConnectDb{
    private const   HOST = 'localhost',
                    DBNAME = 'qcmfac',
                    LOGIN = 'root',
                    PWD = 'root';
    public static function Db(){
        try{
            $db = new PDO('mysql:host'.self::HOST.';dbname='.self::DBNAME.';charset=utf8',self::LOGIN,self::PWD);
            return $db;
        }catch(Exception $e){
            die('ERROR :'.$e->getMessage());
        }
    }
    public static function mysqliDb(){
        mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli(self::HOST,self::LOGIN,self::PWD,self::DBNAME);
        return $mysqli;
    }
}