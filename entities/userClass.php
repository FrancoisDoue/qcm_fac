<?php
class User{
    private int $idUser;
    private string $lastName;
    private string $firstName;
    private string $mailUser;
    private string $pswUser;
    private string $cryptPsw;

    public function __construct(string $last, string $first, string $mail, string $psw/*, int $id = null*/)
    {
        // $this->idUser = $id;
        $this->lastName = $last;
        $this->firstName = $first;
        $this->mailUser = $mail;
        $this->pswUser = $psw;
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
    public function inscrUser($db, $req){
        $req = $db->prepare($req);
        // to modify

        // $req->bindparam('LASTNAME', $this->lastName, PDO::PARAM_STR);
        // $req->bindparam('FIRSTNAME', $this->firstName, PDO::PARAM_STR);
        // $req->bindparam('MAILUSER', $this->mailUser, PDO::PARAM_STR);
        // $req->bindparam('PSWUSER', $this->cryptPsw, PDO::PARAM_STR);
        // // var_dump($req);
        // $req->execute();
        // $db = null;
    }
}
// class UserG extends User{
//     public int $idGroup;
//     public function __construct(object $user, $idG)
//     {
//         // need to return with more info!!
        
//         // foreach($user as $prop){

//         // }
//     }
// }