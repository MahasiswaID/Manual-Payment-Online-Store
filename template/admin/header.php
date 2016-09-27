<?php
  include_once('template/header.php');
?>
<div class='ui container'>
  <div class="ui inverted pointing menu">
    <a class="<?php if($action=='index'){echo "active";} ?> item">
      Home
    </a>
    <a href='<?php echo base_url('admin/produk'); ?>' class="<?php if(stristr($action,'produk')){echo "active";} ?> item">
      Produk
    </a>
    <div class="ui dropdown link item">
      <span class="text">Pengaturan</span>
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href='#!'>Home Goods</a>
        <a class="item" href='#!'>Bedroom</a>
      </div>
    </div>
    <div class="right menu">
      <div class="ui dropdown item">
        Profile <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item">Ubah Password</a>
        </div>
      </div>
      <a class="ui item">
        Logout
      </a>
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
