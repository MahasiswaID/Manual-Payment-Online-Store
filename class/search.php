<?php
  class Search extends Site{

    public function index($q='',$kategori='',$p=1){
      $this->showSlider = 1;
      $this->setCustomTitle("Pencarian");
      $tambahan1 = $tambahan2 = $and = "";

      $p = (int)$p;

      if($p<1){
        $p = 1;
      }

      $arr = array('listproduk'=>array(),'banyakproduk'=>0,'q'=>$q,'kategori'=>$kategori,'p'=>$p);

      $awalPost = ($p-1)*$this->getTotalPost();

      //if(!empty($_POST['q'])){
        $q = $this->db()->real_escape_string($q);
      //}

      if($q=='-'){
        $q='';
      }

      if($kategori=='-'){
        $kategori = '';
      }

      $tambahan1 = " nama LIKE '%".$q."%'";

      if(!empty($kategori)){
        $kategori = $this->db()->real_escape_string($kategori);
        $tambahan2 = " kategori = '$kategori'";
      }

      if(!empty($tambahan1) || !empty($tambahan2)){
        if(!empty($tambahan1) && !empty($tambahan2)){
          $and = " AND";
        }
        $qurs = "SELECT * FROM toko_produk WHERE status = 1 AND ".$tambahan1.$and.$tambahan2;
        $banyakProduk = $this->db()->query($qurs);
        $fetchBanyakProduk = $banyakProduk->num_rows;

        $arr['banyakproduk'] = $fetchBanyakProduk;

        $qurs .= " ORDER BY id DESC LIMIT ".$this->getTotalPost()." OFFSET ".$awalPost;
        //echo $qurs;
        $query = $this->db()->query($qurs);
        if($query->num_rows!=0){
          include_once('class/produk.php');
          while($fetch = $query->fetch_assoc()){
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
            //if($gambarTambahan==1){
              $gtmbh = $this->db()->query("SELECT nama_file,id FROM toko_gambar WHERE penentu_produk = '".$this->db()->real_escape_string($fetch['penentu'])."'");
              while($ftmbh = $gtmbh->fetch_assoc()){
                array_push($produk->gambar_tambahan,array('nama'=>$ftmbh['nama_file'],'id'=>$ftmbh['id']));
              }
            //}
            array_push($arr['listproduk'],$produk);
          }
          $this->setSiteData($arr);
        }else{
          $this->addAlert(array('negative','Produk tidak ditemukan'));
        }
      }else{
        die(header("Location:".base_url()));
      }


    }
  }
