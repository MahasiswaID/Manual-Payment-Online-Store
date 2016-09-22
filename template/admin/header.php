<?php
  include_once('template/header.php');
?>
<div class='ui container'>
  <div class="ui secondary pointing menu">
    <a class="<?php if($action=='index'){echo "active";} ?> item">
      Home
    </a>
    <a href='<?php echo base_url('admin/produk'); ?>' class="<?php if(stristr($action,'produk')){echo "active";} ?> item">
      Produk
    </a>
    <a class="item">
      Friends
    </a>
    <div class="right menu">
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
