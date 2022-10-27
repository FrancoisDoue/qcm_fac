<?php
class User{
    private int $idUser;
    private string $lastName;
    private string $firstName;
    private string $mailUser;
    private string $pswUser;

    public function __construct(int $id = null, string $last, string $first, string $mail, string $psw)
    {
        $this->idUser = $id;
        $this->lastName = $last;
        $this->firstName = $first;
        $this->mailUser = $mail;
        $this->pswUser = $psw;
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
    public function setPsw(string $param){
        $this->pswUser = $param;
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
    public function getPsw(){
        return $this->pswUser;
    }

}
class UserG extends User{
    public int $idGroup;
    public function __construct(object $user, $idG)
    {
        // need to return with more info!!
        
        // foreach($user as $prop){

        // }
    }
}