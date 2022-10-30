<?php
class User{
    private int $idUser;
    private string $lastName;
    private string $firstName;
    private string $mailUser;
    private string $cryptPsw;
    private string $connected;
    
    public function __construct(string $last, string $first, string $mail, string $psw/*, int $id = null*/)
    {
        // $this->idUser = $id;
        $this->lastName = $last;
        $this->firstName = $first;
        $this->mailUser = $mail;
        $this->connected = false;
        $this->cryptPsw = password_hash($psw,PASSWORD_BCRYPT);
    }
    
    public function setId(int $param){
        $this->idUser = $param;
    }
    public function setLastName(string $param){
        $this->lastName = $param;
    }
    public function setFirstName(string $param){
        $this->firstName = $param;
    }
    public function setMail(string $param){
        $this->mailUser = $param;
    }
    public function setConnect(bool $param){
        $this->connected = $param;
    }
    public function simpleSetPsw(string $param){
        $this->cryptPsw = $param;
    }
    public function setCryptPsw(string $param){
        $this->cryptPsw = password_hash($param,PASSWORD_BCRYPT);
    }
    public function getId(){
        return $this->idUser;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getMail(){
        return $this->mailUser;
    }
    public function getConnect(){
        return $this->connected;
    }
    public function comparePsw(string $clearPassword){
        return password_verify($clearPassword,$this->cryptPsw);
    }
    public static function userExists(string $mail){
        $mysqli = ConnectDb::mysqliDb();
        $mysqli = $mysqli->query(sprintf(reqSearchUser() , $mysqli->real_escape_string($mail)));
        $result = $mysqli->fetch_array();
        $mysqli->close();
        return !empty($result);
    }
    public static function getUser(mysqli $db, $req, $mail){
        $db = $db->query(sprintf($req,$db->real_escape_string($mail)));
        $result = $db->fetch_object();
        $db->close();
        return $result;
    }

    public function inscrUser(mysqli $db, $req){
        $db->query(
            sprintf(
                $req,
                $db->real_escape_string($this->getLastName()),
                $db->real_escape_string($this->getFirstName()),
                $db->real_escape_string($this->getMail()),
                $db->real_escape_string($this->cryptPsw)
            )
        );
        $db->close();
        return true;
    }
}