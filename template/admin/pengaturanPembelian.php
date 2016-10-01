<?php
  echo "
  <form method='POST' class='ui form'>
  <table class='ui table'>
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Value</th>
        <th>Hapus</th>
      </tr>
    </thead>
  <tbody>";
  if(!empty($data)){
      $no = 1;
      foreach ($data as $info) {
        echo "<tr>
          <td>".$no."</td>
          <td>".safe_echo_html($info['nama'])."</td>
          <td>".safe_echo_html($info['isi'])."</td>
          <td><a href='".base_url('admin/hapusPembelian/'.$info['id'])."' onclick='return confirm(\"Hapus Info Kontak berikut?\")'><i class='fa fa-trash'></i></a></td>
        </tr>";
        $no++;
      }
  }
  echo "<tr>
    <td></td>
    <td><div class='field'><input placeholder='Ex: Alamat, Nomor Telepon, dll' name='nama' maxlength='30' required/></div></td>
    <td><div class='field'><input name='isi' placeholder='Value' maxlength='50' required/></div></td>
    <td><button type='submit' class='ui button primary' name='tambah'>Tambah</button></td>
  </tr>";
  echo "</tbody></table></form>";
  if(empty($data)){
    echo informasi("blue","Belum ada informasi pembelian");
  }
?>
