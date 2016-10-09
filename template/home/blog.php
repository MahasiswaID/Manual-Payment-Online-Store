<?php
  if( !empty($data) ){
    echo "<div class='blog-post-area'><div class='single-blog-post'>";
    echo "<h3>".safe_echo_html($data['title'])."</h3>";
    echo "
    <div class='post-meta'>
      <ul>
        <li><i class='fa fa-user'></i> ".safe_echo_html($site->getTitle())."</li>
        <li><i class='fa fa-clock-o'></i> ".substr($data['publishedTime'],11,8)."</li>
        <li><i class='fa fa-calendar'></i> ".substr($data['publishedTime'],0,10)."</li>
      </ul>
    </div>";
    echo "<div class='page-content'>".$data['description']."</div>";
    echo "</div></div>";
  }
