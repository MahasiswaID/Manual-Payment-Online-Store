<h2 class="title text-center">Pencarian</h2>
<?php
  if(!empty($data)){
    foreach ($data['listproduk'] as $produk){
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
    pagination($data['banyakproduk'],base_url('search/index/'.$data['q'].'/'.$data['kategori'].'/'),$site->getTotalPost(),$data['p']);
  }else{
    $site->addAlert(array('negative','Produk tidak ditemukan'));
  }
?>
