<?php
  class Home extends Site{

    public function index(){
      include_class('produk');
    }

    public function error(){
      setCustomTitle("Halaman tidak ditemukan");
    }

    public static function getKategoriBrand(){
      $kategori = array();
      $brand = array();
      $qkat = parent::db()->query("SELECT DISTINCT brand,kategori FROM toko_produk");
      while($fetch = $qkat->fetch_assoc()){
        array_push($kategori,$fetch['kategori']);
        array_push($brand,$fetch['brand']);
      }
      $kategori = array_unique($kategori);
      $brand = array_unique($brand);
      return array('kategori'=>$kategori,'brand'=>$brand);
    }

    public static function getKontak(){
      $hasil = array();
      $query = parent::db()->query("SELECT * FROM toko_kontak");
      while($fetch = $query->fetch_assoc()){
        array_push($hasil,array('nama'=>$fetch['nama'],'val'=>$fetch['isi']));
      }
      return $hasil;
    }

    public function produk(){
      if(!empty($_GET['url'])){
        $url = $_GET['url'];
        include_class('produk');
        $prod = Produk::getProduk($url);
        if(!empty($prod)){
          $this->setInfoProduk($prod[0]);
          $this->setCustomTitle(safe_echo_html("Jual ".$prod[0]->getNama()." Murah"));
        }else{
          $this->setCustomTitle('Produk tidak ditemukan');
        }
      }else{
        die(header("Location:".base_url()));
      }
    }
  }
