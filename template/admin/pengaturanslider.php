<div>
  <a href='<?php echo base_url('admin/tambahSlider'); ?>' class='ui button primary'>Tambah Slider</a>
</div>
<?php
  if(!empty($data)){
    ?>
    <table class='ui table'>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Link</th>
          <th>Aktif</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data as $slider) {
          if($slider['active']==1){
            $keaktifan = "Ya";
          }else{
            $keaktifan = "Tidak";
          }
          echo "<tr>
            <td>".$no."</td>
            <td>".returnImageResize(150,100,'kebutuhan/gambar_slide/',$slider['gambar'])."</td>
            <td>".safe_echo_html($slider['title'])."</td>
            <td>".safe_echo_html($slider['link'])."</td>
            <td>".$keaktifan."</td>
            <td><a href=''></a> <a href='".base_url('admin/hapusSlider/'.$slider['id'])."' onclick='return confirm(\"Hapus Slider ini?\")'><i class='trash icon'></i></a></td>
          </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>

    <?php
  }else{
    echo informasi('blue','Belum ada slider yang dibuat');
  }
?>
