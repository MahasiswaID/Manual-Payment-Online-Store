<h3>Tambah Artikel</h3>
<form method='POST' class='ui form'>
  <div class='ui grid'>
    <div class='twelve wide column'>
      <div class='field'>
        <label>Judul Artikel</label>
        <input name='judul' required maxlength='50' placeholder='Judul Artikel'/>
      </div>
      <div class='field'>
        <label>Konten Artikel</label>
        <textarea name='deskripsi' class='tinyMCE'></textarea>
        <?php includeTinyMCE(); ?>
      </div>
    </div>
    <div class='four wide column'>
      <div class='field'>
        <label>Published</label>
        <select name='status'>
          <option value='1'>Yes</option>
          <option value='2'>No</option>
        </select>
      </div>
      <button type='submit' name='submit' class='ui primary button'>Simpan</button>
    </div>
  </div>
</form>
