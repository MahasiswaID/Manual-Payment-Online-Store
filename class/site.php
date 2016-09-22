<?php
/************************************************
 Kelas Site
 Akan mendekripsikan pengaturan situs yang ada
*************************************************/
class Site{
  protected $title = "Nayys Clothing";
  protected $description;
  protected $tagline = "Beauty in Simplicity";
  protected $keywords;
  protected $customTitle;
  public $alert = array();
  protected $infoProduk = array();

  public function getTitle(){
    return $this->title;
  }

  public function getTagline(){
    return $this->tagline;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getKeywords(){
    return $this->keywords;
  }

  public function getInfoProduk(){
    return $this->infoProduk;
  }

  public function getCustomTitle(){
    return $this->customTitle;
  }

  public function getAlert(){
    $hasil = "";
    foreach($this->alert as $all){
      $hasil .= informasi($all[0],$all[1]);
    }
    return $hasil;
  }

  public function setInfoProduk($prod){
    $this->infoProduk = $prod;
  }

  public function setTitle($string){

  }

  public function setCustomTitle($string){
    $this->customTitle = $string;
  }

  public function setDescription($string){
    $this->description = $string;
  }

  public function addAlert($alet){
    array_push($this->alert,$alet);
  }

  public function db(){
    $koneksi = new Koneksi();
    return $koneksi->db();
  }
}
