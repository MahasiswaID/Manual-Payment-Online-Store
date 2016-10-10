<div class='ui grid'>
  <div class='five wide column'>
    <?php
      foreach ($data as $widget) {
        if(empty($widget['title'])){
          $judul = "Widget";
        }else{
          $judul = $widget['title'];
        }
        echo "<div class='kotak-widget'>
          <div class='title'>".$widget['position'].". ".safe_echo_html($judul)."</div>
          <div class='edit-button'>
            <div class='left'>
              <a href=\"#!\"><i class='edit icon'></i></a>
              <a onclick='return confirm(\"Hapus widget ini?\")' href='".base_url('admin/deleteWidget/'.$widget['id'])."'><i class='trash icon'></i></a>
            </div>
            <div class='right'>

            </div>
          </div>
          <div class='edit-section' style='display:none;'>
            <form method='POST' class='ui form'>
              <div class='field'>
                <label>Title</label>
                <input name='title' value='".safe_echo_input($widget['title'])."' maxlength=\"20\" placeholder='Title'/>
              </div>
              <input type='hidden' name='id' value='".$widget['id']."'/>
              <div class='field'>
                <label>Content</label>
                <textarea name='content' placeholder='Content' required>".safe_echo_input($widget['content'])."</textarea>
              </div>
              <div class='field'>
                <button type='submit' name='ubah' class='ui button primary'>Ubah</button>
              </div>
            </form>
          </div>
        </div>";
      }
    ?>
  </div>
  <div class='eleven wide column'>
    <form method='POST' class='ui form'>
      <div class='field'>
        <label>Title</label>
        <input name='title' maxlength="20" placeholder='Title'/>
      </div>
      <div class='field'>
        <label>Content</label>
        <textarea name='content' placeholder='Content' required></textarea>
      </div>
      <div class='field'>
        <button type='submit' name='tambah' class='ui button primary'>Tambah</button>
      </div>
    </form>
  </div>
</div>
