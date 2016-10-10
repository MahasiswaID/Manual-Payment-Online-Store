<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <head itemscope itemtype="http://schema.org/WebSite">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type"/>
    <title itemprop='name'><?php if(!empty($site->getCustomTitle())){echo $site->getCustomTitle()." - ";} ?><?php echo safe_echo_html($site->getTitle()); ?></title>
    <meta name='description' content='<?php echo safe_echo_html($site->getDescription()); ?>'/>
    <meta name='keywords' content='<?php echo safe_echo_html($site->getKeywords()); ?>'/>
    <meta name='viewport' content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0'/>

    <link rel="canonical" href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"/>
    <link href="<?php echo base_url('assets/eshopper/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/eshopper/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/eshopper/css/prettyPhoto.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/eshopper/css/price-range.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/eshopper/css/animate.css'); ?>" rel="stylesheet">
  	<link href="<?php echo base_url('assets/eshopper/css/main.css'); ?>" rel="stylesheet">
  	<link href="<?php echo base_url('assets/eshopper/css/responsive.css'); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
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
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0878-7121-7391</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> el.sifa85@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/nayys_new.jpg'); ?>" width='100' alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="<?php echo base_url(); ?>" class="active">Home</a></li>
                <li><a href="<?php echo base_url('page/cara-pemesanan'); ?>">Cara Pemesanan</a></li>
								<li><a href="<?php echo base_url('page/testimonial'); ?>">Testimonial</a></li>
								<!--<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                      <li><a href="/page/testimonial">Testimonial</a></li>
  										<li><a href="product-details.html">Product Details</a></li>
  										<li><a href="checkout.html">Checkout</a></li>
  										<li><a href="cart.html">Cart</a></li>
  										<li><a href="login.html">Login</a></li>
                  </ul>
                </li>-->
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<!--<div class="search_box pull-right">
              <form method='GET'>
  							<input type="text" placeholder="Search"/>
              </form>
						</div>-->
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
  <?php
  $getProduk = Site::getSlider();
  if(!empty($getProduk) && $site->getShowSlider()==1){
    ?>
    <section id="slider"><!--slider-->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                  $no = 0;
                  foreach ($getProduk as $produk) {
                    if($no==0){
                      $aktif = ' active';
                    }else{
                      $aktif = '';
                    }
                    echo '<li data-target="#slider-carousel" data-slide-to="'.$no.'" class="'.$aktif.'"></li>';
                    $no++;
                  }
                ?>
              </ol>
              <div class="carousel-inner">
              <?php
                $no = 1;
                foreach ($getProduk as $produk) {
                  if($no==1){
                    $aktif = ' active';
                  }else{
                    $aktif = '';
                  }
                  echo "<div class='item".$aktif."'>
                    ".returnImageResize(960,400,'kebutuhan/gambar_slide/',$produk['gambar'])."
                  </div>";
                  $no++;
                }
              ?>
              </div>
              <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
  							<i class="fa fa-angle-left"></i>
  						</a>
  						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
  							<i class="fa fa-angle-right"></i>
  						</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
  }

  $infoProd = $site->getProductFilter();
  ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <form method='POST' action="<?php echo base_url('search'); ?>">
                <?php
                  foreach ($infoProd['kategori'] as $katProd) {
                    echo "
                      <div class='panel panel-default'>
                        <div class='panel-heading'>
                          <h4 class='panel-title'><a href='".base_url('search/index/-/').safe_echo_input($katProd)."'>".safe_echo_html($katProd)."</a></h4>
                        </div>
                      </div>
                    ";
                  }
                ?>
              </form>
						</div><!--/category-products-->

            <?php
              echo $site->getSidebar();
            ?>
					</div>
				</div>

				<div class="col-sm-9 padding-right">

          <?php
            if(!empty($site->alert)){
              echo $site->getAlert();
            }
          ?>
