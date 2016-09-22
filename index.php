<?php
  include_once('functions.php');

  if(!empty($_GET['controller'])){
    $controller = safe_echo_input($_GET['controller']);
  }else{
    $controller = 'home';
  }

  if(!empty($_GET['action'])){
    $action     = safe_echo_input($_GET['action']);
  }else{
    $action     = 'index';
  }

  if(!file_exists('class/'.$controller.'.php')){
    $controller = 'home';
    $action     = 'error';
  }

  if(!file_exists('template/'.$controller.'/'.$action.'.php')){
    $controller = 'home';
    $action     = 'error';
  }

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
  }

  $site->$action();
  if((!file_exists('template/'.$controller.'/header.php'))||(!file_exists('template/'.$controller.'/footer.php'))){
    include_once('template/header.php');
  }else{
    include_once('template/'.$controller.'/header.php');
  }
  include_once('template/'.$controller.'/'.$action.'.php');
  if((!file_exists('template/'.$controller.'/header.php'))||(!file_exists('template/'.$controller.'/footer.php'))){
    include_once('template/footer.php');
  }else{
    include_once('template/'.$controller.'/footer.php');
  }
?>
