<?php
  $url = $site->db()->real_escape_string($data);
  $arrProduk = Produk::getProduk($url,'','',1);
  if(!empty($arrProduk)){
    if(!empty($arrProduk[0]->getId())){
      $produk = $arrProduk[0];
?>
<form method='POST' id='unsave-form' enctype="multipart/form-data" class='ui form'>
  <div class='ui grid'>
    <div class='eleven wide column'>
      <div class='field'>
        <label>Nama Produk</label>
        <input name='nama_produk' value='<?php echo safe_echo_input($produk->getNama()); ?>' placeholder='Nama produk' required maxlength="100"/>
      </div>
      <div class='field'>
        <label>Deskripsi Produk</label>
        <textarea class='tinyMCE' name='deskripsi_produk'><?php echo safe_echo_input($produk->getDeskripsi()); ?></textarea>
        <?php includeTinyMCE(); ?>
      </div>
    </div>
    <div class='five wide column'>

      <div class='field'>
        <div class="ui special cards">
          <div class="ui fluid card">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                    <label for='inputFoto' class="ui inverted button">Pilih Gambar</label>
                    <input name='gambar_utama' accept='image/*' id='inputFoto' type='file' style='display:none;'/>
                  </div>
                </div>
              </div>
              <img id='imgPreview' src='<?php echo base_url('kebutuhan/gambar_utama_produk/'.$produk->getGambarUtama()); ?>'>
            </div>
            <div class="content">
              <a class="header"><small>Gambar Utama</small></a>
              <div class="meta">
                <span class="date"><small>[Max: <?php echo file_upload_max_size_mb()."MB"; ?>, Ext : PNG, JPG, JPEG]</small></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='field'>
        <label>Published</label>
        <select name='status' required>
          <option value='1'<?php if($produk->getStatus()==1){echo " selected";} ?>>Ya</option>
          <option value='2'<?php if($produk->getStatus()!=1){echo " selected";} ?>>Tidak</option>
        </select>
      </div>
      <div class='field'>
        <label>Harga Produk</label>
        <div class="ui labeled input">
          <div class="ui label">
            Rp
          </div>
          <input value='<?php echo safe_echo_input($produk->getHarga()); ?>' pattern='[0-9]+' placeholder='Harga Produk' required name='harga_produk'>
        </div>
      </div>
        <input list='brand' name='brand' type='hidden' placeholder='Nama Brand Produk' maxlength="50"/>
      <div class='field'>
        <label>Kategori Produk</label>
        <input value='<?php echo safe_echo_input($produk->getKategori()); ?>' list='kategori' name='kategori' placeholder='Nama Brand Produk' maxlength="50"/>
        <?php
          $koneksi = new Koneksi();
          $query = $koneksi->query("SELECT DISTINCT kategori FROM toko_produk");
          if($query->num_rows!=0){
            echo "<datalist id='kategori'>";
            while($fetch = $query->fetch_assoc()){
              echo "<option value='".safe_echo_input($fetch['kategori'])."'>";
            }
            echo "</datalist>";
          }
        ?>
      </div>
      <div class='field list-gambar'>
        <label>Gambar Lain</label>
        <?php
          $gambarTambahan = $produk->getGambarTambahan();
          foreach ($gambarTambahan as $gTambahan) {
            echo "<div class='hapus-gambar'>
            <input name='hapus_gambar[]' value='".$gTambahan['id'].":".$gTambahan['nama']."' type='checkbox' style='display:none;'/>";
            getImageResize(70,70,base_full('/kebutuhan/gambar_tambahan_produk/'),$gTambahan['nama'],$produk->getNama());
            echo "</div>";
          }
        ?>
        <div id='tambah-gambar'><i class='plus icon'></i></div>
      </div>
      <div class='field'>
        <button name='ubah' class='ui button primary' type='submit'>Update</button>
      </div>
    </div>
  </div>
</form>
<?php
    }else{
      $site->addAlert(array('negative','Tidak dapat menemukan produk yang diinginkan'));
    }
  }else{
    $site->addAlert(array('negative','Tidak dapat menemukan produk yang diinginkan'));
  }
?>
