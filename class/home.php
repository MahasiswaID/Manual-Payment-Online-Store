<?php
  class Home extends Site{

    public function index(){
      include_class('produk');
    }

    public function error(){
      $this->setCustomTitle("Halaman tidak ditemukan");
    }

    public function produk($url='error'){
      include_class('produk');
      $prod = Produk::getProduk($url);
      $this->setSiteData($url);
      if(!empty($prod)){
        $this->setInfoProduk($prod[0]);
        $this->setCustomTitle(safe_echo_html("Jual ".$prod[0]->getNama()." Murah"));
      }else{
        $this->setCustomTitle('Produk tidak ditemukan');
        $this->addAlert(array('negative','Produk tidak ditemukan'));
      }
    }

    public static function getSlider(){
      $arr = array();
      $koneksi = new Koneksi();
      $query = $query = $koneksi->db()->query("SELECT * FROM toko_slider WHERE active = 1 ORDER BY id ASC");
      $arr = array();
      while($fetch = $query->fetch_assoc()){
        $slider = array(
          'id' => $fetch['id'],
          'title' => $fetch['title'],
          'description' => $fetch['description'],
          'link' => $fetch['link'],
          'gambar' => $fetch['gambar']
        );
        array_push($arr,$slider);
      }
      return $arr;
    }

  }
