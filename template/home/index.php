<div id='image-slider'>
  <div class='dalam'>
    <div class='slide-image'>
      <a href=''><img src='http://zizarashop.com/userfiles/1/4/48314/themes/langitbiru/assets/userfile_slideshow4.jpg'/></a>
    </div>
    <div class='slide-image'>
      <a href=''><img src='http://zizarashop.com/userfiles/1/4/48314/themes/langitbiru/assets/userfile_slideshow5.jpg'/></a>
    </div>
    <div class='slide-image'>
      <a href=''><img src='http://zizarashop.com/userfiles/1/4/48314/themes/langitbiru/assets/userfile_slideshow1.jpg'/></a>
    </div>
  </div>
  <div class='pengaturan'>
    <label id='kekiri'>Kiri</label>
    <label id='kekanan'>Kanan</label>
  </div>
</div>

<?php
  $prod = Produk::getProduk();
  if(!empty($prod)){
    foreach ($prod as $produk){
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
    $site->addAlert(array('blue','Tidak ada produk yang ditemukan'));
  }
?>
