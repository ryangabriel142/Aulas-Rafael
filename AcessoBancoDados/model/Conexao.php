<?php
  class Conexao{
    private $local = "localhost";//ou"127.0.0.1"
    private $user = "root";
    private $password = "";//lisboa
    private $dataBase = "3info";
    private $conectar;

    public function setLocal($local){//armazena
      $this->local = $local;
    }
    public function getLocal(){//resgata
      return $this->local;
    }
    public function setUser($user){
      $this->user = $user;
    }
    public function getUser(){
      return $this->user;
    }
    public function setPassword($password){
      $this->password = $password;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setDataBase($dataBase){
      $this->dataBase = $dataBase;
    }
    public function getDataBase(){
      return $this->dataBase;
    }
    public function setConectar($conectar){
      $this->conectar = $conectar;
    }
    public function getConectar(){
      return $this->conectar;
    }
    public function __construct(){
        $conectar = new Mysqli(
            $this->getLocal(),
            $this->getUser(),
            $this->getPassword(),
            $this->getDataBase()
          );
        $this->setConectar($conectar);
    }
  }
?>
