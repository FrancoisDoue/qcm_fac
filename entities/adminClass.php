<?php
class Admin{
    // private int $idAdmin;
    private string $loginAdmin;
    private string $pswAdmin;
    private bool $connected = false;

    public function __construct(/*$id,*/$login,$psw)
    {
        // $this->idAdmin = $id;
        $this->loginAdmin = $login;
        $this->pswAdmin = $psw;
    }
    public function getPsw(){
        return $this->pswAdmin;
    }
    public function getLogin(){
        return $this->loginAdmin;
    }
    public function getConnected(){
        return $this->connected;
    }
    public function getCryptPsw(){
        return password_hash($this->pswAdmin,PASSWORD_BCRYPT);
    }
    private function comparePsw($hash){
        return password_verify($this->pswAdmin,$hash);
    }
    // private function setConnected(){
    //     $this->connected = true;
    // }
    /**
     * @param mysqli $db connexion to sql with mysqli
     * @param string $req sql request with an string %s parameter for sprintf()
     * @return bool  
     */
    public function connectAdm(mysqli $mysqli, string $req){
        $result = $mysqli->query(sprintf($req, $mysqli->real_escape_string($this->loginAdmin)));
        $result = $result->fetch_object();
        $mysqli->close();
        if(!is_null($result) && $result->login_admin === $this->loginAdmin){
            if($this->comparePsw($result->psw_admin)){
                $this->connected = true;
            }
            return $this->comparePsw($result->psw_admin);
        }else{
            return false;
        }
        // return (!is_null($result) && $result->login_admin === $this->loginAdmin) ? $this->comparePsw($result->psw_admin) : false;
    }
}