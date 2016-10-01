<style>
  #imgPreview{
    height: auto !important;
  }
</style>
<form method='POST' class='ui form' enctype="multipart/form-data">
  <div class='ui grid'>
    <div class='six wide column'>
      <div class='field'>
        <img id='imgPreview' src='<?php echo base_url('assets/images/imgplaceholder_ls.png'); ?>'>

        <label for='inputFoto' class="ui button">Pilih Gambar</label>
        <input name='gambar_utama' accept='image/*' id='inputFoto' type='file' required style='display:none;'/>
      </div>
    </div>
    <div class='ten wide column'>
      <div class='field'>
        <label>Judul Slider</label>
        <input maxlength="50" name='title' placeholder='Judul slider'/>
      </div>
      <div class='field'>
        <label>Deskripsi Slider</label>
        <textarea rows='3' name='description' maxlength="300" placeholder='Deskripsi Slider'></textarea>
      </div>
      <div class='field'>
        <label>Aktif</label>
        <div class='inline'>
          <input type='radio' checked name='active' value='1' id='satu'> <label for='satu'>Ya</label>
          <input type='radio' name='active' value='2' id='dua'> <label for='dua'>Tidak</label>
        </div>
      </div>
      <div class='field'>
        <label>Link Slider</label>
        <input name='link' pattern="https?://.+" maxlength="100" placeholder='Link slider'/>
      </div>
      <div class='field'>
        <button type='submit' name='tambah' class='ui button primary'>Tambah</button>
      </div>
    </div>
  </div>
</form>
