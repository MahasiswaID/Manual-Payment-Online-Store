<?php
class Koneksi{
  private $dbhost = "localhost";
  private $dbname = "hijab";
  private $dbuser = "root";
  private $dbpass = "root";
  private $connect;

  public function connect(){
    $this->connect = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
  }

  public function __construct(){
    $this->connect();
  }

  public function db(){
    return $this->connect;
  }

  public function query($sql){
    return $this->connect->query($sql);
  }
}
