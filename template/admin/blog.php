<h3 class='header'>Manage Blog</h3>
<a href='<?php echo base_url('admin/tambahBlog'); ?>' class='ui button primary'>Tambah Blog</a>

<table class='ui table' id='myTable'>
  <thead>
    <tr>
      <th width='10'>No</th>
      <th>Judul</th>
      <th>Published</th>
      <th>Date</th>
      <th>Hits</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data as $blog) {
        echo "<tr>
          <td>".$no."</td>
          <td>".safe_echo_html($blog['title'])."</td>
          <td>".tombol_published($blog['status'])."</td>
          <td>".safe_echo_html($blog['publishedTime'])."</td>
          <td>".safe_echo_html($blog['hits'])."</td>
          <td>
            <a href='".base_url('admin/editBlog/'.$blog['id'])."'><i class='edit icon'></i></a>
            <a href='".base_url('admin/deleteBlog/'.$blog['id'])."' onclick='return confirm(\"Hapus post ini?\")'><i class='trash icon'></i></a>
          </td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
