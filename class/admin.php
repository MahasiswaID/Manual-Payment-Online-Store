<?php
  class Admin extends Site{

    public function __construct(){
      if($this->isLoggedIn()){
        $kunci = $this->db()->real_escape_string($_COOKIE[cookie_name]);
        $query = $this->db()->query("SELECT id FROM toko_admin WHERE kunci_login = '$kunci'");
        if($query->num_rows==0){
          setcookie(cookie_name,"",time()+86400,'/');
          die(header("Location:".base_url('login')));
        }
      }else{
        die(header("Location:".base_url('login')));
      }
    }

    public function isLoggedIn(){
      if(isset($_COOKIE[cookie_name])){
        return 1;
      }else{
        return 0;
      }
    }

    public function index(){
      $this->setCustomTitle("Dashboard");
    }

    public function tambahProduk(){
      $this->setCustomTitle("Tambah Produk");
      if(isset($_POST['tambah'])){
        if((!empty($_POST['nama_produk']))&&(!empty($_POST['status']))&&(!empty($_POST['harga_produk']))&&(!empty($_FILES['gambar_utama']['tmp_name']))){
          $nama_produk = $this->db()->real_escape_string(trim($_POST['nama_produk']));
          $status = (int)$_POST['status'];
          $harga_produk = (int)$_POST['harga_produk'];
          $brand = $kategori = $deskripsi = "";
          $penentu = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9));
          if(!empty($_POST['brand'])){
            $brand = $this->db()->real_escape_string($_POST['brand']);
          }
          if(!empty($_POST['kategori'])){
            $kategori = $this->db()->real_escape_string($_POST['kategori']);
          }
          if(!empty($_POST['deskripsi_produk'])){
            $deskripsi = $this->db()->real_escape_string($_POST['deskripsi_produk']);
          }
          $uploadOk = 1;

          if(empty($nama_produk)){
            $uploadOk = 0;
            $this->addAlert(array('negative','Nama produk tidak boleh kosong'));
          }

          $url = slug($nama_produk);
          $cekUrl = $this->db()->query("SELECT url FROM toko_produk WHERE url = '$url'");
          $no = 1;
          if($cekUrl->num_rows!=0){
            $url=slug($nama_produk)."-".$no;
            $cekLagi = $this->db()->query("SELECT url FROM toko_produk WHERE url = '$url'");
            while($cekLagi->num_rows!=0){
              $no++;
              $url=slug($nama_produk)."-".$no;
            }
          }

          $namaFile = "";

          //Gambar Tambahan
          $gambarTambahan = array();
          if(isset($_FILES['gambar'])){
            for($i=0;$i<count($_FILES['gambar']);$i++){
              if(!empty($_FILES['gambar']['name'][$i])){
                array_push($gambarTambahan,$i);
              }
            }
          }
          if(!empty($gambarTambahan)){
            foreach ($gambarTambahan as $nomor) {
              $uploadTambahan = 1;
              if(!empty($_FILES['gambar']['name'][$nomor])){
                $targetFolder = base_full('kebutuhan/gambar_tambahan_produk/');
                if(!file_exists($targetFolder)){
                  mkdir($targetFolder,0777);
                }
                $extensiFile = pathinfo(basename($_FILES['gambar']['name'][$nomor]),PATHINFO_EXTENSION);
                $namaFiles = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9)).'.'.$extensiFile;
                $targetFile = $targetFolder.$namaFiles;
                $check = getimagesize($_FILES['gambar']['tmp_name'][$nomor]);
                if($check==false){
                  $this->addAlert(array('negative','File ke-'.($nomor+1).' yang diupload bukan berbentuk gambar'));
                  $uploadTambahan = 0;
                }
                if($_FILES['gambar']['size'][$nomor]>2000000){
                  $this->addAlert(array('negative','Ukuran file ke-'.($nomor+1).' yang diupload terlalu besar'));
                  $uploadTambahan = 0;
                }
                if($extensiFile!='jpg' && $extensiFile!='JPG' && $extensiFile!='png' && $extensiFile!='PNG' && $extensiFile!='jpeg' && $extensiFile!='JPEG'){
                  $this->addAlert(array('negative','File gambar tambahan yang ke-'.($nomor+1).' diupload bukan berextensi jpg, jpeg atau png'));
                  $uploadTambahan = 0;
                }
                if($uploadTambahan==1){
                  if(move_uploaded_file($_FILES['gambar']['tmp_name'][$nomor],$targetFile)){
                    $this->db()->query("INSERT INTO toko_gambar (penentu_produk,nama_file) VALUES('$penentu','$namaFiles')");
                  }else{
                    $this->addAlert(array('negative','Maaf gambar tambahan ke-'.($nomor+1).' baru gagal diupload'));
                    $uploadTambahan = 0;
                  }
                }
              }
            }
          }

          //Gambar Utama Produk
          if(!empty($_FILES['gambar_utama']['name'])){
            $targetFolder = base_full('kebutuhan/gambar_utama_produk/');
            if(!file_exists($targetFolder)){
              mkdir($targetFolder,0777);
            }
            $extensiFile = pathinfo(basename($_FILES['gambar_utama']['name']),PATHINFO_EXTENSION);
            $namaFile = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9)).'.'.$extensiFile;
            $targetFile = $targetFolder.$namaFile;
            $check = getimagesize($_FILES['gambar_utama']['tmp_name']);
            if($check==false){
              $this->addAlert(array('negative','File yang diupload bukan berbentuk gambar'));
              $uploadOk = 0;
            }
            if($_FILES['gambar_utama']['size']>2000000){
              $this->addAlert(array('negative','Ukuran file yang diupload terlalu besar'));
              $uploadOk = 0;
            }
            if($extensiFile!='jpg' && $extensiFile!='JPG' && $extensiFile!='png' && $extensiFile!='PNG' && $extensiFile!='jpeg' && $extensiFile!='JPEG'){
              $this->addAlert(array('negative','FIle gambar utama yang diupload bukan berextensi jpg, jpeg atau png'));
              $uploadOk = 0;
            }

            if($uploadOk==1){
              if(move_uploaded_file($_FILES['gambar_utama']['tmp_name'],$targetFile)){
                $kue = "INSERT INTO toko_produk (nama,gambar_utama,deskripsi,kategori,brand,harga,penentu,status,url) VALUES('$nama_produk','$namaFile','$deskripsi','$kategori','$brand',$harga_produk,'$penentu',$status,'$url')";
                $berhasil = $this->db()->query($kue);
                if($berhasil){
                  die(header("Location:".base_url('admin/produk')));
                }else{
                  $this->addAlert(array('negative','Gagal menambah produk'));
                }
              }else{
                $this->addAlert(array('negative','Maaf gambar utama baru gagal diupload'));
                $uploadOk = 0;
              }
            }
          }else{
            $uploadOk = 0;
          }

        }else{
          $this->addAlert(array('danger','Nama Produk, Status Published, Harga Produk, dan Gambar Utama harus terisi'));
        }
      }
    }

    public function produk(){
      $this->setCustomTitle("Manage Produk");
      include_class('produk');
    }

    public function editProduk($url){
      //$this->setCustomTitle("Edit Produk");
      //echo $url;
      include_class('produk');
      if(!empty($url)){
        $url = $this->db()->real_escape_string($url);
        $this->setSiteData($url);
        $arrProduk = Produk::getProduk($url);
        if(!empty($arrProduk)){
          $this->setCustomTitle("Edit Produk ".$arrProduk[0]->getNama());
          if(isset($_POST['ubah'])){
            if((!empty($_POST['nama_produk']))&&(!empty($_POST['status']))&&(!empty($_POST['harga_produk']))){
              $nama_produk = $this->db()->real_escape_string(trim($_POST['nama_produk']));
              $status = (int)$_POST['status'];
              $harga_produk = (int)$_POST['harga_produk'];
              $brand = $kategori = $deskripsi = "";
              //$penentu = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9));
              $penentu = $arrProduk[0]->getPenentu();
              if(!empty($_POST['brand'])){
                $brand = $this->db()->real_escape_string($_POST['brand']);
              }
              if(!empty($_POST['kategori'])){
                $kategori = $this->db()->real_escape_string($_POST['kategori']);
              }
              if(!empty($_POST['deskripsi_produk'])){
                $deskripsi = $this->db()->real_escape_string($_POST['deskripsi_produk']);
              }
              $uploadOk = 1;

              if(empty($nama_produk)){
                $uploadOk = 0;
                $this->addAlert(array('negative','Nama produk tidak boleh kosong'));
              }

              if(isset($_POST['hapus_gambar'])){
                foreach ($_POST['hapus_gambar'] as $noms) {
                  $gmb = explode(':',$noms);
                  $hps = $this->db()->query("DELETE FROM toko_gambar WHERE id = '".$gmb[0]."'");
                  unlink(base_full('kebutuhan/gambar_tambahan_produk/'.$gmb[1]));
                }
              }

              $namaFile = "";

              //Gambar Tambahan
              $gambarTambahan = array();
              if(isset($_FILES['gambar'])){
                for($i=0;$i<count($_FILES['gambar']);$i++){
                  if(!empty($_FILES['gambar']['name'][$i])){
                    array_push($gambarTambahan,$i);
                  }
                }
              }
              if(!empty($gambarTambahan)){
                foreach ($gambarTambahan as $nomor) {
                  $uploadTambahan = 1;
                  if(!empty($_FILES['gambar']['name'][$nomor])){
                    $targetFolder = base_full('kebutuhan/gambar_tambahan_produk/');
                    if(!file_exists($targetFolder)){
                      mkdir($targetFolder,0777);
                    }
                    $extensiFile = pathinfo(basename($_FILES['gambar']['name'][$nomor]),PATHINFO_EXTENSION);
                    $namaFiles = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9)).'.'.$extensiFile;
                    $targetFile = $targetFolder.$namaFiles;
                    $check = getimagesize($_FILES['gambar']['tmp_name'][$nomor]);
                    if($check==false){
                      $this->addAlert(array('negative','File ke-'.($nomor+1).' yang diupload bukan berbentuk gambar'));
                      $uploadTambahan = 0;
                    }
                    if($_FILES['gambar']['size'][$nomor]>2000000){
                      $this->addAlert(array('negative','Ukuran file ke-'.($nomor+1).' yang diupload terlalu besar'));
                      $uploadTambahan = 0;
                    }
                    if($extensiFile!='jpg' && $extensiFile!='JPG' && $extensiFile!='png' && $extensiFile!='PNG' && $extensiFile!='jpeg' && $extensiFile!='JPEG'){
                      $this->addAlert(array('negative','File gambar tambahan yang ke-'.($nomor+1).' diupload bukan berextensi jpg, jpeg atau png'));
                      $uploadTambahan = 0;
                    }
                    if($uploadTambahan==1){
                      if(move_uploaded_file($_FILES['gambar']['tmp_name'][$nomor],$targetFile)){
                        $this->db()->query("INSERT INTO toko_gambar (penentu_produk,nama_file) VALUES('$penentu','$namaFiles')");
                      }else{
                        $this->addAlert(array('negative','Maaf gambar tambahan ke-'.($nomor+1).' baru gagal diupload'));
                        $uploadTambahan = 0;
                      }
                    }
                  }
                }
              }

              //Gambar Utama Produk
              if(!empty($_FILES['gambar_utama']['name'])){
                $targetFolder = base_full('kebutuhan/gambar_utama_produk/');
                if(!file_exists($targetFolder)){
                  mkdir($targetFolder,0777);
                }
                $extensiFile = pathinfo(basename($_FILES['gambar_utama']['name']),PATHINFO_EXTENSION);
                $namaFile = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9)).'.'.$extensiFile;
                $targetFile = $targetFolder.$namaFile;
                $check = getimagesize($_FILES['gambar_utama']['tmp_name']);
                if($check==false){
                  $this->addAlert(array('negative','File yang diupload bukan berbentuk gambar'));
                  $uploadOk = 0;
                }
                if($_FILES['gambar_utama']['size']>2000000){
                  $this->addAlert(array('negative','Ukuran file yang diupload terlalu besar'));
                  $uploadOk = 0;
                }
                if($extensiFile!='jpg' && $extensiFile!='JPG' && $extensiFile!='png' && $extensiFile!='PNG' && $extensiFile!='jpeg' && $extensiFile!='JPEG'){
                  $this->addAlert(array('negative','FIle gambar utama yang diupload bukan berextensi jpg, jpeg atau png'));
                  $uploadOk = 0;
                }

                if($uploadOk==1){
                  if(move_uploaded_file($_FILES['gambar_utama']['tmp_name'],$targetFile)){
                    //$kue = "INSERT INTO toko_produk (nama,gambar_utama,deskripsi,kategori,brand,harga,penentu,status,url) VALUES('$nama_produk','$namaFile','$deskripsi','$kategori','$brand',$harga_produk,'$penentu',$status,'$url')";
                    $kue = "UPDATE toko_produk SET gambar_utama = '$namaFile' WHERE penentu = '$penentu'";
                    $berhasil = $this->db()->query($kue);
                    if($berhasil){

                    }else{
                      $this->addAlert(array('negative','Gagal menambah produk'));
                    }
                  }else{
                    $this->addAlert(array('negative','Maaf gambar utama baru gagal diupload'));
                    $uploadOk = 0;
                  }
                }
              }

              $qurs = $this->db()->query("UPDATE toko_produk SET nama = '$nama_produk', deskripsi = '$deskripsi', kategori = '$kategori', harga = '$harga_produk', status = '$status' WHERE penentu = '$penentu'");
              if($qurs){
                $this->addAlert(array('positive','Berhasil menyimpan produk'));
              }else{
                $this->addAlert(array('negative','Gagal menyimpan produk'));
              }

            }else{
              $this->addAlert(array('danger','Nama Produk, Status Published, Harga Produk, dan Gambar Utama harus terisi'));
            }
          }
        }else{
          $this->addAlert(array('negative','Produk tidak ditemukan'));
          $this->setCustomTitle("Produk tidak ditemukan");
        }
      }else{
        $this->setCustomTitle("Produk tidak ditemukan");
      }
    }

    public function pengaturansitus(){
      $this->setCustomTitle("Pengaturan Situs");
      if(isset($_POST['simpan'])){
        if(!empty($_POST['nama']) && !empty($_POST['total'])){
          $tagline = $deskripsi = $keywords = "";
          $nama = $this->db()->real_escape_string($_POST['nama']);
          $total = (int)$_POST['total'];

          $logo = $this->getLogo();

          if($total < 1){
            $total = 1;
          }


          if(!empty($_POST['tagline'])){
            $tagline = $this->db()->real_escape_string($_POST['tagline']);
          }

          if(!empty($_POST['deskripsi'])){
            $deskripsi = $this->db()->real_escape_string($_POST['deskripsi']);
          }

          if(!empty($_POST['keywords'])){
            $keywords = $this->db()->real_escape_string($_POST['keywords']);
          }

          $uploadOk = 1;
          if(!empty($_FILES['gambar_utama']['name'])){
            $targetFolder = base_full('kebutuhan/gambar_utama_produk/');
            if(!file_exists($targetFolder)){
              mkdir($targetFolder,0777);
            }
            $extensiFile = pathinfo(basename($_FILES['gambar_utama']['name']),PATHINFO_EXTENSION);
            $namaFile = sha1(rand(1,9).rand(1,9).rand(1,9).date("Y-m-d h:i:s").rand(1,9).rand(1,9).rand(1,9)).'.'.$extensiFile;
            $targetFile = $targetFolder.$namaFile;
            $check = getimagesize($_FILES['gambar_utama']['tmp_name']);
            if($check==false){
              $this->addAlert(array('negative','File yang diupload bukan berbentuk gambar'));
              $uploadOk = 0;
            }
            if($_FILES['gambar_utama']['size']>2000000){
              $this->addAlert(array('negative','Ukuran file yang diupload terlalu besar'));
              $uploadOk = 0;
            }
            if($extensiFile!='jpg' && $extensiFile!='JPG' && $extensiFile!='png' && $extensiFile!='PNG' && $extensiFile!='jpeg' && $extensiFile!='JPEG'){
              $this->addAlert(array('negative','FIle logo yang diupload bukan berextensi jpg, jpeg atau png'));
              $uploadOk = 0;
            }

            if($uploadOk==1){
              if(move_uploaded_file($_FILES['gambar_utama']['tmp_name'],$targetFile)){
                $logo = $namaFile;
              }else{
                $this->addAlert(array('negative','Maaf logo baru gagal diupload'));
                $uploadOk = 0;
              }
            }
          }

          $qurs = $this->db()->query("INSERT INTO toko_setting (title,description,keywords,tagline,total,logo) VALUES('$nama','$deskripsi','$keywords','$tagline','$total','$logo')");
          if($qurs){
            $this->setTitle($nama);
            $this->setDescription($deskripsi);
            $this->setKeywords($keywords);
            $this->setTagline($tagline);
            $this->setTotal($total);
            $this->setLogo($logo);
            $this->addAlert(array('positive','Berhasil menyimpan pengaturan'));
          }else{
            $this->addAlert(array('negative','Gagal menyimpan pengaturan'));
          }

        }
      }
      $this->setSiteData($this);
    }

    public function deleteProduk($url='error'){
      $url = $this->db()->real_escape_string($url);
      $query = $this->db()->query("DELETE FROM toko_produk WHERE url = '$url'");
      header("Location:".base_url('admin/produk'));
    }

  }
