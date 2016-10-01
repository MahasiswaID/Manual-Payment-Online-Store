<?php
  if(!empty($data)){
    foreach ($data as $produk){
      echo "
        <div class='kotak-produk'>
          <div class='dalam'>
            <div class='gambar'>
              <a href='".base_url('jual-'.$produk->getUrl().'-murah')."'>
                ".returnImageResize(250,270,'kebutuhan/gambar_utama_produk/',safe_echo_html($produk->getGambarUtama()),safe_echo_input($produk->getNama()))."
              </a>
            </div>
            <div class='nama-harga'>
              <div class='nama'>
                <a href='".base_url('jual-'.$produk->getUrl().'-murah')."'>".safe_echo_html($produk->getNama())."</a>
              </div>
              <div class='harga'>
                ".toRupiah($produk->getHarga())."
              </div>
            </div>
            <div class='detail-order'>
              <a href='".base_url('jual-'.$produk->getUrl().'-murah')."'>Detail</a>
              <a href='#!'>Pesan</a>
            </div>
          </div>
        </div>
      ";
    }
  }else{
    $site->addAlert(array('negative','Produk tidak ditemukan'));
  }
?>
