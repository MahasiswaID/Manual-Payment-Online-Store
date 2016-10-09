<!doctype html>
<!--
  Sistem YANG BARU ini dikreasikan dan dibuat oleh...
  Nama    : Mahasiswa
  URL     : http://www.mahasiswa.id
  CP      : 0856 9432 5922
  Email   : noval@mahasiswa.id
-->
<HTML lang='id'>
  <head itemscope itemtype="http://schema.org/WebSite">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type"/>
    <title itemprop='name'><?php if(!empty($site->getCustomTitle())){echo $site->getCustomTitle()." - ";} ?><?php echo safe_echo_html($site->getTitle()); ?></title>
    <meta name='description' content='<?php echo safe_echo_html($site->getDescription()); ?>'/>
    <meta name='keywords' content='<?php echo safe_echo_html($site->getKeywords()); ?>'/>
    <meta name='viewport' content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0'/>

    <link rel="canonical" href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
    <link href='<?php echo base_url('assets/semantic/semantic.min.css'); ?>' rel='stylesheet'/>
    <link href='<?php echo base_url('assets/css/global.css'); ?>?ver=3' rel='stylesheet'/>
    <link href='<?php echo base_url('assets/datatable/datatables.min.css'); ?>' rel='stylesheet'/>
    <link href='<?php echo base_url('assets/flat-admin/css/font-awesome.min.css'); ?>' rel='stylesheet'/>
    <link href='<?php echo base_url('assets/css/custom.css?ver=2 '); ?>' rel='stylesheet'/>
    <link rel='icon' href='http://<?php echo $_SERVER['HTTP_HOST'].base_url('favicon.ico'); ?>' sizes='32x32'/>

    <!-- SEO Meta Tag -->
    <meta name="robots" content="noodp"/>
    <meta content='all-language' http-equiv='Content-Language'/>
    <meta content='global' name='distribution'/>
    <meta content='global' name='target'/>
    <meta content='all' name='robots'/>
    <meta content='true' name='MSSmartTagsPreventParsing'/>
    <meta content='never' name='Expires'/>
    <meta content='id' name='language'/>
    <meta content='id' name='geo.country'/>
    <meta content="general" name="rating"/>
    <meta content="all" name="robots"/>
    <meta content="Indonesia" name="geo.placename"/>
    <meta content="1 days" name="revisit-after"/>
    <meta content="blogger" name="generator"/>
    <meta content="index, follow" name="googlebot"/>
    <meta content="follow, all" name="Googlebot-Image"/>
    <meta content="follow, all" name="msnbot"/>
    <meta content="follow, all" name="Slurp"/>
    <meta content="follow, all" name="ZyBorg"/>
    <meta content="follow, all" name="Scooter"/>
    <meta content="all" name="spiders"/>
    <meta content="all" name="WEBCRAWLERS"/>

    <!-- Open Graph Data -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php if(!empty($site->getCustomTitle())){echo $site->getCustomTitle()." - ";} ?><?php echo safe_echo_html($site->getTitle()); ?>"/>
    <meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:site_name" content="<?php echo safe_echo_html($site->getTitle()); ?>" />
    <!--<meta property="og:image" content=""/>-->

    <!-- Twitter Card Data -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?php echo safe_echo_html($site->getTitle());?>"/>
    <meta name='twitter:description' content="<?php echo safe_echo_html($site->getDescription()); ?>"/>

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo safe_echo_html($site->getTitle()); ?>">
    <meta itemprop="description" content="<?php echo safe_echo_html($site->getDescription()); ?>">
    <!--<meta itemprop="image" content="">-->

  </head>
  <body>

<div class='ui container'>
  <div class="ui inverted pointing menu">
    <a class="<?php if($action=='index'){echo "active";} ?> item">
      Home
    </a>
    <a href='<?php echo base_url('admin/produk'); ?>' class="<?php if(stristr($action,'produk')){echo "active";} ?> item">Produk</a>
    <a href='<?php echo base_url('admin/page'); ?>' class="<?php if(stristr($action,'page')){echo "active";} ?> item">Halaman</a>
    <div class="ui dropdown link item">
      <span class="text">Pengaturan</span>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href='<?php echo base_url('admin/pengaturansitus'); ?>'>Info Situs</a>
        <a class="item" href='<?php echo base_url('admin/pengaturanPembelian'); ?>'>Info Kontak</a>
        <a class="item" href='<?php echo base_url('admin/pengaturanslider'); ?>'>Slider</a>
        <a class="item" href='<?php echo base_url('admin/pengaturanTemplate'); ?>'>Template</a>
      </div>
    </div>
    <div class="right menu">
      <div class="ui dropdown item">
        Profile <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item">Ubah Password</a>
        </div>
      </div>
      <a class="ui item" href='<?php echo base_url('admin/logout'); ?>'>Logout</a>
    </div>
  </div>
  <div class="ui segment">
    <div class="ui mini breadcrumb" style='margin-bottom:10px;'>
      <a class="section" href='<?php echo base_url(); ?>'>Home</a>
      <i class="right chevron icon divider"></i>
      <a class="section" href='<?php echo base_url('admin'); ?>'>Administrator</a>
      <i class="right chevron icon divider"></i>
      <div class="active section"><?php echo safe_echo_html($site->getCustomTitle()); ?></div>
    </div>

    <?php
      if(!empty($site->alert)){
        echo $site->getAlert();
      }
    ?>
