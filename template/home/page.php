<?php
  if( !empty($data) ){
    echo "<h2 class='header'>".safe_echo_html($data['judul'])."</h2>";
    echo "<div class='page-content'>".$data['deskripsi']."</div>";
  }
