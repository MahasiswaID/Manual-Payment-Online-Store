<?php
/************************************************
 Kelas Site
 Akan mendekripsikan pengaturan situs yang ada
*************************************************/
class Site{
  protected $title;
  protected $description;
  protected $tagline;
  protected $keywords;
  protected $customTitle;
  protected $siteData;
  public $alert = array();
  protected $infoProduk = array();
  protected $totalPost;
  protected $logo;

  public function infoSitus(){
    $query = $this->db()->query("SELECT * FROM toko_setting ORDER BY id DESC");
    if($query->num_rows!=0){
      $fetch = $query->fetch_assoc();
      $this->description = $fetch['description'];
      $this->title = $fetch['title'];
      $this->tagline = $fetch['tagline'];
      $this->keywords = $fetch['keywords'];
      $this->totalPost = $fetch['total'];
      $this->logo = $fetch['logo'];
    }else{
      $tambah = $this->db()->query("INSERT INTO toko_setting VALUES(null,'Judul Toko','Deskripsi Toko','keywords1, keywords2, keywords3','Tagline Situs','12')");
      $this->title = "Judul Toko";
      $this->tagline = "Tagline Toko";
    }
  }

  public function getTotalPost(){
    return $this->totalPost;
  }

  public function getSiteData(){
    return $this->siteData;
  }

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
    $this->title = $string;
  }

  public function setSiteData($data){
    $this->siteData = $data;
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
