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

    public function page($url = 'error')
    {
      $url = $this->db()->real_escape_string($url);
      $query = $this->db()->query("SELECT * FROM toko_halaman WHERE slug = '$url' AND status = 1");
      if($query->num_rows != 0){
        $arr = array();
        $arr = $query->fetch_array();
        $this->setSiteData($arr);
        $this->setCustomTitle(safe_echo_html($arr['judul']));
      }else{
        $this->addAlert(array('negative','Halaman tidak ditemukan'));
        $this->setCustomTitle('Halaman tidak ditemukan');
      }
    }

    public function blog($url = 'error')
    {
      $url = $this->db()->real_escape_string($url);
      $query = $this->db()->query("SELECT * FROM toko_blog WHERE slug = '$url' AND status = 1");
      if($query->num_rows != 0){
        $arr = array();
        $arr = $query->fetch_array();
        $this->setSiteData($arr);
        $this->setCustomTitle(safe_echo_html($arr['title']));
        //Tambah Hits
        $this->db()->query("UPDATE toko_blog SET hits = '".($arr['hits']+1)."' WHERE slug = '$url'");
      }else{
        $this->addAlert(array('negative','Artikel tidak ditemukan'));
        $this->setCustomTitle('Artikel tidak ditemukan');
      }
    }

  }
