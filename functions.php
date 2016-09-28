<?php
  ob_start();
  session_start();

  error_reporting(E_ALL);
  ini_set("log_errors", true);
  ini_set("error_log", "/var/www/html/hijab/error_file.log");

  include_once('class/koneksi.php');

  define("BASE_URL","/");
  define("cookie_name","toko_".sha1("[toko][auth][user]")."");
  define("cookie_domain",".".$_SERVER['HTTP_HOST']);
  define("UPLOAD_LOC",base_full('assets/uploads/images/'));
  date_default_timezone_set('Asia/Jakarta');

  $arrBulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

  function include_class($kelas){
    return include_once('class/'.$kelas.'.php');
  }

  function getKoneksi(){
    return $GLOBALS['koneksi'];
  }

  function isStringEmpty($string=''){
    if(empty($string)){
      return 1;
    }else{
      $string = trim($string);
      if($string==' '){
        return 1;
      }else{
        return 0;
      }
    }
  }

  function pagination($banyakpage,$url,$banyak){
    $banyakpage = ceil((float)(($banyakpage)/$banyak));
    echo "
    <nav class='pagination-nav'>
      <ul class=\"pagination\">";
        if(!empty($_GET['page'])){
          $page = (int)$_GET['page'];
        }else{
          $page = 1;
        }
        if($page<0){
          $page = 1;
        }
        if($banyakpage<=6){
          for($a=1;$a<=$banyakpage;$a++){
            if($a==$page){
              echo "<li class='active'><a href='".$url."".$a."'>".$a."</a></li>";
            }else{
              echo "<li><a href='".$url."".$a."'>".$a."</a></li>";
            }
          }
        }else{
          $ditengah = $page;
          $dikiri = $ditengah-2;
          $isikiri=2;
          $isikanan=2;
          $dikanan = $ditengah+2;
          if($dikiri<=0){
            $isikiri = $page-1;
          }
          if($dikanan>=$banyakpage){
            $isikanan = $banyakpage-$page;
          }

          if($page>=3){
            echo "<li><a href='".$url."1'>1</a></li>";
            if($page>4){
              echo "<li class='mati'><a href='#!'>...</a></li>";
            }
          }

          for($a=$page-$isikiri-(2-$isikanan);$a<=$page-1;$a++){
            echo "<li><a href='".$url."".$a."'>".$a."</a></li>";
          }
          echo "<li class='active'><a href='".$url."".$page."'>".$page."</a></li>";
          for($a=$page+1;$a<=$page+$isikanan+(2-$isikiri);$a++){
            echo "<li><a href='".$url."".$a."'>".$a."</a></li>";
          }

          if($page<=$banyakpage-3){
            if($page<$banyakpage-3){
              echo "<li class='mati'><a href='#!'>...</a></li>";
            }
            echo "<li><a href='".$url."".$banyakpage."'>".$banyakpage."</a></li>";
          }
        }
      echo "</ul>
    </nav>";
  }

  function toRupiah($num){
    return "Rp ".number_format($num,0,'','.');
  }

  function includeTinyMCE($height=400){
    echo "<script src='".base_url("assets/tinymce4.4.1/tinymce.min.js")."'></script>";
    echo '<script>
    tinymce.init({
        selector: ".tinyMCE",
        height: '.$height.',

        // ===========================================
        // INCLUDE THE PLUGIN
        // ===========================================

        plugins: [
          "advlist autolink lists link print preview anchor",
          "searchreplace visualblocks fullscreen",
          "insertdatetime media table contextmenu paste image jbimages code"
        ],

        // ===========================================
        // PUT PLUGIN\'S BUTTON on the toolbar
        // ===========================================

        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | code",

        image_caption: true,

        // ===========================================
        // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
        // ===========================================

        relative_urls: false,

        setup : function(ed){
          ed.on("change",function(e){tinyMCE.triggerSave();$("#unsave-form").trigger("checkform.areYouSure");});
          ed.on("keyup",function(e){tinyMCE.triggerSave();$("#unsave-form").trigger("checkform.areYouSure");});
        }
     });
    </script>';
  }

  function intToStr($num){
    $num = (int)$num;
    if(strlen($num)==1){
      $num = "0".$num;
    }
    return $num;
  }

  //show bootstrap alert
  function informasi($danger,$text){
    return '
    <div class="ui '.$danger.' message">
      <i class="close icon"></i>
      <div class="header">
        '.$text.'
      </div>
    </div>
    ';
  }

  //safe display from database for html
  function safe_echo_html($string){
    return trim(strip_tags(htmlspecialchars($string, ENT_QUOTES)));
  }

  //safe display from database for input
  function safe_echo_input($string){
    return trim(preg_replace('/\s+/',' ', htmlspecialchars($string, ENT_QUOTES)));
  }

  //creating slug function
  function slug($string){
      return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
  }

  //base url function
  function base_url($string=''){
    return BASE_URL.$string;
  }

  function base_full($string=''){
    return $_SERVER['DOCUMENT_ROOT'].$string;
  }

  function bulan($num){
    switch($num){
      case 1 : {
        return 'Januari';
        break;
      }
      case 2 : {
        return 'Februari';
        break;
      }
      case 3 : {
        return 'Maret';
        break;
      }
      case 4 : {
        return 'April';
        break;
      }
      case 5 : {
        return 'Mei';
        break;
      }
      case 6 : {
        return 'Juni';
        break;
      }
      case 7 : {
        return 'Juli';
        break;
      }
      case 8 : {
        return 'Agustus';
        break;
      }
      case 9 : {
        return 'September';
        break;
      }
      case 10 : {
        return 'Oktober';
        break;
      }
      case 11 : {
        return 'November';
        break;
      }
      case 12 : {
        return 'Desember';
        break;
      }
    }
  }

  function getImageResize($newWidth,$newHeight,$folderPath,$fileName,$altTitle=''){
    if(empty($altTitle)){
      $altTitle = "Gambar";
    }
    imageResize($newWidth,$newHeight,$folderPath, $fileName);
    $lPath = strlen($_SERVER['DOCUMENT_ROOT'].base_url());
    $lfPath = strlen($folderPath);
    if(file_exists($folderPath."/resize/".$newWidth."x".$newHeight."/".$fileName)){
      echo "<img width='".$newWidth."' alt='".safe_echo_html($altTitle)."' title='".safe_echo_html($altTitle)."' height='".$newHeight."' src='".base_url(substr($folderPath,$lPath,$lfPath)."resize/".$newWidth."x".$newHeight."/".$fileName)."'/>";
    }
  }

  function returnImageResize($newWidth,$newHeight,$folderPath,$fileName,$altTitle=''){
    imageResize($newWidth,$newHeight,$folderPath, $fileName);
    $lPath = strlen($_SERVER['DOCUMENT_ROOT'].base_url());
    $lfPath = strlen($folderPath);
    if(file_exists(base_full($folderPath."resize/".$newWidth."x".$newHeight."/".$fileName))){
      return "<img width='".$newWidth."' alt='".$altTitle."' title='".$altTitle."' height='".$newHeight."' src='".base_url($folderPath."resize/".$newWidth."x".$newHeight."/".$fileName)."'/>";
    }else{
      return base_full(substr($folderPath,$lPath,$lfPath)."resize/".$newWidth."x".$newHeight."/".$fileName);
    }
  }

  function imageResize($newWidth,$newHeight,$folderPath, $fileName) {
    $thumbnail_resize = $folderPath."resize/".$newWidth."x".$newHeight."/";
    $targetFile = $thumbnail_resize.$fileName;
    $originalFile = $folderPath.$fileName;

    if(!file_exists($thumbnail_resize)){
      mkdir($thumbnail_resize,0777,true);
    }

    //if(mysql_ping($db_name)){
    if(file_exists($originalFile)){
      if(!file_exists($targetFile)){
          $info = getimagesize($originalFile);
          $mime = $info['mime'];

          switch ($mime) {
                  case 'image/jpeg':
                          $image_create_func = 'imagecreatefromjpeg';
                          $image_save_func = 'imagejpeg';
                          $new_image_ext = 'jpg';
                          break;

                  case 'image/png':
                          $image_create_func = 'imagecreatefrompng';
                          $image_save_func = 'imagepng';
                          $new_image_ext = 'png';
                          break;

                  case 'image/gif':
                          $image_create_func = 'imagecreatefromgif';
                          $image_save_func = 'imagegif';
                          $new_image_ext = 'gif';
                          break;

                  default:
                          $originalFile = base_full('assets/uploads/images/no-image.PNG');
                          $info = getimagesize();
                          $mime = $info['mime'];
                          $image_create_func = 'imagecreatefrompng';
                          $image_save_func = 'imagepng';
                          $new_image_ext = 'png';
                          break;
          }

          $img = $image_create_func($originalFile);
          list($width, $height) = getimagesize($originalFile);
          $tmp = imagecreatetruecolor($newWidth, $newHeight);
          if($mime=='image/png'){
            $bgImage = imagecolorallocate($tmp,255,255,255);
            imagefill($tmp,0,0,$bgImage);
            //imagecolortransparent($tmp,$bgImage);
          }
          imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

          if (file_exists($targetFile)) {
              unlink($targetFile);
          }
          $image_save_func($tmp, "$targetFile");
       }
     }
  }

  function file_upload_max_size_mb(){
    return (int)(file_upload_max_size()/1000000);
  }

  function file_upload_max_size_kb(){
    return (int)(file_upload_max_size()/1000);
  }

  function file_upload_max_size(){
    static $max_size = -1;

    if($max_size < 0){
      $max_size = parse_size(ini_get('post_max_size'));

      $upload_max = parse_size(ini_get('upload_max_filesize'));
      if($upload_max > 0 && $upload_max < $max_size){
        $max_size = $upload_max;
      }
    }
    return $max_size;
  }

  function parse_size($size){
    $unit = preg_replace('/[^bkmgtpezy]/i','',$size);
    $size = preg_replace('/[^0-9\.]/','',$size);

    if($unit){
      return round($size * pow(1024,stripos('bkmgtpezy',$unit[0])));
    }else{
      return round($size);
    }
  }

  function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = '127.0.0.1';
    return $ipaddress;
  }
