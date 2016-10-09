<?php if(!empty($data)){ ?>
<h3 class='header'>Edit Halaman</h3>
<form method='POST' class='ui form'>
  <div class='ui grid'>
    <div class='twelve wide column'>
      <div class='field'>
        <label>Judul Halaman</label>
        <input name='judul' value='<?php echo safe_echo_input($data['judul']); ?>' required maxlength='50' placeholder='Judul halaman'/>
      </div>
      <div class='field'>
        <label>Konten Halaman</label>
        <textarea name='deskripsi' class='tinyMCE'><?php echo safe_echo_input($data['deskripsi']); ?></textarea>
        <?php includeTinyMCE(); ?>
      </div>
    </div>
    <div class='four wide column'>
      <div class='field'>
        <label>Published</label>
        <select name='status'>
          <option value='1'<?php if($data['status']==1){echo " selected";} ?>>Yes</option>
          <option value='2'<?php if($data['status']!=1){echo " selected";} ?>>No</option>
        </select>
      </div>
      <button type='submit' name='submit' class='ui primary button'>Simpan</button>
    </div>
  </div>
</form>
<?php } ?>
