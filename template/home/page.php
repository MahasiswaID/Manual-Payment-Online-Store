<?php
  if( !empty($data) ){
    echo "<div class='blog-post-area'><div class='single-blog-post'>";
    echo "<h3 class='header'>".safe_echo_html($data['judul'])."</h3>";
    echo "<div class='page-content'>".$data['deskripsi']."</div>";
    echo "</div></div>";
    ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-comments" style='width: 98%;padding: 1%;background: #f5f5f5;margin: 20px 0;border: 1px solid #ccc;' data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-numposts="5"></div>
    <?php
  }
