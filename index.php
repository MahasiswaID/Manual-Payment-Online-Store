<?php
  include_once('functions.php');

  $prm = array();
  if(!empty($_GET['params'])){
    $prm = explode('/',$_GET['params']);
    if(!empty($prm[0])){
      $__controller = $prm[0];
      unset($prm[0]);
    }
    if(!empty($prm[1])){
      $__action = $prm[1];
      unset($prm[1]);
    }
  }

  if(!empty($__controller)){
    $controller = safe_echo_input($__controller);
  }else{
    $controller = 'home';
  }

  if(!empty($__action)){
    $action     = safe_echo_input($__action);
  }else{
    $action     = 'index';
  }

  if(!file_exists('class/'.$controller.'.php')){
    $controller = 'home';
    $action     = 'error';
  }

  /*if(!file_exists('template/'.$controller.'/'.$action.'.php')){
    $controller = 'home';
    $action     = 'error';
  }*/

  include_once('class/site.php');
  include_once('class/'.$controller.'.php');
  switch($controller){
    case 'home' : {
      $site = new Home();
      break;
    }
    case 'login' : {
      $site = new Login();
      break;
    }
    case 'admin' : {
      $site = new Admin();
      break;
    }
    case 'search' : {
      $site = new Search();
      break;
    }
  }

  if(empty($site)){
    die(header("Location:".base_url()));
  }

  $site->infoSitus();
  if (method_exists($site, $action) && is_callable(array($site, $action))){
      call_user_func_array(array($site, $action),$prm);
  }else{
    $site->setCustomTitle('Halaman tidak ditemukan');
    $site->addAlert(array('negative','Halaman tidak ditemukan'));
  }
  if((!file_exists('template/'.$controller.'/header.php'))||(!file_exists('template/'.$controller.'/footer.php'))){
    include_once('template/header.php');
  }else{
    include_once('template/'.$controller.'/header.php');
  }
  $data = $site->getSiteData();
  if(file_exists('template/'.$controller.'/'.$action.'.php')){
    include_once('template/'.$controller.'/'.$action.'.php');
  }
  if((!file_exists('template/'.$controller.'/header.php'))||(!file_exists('template/'.$controller.'/footer.php'))){
    include_once('template/footer.php');
  }else{
    include_once('template/'.$controller.'/footer.php');
  }
?>
