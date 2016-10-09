<?php
  $prod = Produk::getProduk('',$site->getTotalPost(),'',0,1);
  if(!empty($prod)){
    foreach ($prod as $produk){
      echo '
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              '.returnImageResize(250,250,'kebutuhan/gambar_utama_produk/',safe_echo_html($produk->getGambarUtama()),safe_echo_input($produk->getNama())).'
              <h2>'.toRupiah($produk->getHarga()).'</h2>
              <p>'.safe_echo_html($produk->getNama()).'</p>
              <a href="'.base_url('jual-'.$produk->getUrl().'-murah').'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lihat Detail</a>
            </div>
            <div class="product-overlay">
              <div class="overlay-content">
                <h2>'.toRupiah($produk->getHarga()).'</h2>
                <p>'.safe_echo_html($produk->getNama()).'</p>
                <a href="'.base_url('jual-'.$produk->getUrl().'-murah').'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
    <nav class='pagination-nav'>
      <ul class='pagination'>
        <li>
          <a href='<?php echo base_url('search/index/-/-/2'); ?>'>Produk Selanjutnya</a>
        </li>
      </ul>
    </nav>
    <?php
  }else{
    $site->addAlert(array('blue','Tidak ada produk yang ditemukan'));
  }
?>
