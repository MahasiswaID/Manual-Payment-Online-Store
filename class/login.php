<?php
  class Login extends Site{

    public function index(){
      $this->setCustomTitle("Login");
      $koneksi = new Koneksi();
      if(isset($_POST['login'])){
        if((!empty($_POST['username']))&&(!empty($_POST['password']))){
          $username = $koneksi->db()->real_escape_string($_POST['username']);
          $password = sha1($_POST['password']);

          $cek = $koneksi->query("SELECT kunci_login FROM toko_admin WHERE username = '$username' AND password = '$password'");
          if($cek->num_rows!=0){
            $fetch = $cek->fetch_assoc();
            setcookie(cookie_name,$fetch['kunci_login'],time()+86400,'/');
            header("Location:".base_url('admin'));
          }else{
            $this->addAlert(array("negative","Password atau username salah"));
          }
        }
      }
    }
  }
