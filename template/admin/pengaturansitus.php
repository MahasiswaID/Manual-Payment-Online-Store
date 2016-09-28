<h2 class='header'>Pengaturan Situs</h2>
<form class='ui form' method='POST' enctype="multipart/form-data">

  <div class='ui grid'>
    <div class='four wide column'>
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
              <?php
                if(!empty($site->getLogo())){
                  ?>
                    <img id='imgPreview' src='<?php echo base_url('kebutuhan/gambar_utama_produk/'.$site->getLogo()); ?>'>
                  <?php
                }else{
                  ?>
                    <img id='imgPreview' src='<?php echo base_url('assets/images/imgplaceholder.png'); ?>'>
                  <?php
                }
              ?>
            </div>
            <div class="content">
              <a class="header"><small>Logo</small></a>
              <div class="meta">
                <span class="date"><small>[Max: <?php echo file_upload_max_size_mb()."MB"; ?>, Ext : PNG, JPG, JPEG]</small></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class='twelve wide column'>
      <div class='two fields'>
        <div class='field'>
          <label>Nama Situs</label>
          <input name='nama' required maxlength="50" value='<?php echo safe_echo_input($site->getTitle()); ?>' placeholder='Nama situs'/>
        </div>
        <div class='field'>
          <label>Tagline Situs</label>
          <input name='tagline' maxlength="50" value='<?php echo safe_echo_input($site->getTagline()); ?>' placeholder="Tagline situs"/>
        </div>
      </div>
      <div class='field'>
        <label>Deskripsi Situs</label>
        <textarea rows='3' name='deskripsi'><?php echo safe_echo_input($site->getDescription()); ?></textarea>
      </div>
      <div class='two fields'>
        <div class='field'>
          <label>Kata Kunci</label>
          <input name='keywords' value='<?php echo safe_echo_input($site->getKeywords()); ?>' placeholder='Kata kunci situs' maxlength="100"/>
        </div>
        <div class='field'>
          <label>Tampilan Produk</label>
          <input type='number' min='1' max='50' name='total' value='<?php echo safe_echo_input($site->getTotalPost()); ?>'>
        </div>
      </div>
      <div class='field'>
        <button name='simpan' type='submit' class='ui button primary'>Simpan</button>
      </div>
    </div>
  </div>
</form>
