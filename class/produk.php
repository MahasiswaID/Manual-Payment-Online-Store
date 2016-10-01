<?php
  class Produk extends Site{
    /*
    private $id;
    private $nama;
    private $gambar_utama;
    private $deskripsi;
    private $kategori;
    private $brand;
    private $harga;
    private $penentu;
    private $status;
    private $url;
    private $gambar_tambahan;
    */
    public $id;
    public $nama;
    public $gambar_utama;
    public $deskripsi;
    public $kategori;
    public $brand;
    public $harga;
    public $penentu;
    public $status;
    public $url;
    public $gambar_tambahan;

    public function getId(){
      return (int)$this->id;
    }

    public function getNama(){
      return $this->nama;
    }

    public function getGambarUtama(){
      return $this->gambar_utama;
    }

    public function getDeskripsi(){
      return $this->deskripsi;
    }

    public function getKategori(){
      return $this->kategori;
    }

    public function getBrand(){
      return $this->brand;
    }

    public function getHarga(){
      return (int)$this->harga;
    }

    public function getPenentu(){
      return $this->penentu;
    }

    public function getStatus(){
      return (int)$this->status;
    }

    public function getUrl(){
      return $this->url;
    }

    public function getGambarTambahan(){
      return $this->gambar_tambahan;
    }

    public static function getProduk($url='',$limits='',$start='',$gambarTambahan = 0,$status=''){
      $arr = array();
      $koneksi = new Koneksi();
      if(!empty($limits)){
          $limits = 'LIMIT '.$limits;
          if(!empty($start)){
            $limits .= ' OFFSET '.$start;
          }
      }
      $tambahan = "";
      if(!empty($url)){
        $url = $koneksi->db()->real_escape_string($url);
        if($status==1){
          $tambahan = ' AND status = 1';
        }
        $query = "SELECT * FROM toko_produk WHERE url = '$url'".$tambahan;
      }else{
        if($status==1){
          $tambahan = 'WHERE status = 1';
        }
        $query = "SELECT * FROM toko_produk ".$tambahan." ORDER BY id DESC ".$limits;
      }
      $q = $koneksi->db()->query($query);
      if($q->num_rows!=0){
        while($fetch = $q->fetch_assoc()){
          $produk = new Produk();
          $produk->id = $fetch['id'];
          $produk->nama = $fetch['nama'];
          $produk->gambar_utama = $fetch['gambar_utama'];
          $produk->deskripsi = $fetch['deskripsi'];
          $produk->kategori = $fetch['kategori'];
          $produk->brand = $fetch['brand'];
          $produk->harga = $fetch['harga'];
          $produk->penentu = $fetch['penentu'];
          $produk->status = $fetch['status'];
          $produk->url = $fetch['url'];
          $produk->gambar_tambahan = array();
          if($gambarTambahan==1){
            $gtmbh = $koneksi->db()->query("SELECT nama_file,id FROM toko_gambar WHERE penentu_produk = '".$koneksi->db()->real_escape_string($fetch['penentu'])."'");
            while($ftmbh = $gtmbh->fetch_assoc()){
              array_push($produk->gambar_tambahan,array('nama'=>$ftmbh['nama_file'],'id'=>$ftmbh['id']));
            }
          }
          array_push($arr,$produk);
        }
      }
      return $arr;
    }
  }
