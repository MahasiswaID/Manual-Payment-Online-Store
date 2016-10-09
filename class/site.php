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
  public $sidebar = array();
  public $showSlider = 0;

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

    $kontak = $this->db()->query("SELECT * FROM toko_kontak");
    if($kontak->num_rows!=0){
      $isi = "";
      while($fetchKontak = $kontak->fetch_assoc()){
        $isi .= "<label>".safe_echo_html($fetchKontak['nama'])."</label><p>".safe_echo_html($fetchKontak['isi'])."</p>";
      }
      $this->addSidebar(array('Kontak',$isi));
    }

    $queryWidget = $this->db()->query("SELECT * FROM toko_widget ORDER BY position ASC");
    while($fetchWidget = $queryWidget->fetch_assoc()){
      $this->addSidebar(array($fetchWidget['title'],$fetchWidget['content']));
    }
  }

  public function getTotalPost(){
    return $this->totalPost;
  }

  public function getShowSlider(){
    return $this->showSlider;
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

  public function getLogo(){
    return $this->logo;
  }

  public function createWidget($title='',$content=''){
    $isi = "<div class='widg'>";
    if(!empty($title)){
      $isi .= "<h2>".safe_echo_html($title)."</h2>";
    }
    $isi .= "<div class='konten'>".$content."</div>";
    $isi .= "</div>";
    return $isi;
  }

  public function getSidebar(){
    $wid = "";
    if(!empty($this->sidebar)){
      foreach ($this->sidebar as $sidebar) {
        $wid .= $this->createWidget($sidebar[0],$sidebar[1]);
      }
    }
    return $wid;
  }

  public function setLogo($logo){
    $this->logo = $logo;
  }

  public function setTotal($total){
    $this->totalPost = $total;
  }

  public function setTagline($tl){
    $this->tagline = $tl;
  }

  public function setKeywords($key){
    $this->keywords = $key;
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

  public function addSidebar($widget){
    array_push($this->sidebar,$widget);
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

  public static function getKategoriBrand(){
    $kategori = array();
    $brand = array();
    $koneksi = new Koneksi();
    $qkat = $koneksi->db()->query("SELECT DISTINCT brand,kategori FROM toko_produk");
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
    $koneksi = new Koneksi();
    $query = $koneksi->db()->query("SELECT * FROM toko_kontak");
    while($fetch = $query->fetch_assoc()){
      array_push($hasil,array('nama'=>$fetch['nama'],'val'=>$fetch['isi']));
    }
    return $hasil;
  }

  public function getProductFilter(){
    $arr = array('max'=>0,'min'=>0,'kategori'=>array());
    $ambilMaxMin = $this->db()->query("SELECT max(harga) AS HargaMax, min(harga) AS HargaMin FROM toko_produk WHERE status = 1");
    $ambilKategori = $this->db()->query("SELECT DISTINCT kategori FROM toko_produk WHERE status = 1");

    if($ambilMaxMin->num_rows!=0){
      $fetchAmbilMaxMin = $ambilMaxMin->fetch_assoc();
      $arr['max'] = $fetchAmbilMaxMin['HargaMax'];
      $arr['min'] = $fetchAmbilMaxMin['HargaMin'];
    }
    if($ambilKategori->num_rows!=0){
      while($fetchKategori = $ambilKategori->fetch_assoc()){
        array_push($arr['kategori'],$fetchKategori['kategori']);
      }
    }
    return $arr;
  }

  public static function getSlider(){
    $arr = array();
    $koneksi = new Koneksi();
    $query = $koneksi->db()->query("SELECT * FROM toko_slider WHERE active = 1 ORDER BY id ASC");
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

  public static function getPageList(){
    $arr = array();
    $koneksi = new Koneksi();
    $query = $koneksi->db()->query("SELECT * FROM toko_halaman WHERE status = 1 ORDER BY judul ASC");
    while($fetch = $query->fetch_array()){
      array_push($arr, $fetch);
    }
    return $arr;
  }

  public static function getBlogList(){
    $arr = array();
    $koneksi = new Koneksi();
    $query = $koneksi->db()->query("SELECT * FROM toko_blog WHERE status = 1 ORDER BY id DESC LIMIT 5");
    while($fetch = $query->fetch_array()){
      array_push($arr, $fetch);
    }
    return $arr;
  }

}
