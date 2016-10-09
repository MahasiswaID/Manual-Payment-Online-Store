<?php
  class Home extends Site{

    public function index(){
      include_class('produk');
      $this->showSlider = 1;
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

  }
