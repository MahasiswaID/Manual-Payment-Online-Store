<h3 class='header'>Manage Produk</h3>
<a href='<?php echo base_url('admin/tambahHalaman'); ?>' class='ui button primary'>Tambah Halaman</a>

<table class='ui table' id='myTable'>
  <thead>
    <tr>
      <th width='10'>No</th>
      <th>Judul</th>
      <th>Published</th>
      <th>Slug</th>
      <th>Hits</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data as $page) {
        echo "<tr>
          <td>".$no."</td>
          <td>".safe_echo_html($page['judul'])."</td>
          <td>".safe_echo_html($page['status'])."</td>
          <td>".safe_echo_html($page['slug'])."</td>
          <td>".safe_echo_html($page['hits'])."</td>
          <td>
            <a href='".base_url('admin/editHalaman/'.$page['id'])."'><i class='edit icon'></i></a>
            <a href='".base_url('admin/deleteHalaman/'.$page['id'])."' onclick='return confirm(\"Hapus halaman ini?\")'><i class='trash icon'></i></a>
          </td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
