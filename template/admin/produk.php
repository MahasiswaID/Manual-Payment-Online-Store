<?php
  $produk = Produk::getProduk();
?>
  <h3 class='header'>Manage Produk</h3>
  <a href='<?php echo base_url('admin/tambahProduk'); ?>' class='ui button primary'>Tambah Produk</a>
<?php
  if(!empty($produk)){
?>
    <table class='ui table' id='myTable'>
      <thead>
        <tr>
          <th width='10'>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Kategori</th>
          <th>Published</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          foreach ($produk as $prod) {
            echo "<tr>
              <td>".$no."</td>
              <td>".safe_echo_html($prod->getNama())."</td>
              <td>".toRupiah($prod->getHarga())."</td>
              <!--<td>".safe_echo_html($prod->getBrand())."</td>-->
              <td>".safe_echo_html($prod->getKategori())."</td>
              <td>".tombol_published($prod->getStatus())."</td>
              <td>
                <a href='".base_url('admin/editProduk/'.$prod->getUrl())."'><i class='edit icon'></i></a>
                <a onclick='return confirm(\"Ingin menghapus produk ini?\")' href='".base_url('admin/deleteProduk/'.$prod->getUrl())."'><i class='trash icon'></i></a>
              </td>
            </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>
<?php
  }else{
    echo informasi('blue','Belum ada produk yang ditambahkan');
  }
?>
