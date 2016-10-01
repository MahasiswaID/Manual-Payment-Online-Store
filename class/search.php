<?php
  class Search extends Site{

    public function index(){
      $this->setCustomTitle("Pencarian");
      $tambahan1 = $tambahan2 = "";
      if(!empty($_POST['q'])){
        $q = $this->db()->real_escape_string($_POST['q']);
        $tambahan1 = "LIKE '%".$q."%'";
        //$query = $this->db()->query("SELECT * FROM toko_produk WHERE nama LIKE '%".$q."%'");
      }
      if(!empty($_POST['kategori'])){
        $kategori = $this->db()->real_escape_string($_POST['kategori']);
        $tambahan2 = "kategori = '$kategori'";
        //$query = $this->db()->query("SELECT * FROM toko_produk WHERE kategori = '$kategori'");
      }

      if(!empty($tambahan1) || !empty($tambahan2)){
        if(!empty($tambahan1) && !empty($tambahan2)){
          $qurs = "SELECT * FROM toko_produk WHERE ".$tambahan1." AND ".$tambahan2;
        }else{
          if(!empty($tambahan1)){
            $qurs = "SELECT * FROM toko_produk WHERE ".$tambahan1;
          }else if(!empty($tambahan2)){
            $qurs = "SELECT * FROM toko_produk WHERE ".$tambahan2;
          }
        }

        $qurs .= " ORDER BY id DESC LIMIT ".$this->getTotalPost();
        //echo $qurs;
        $query = $this->db()->query($qurs);
        if($query->num_rows!=0){
          include_once('class/produk.php');
          $arr = array();
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
            array_push($arr,$produk);
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
