<?php
  $url = $site->getSiteData();
  $produk = Produk::getProduk($url,'','',1);
  if(!empty($produk)){
    ?>
    <div class='gambar-utama'>
      <?php
        echo "<img style='max-height:500px;' src='".base_url('kebutuhan/gambar_utama_produk/'.$produk[0]->getGambarUtama())."'/>";
      ?>
    </div>
    <div class='gambar-lain'>
      <?php
        echo "<div class='gambar' srcnya='kebutuhan/gambar_utama_produk/".$produk[0]->getGambarUtama()."'>
          ".returnImageResize(80,80,'kebutuhan/gambar_utama_produk/',$produk[0]->getGambarUtama(),safe_echo_html($produk[0]->getNama()))."
        </div>";
        foreach ($produk[0]->getGambarTambahan() as $glain) {
          echo "<div class='gambar' srcnya='kebutuhan/gambar_tambahan_produk/".$glain['nama']."'>
            ".returnImageResize(80,80,'kebutuhan/gambar_tambahan_produk/',$glain['nama'],safe_echo_html($produk[0]->getNama()))."
          </div>";
        }
      ?>
    </div>
    <div class='detil-produk'>
      <?php
        echo "<h1 class='header'>".safe_echo_html($produk[0]->getNama());
        if(!empty($produk[0]->getBrand())){
          echo " by ".safe_echo_html($produk[0]->getBrand());
        }
        echo "</h1>";
        /*echo "<div class='beli-produk'>
          <div class='ui grid'>
            <div class='eight wide column'>
              <p>Brand : ".safe_echo_html($produk[0]->getBrand())."</p>
              <p>Kategori : ".safe_echo_html($produk[0]->getKategori())."</p>
            </div>
            <div class='eight wide middle aligned column'>
              <h1 class='center aligned'>".toRupiah($produk[0]->getHarga())."</h1>
            </div>
          </div>
        </div>";*/
        ?>
        <!--<div class='order-sekarang'>
          <a href='#!'>Order lewat Email</a>
          <a href='#!'>Order lewat SMS</a>
          <a href='#!'>Cara Order</a>
        </div>-->
        <?php
        echo "<div class='isi-deskripsi'>".$produk[0]->getDeskripsi()."</div>";
      ?>
    </div>
    <?php
  }else{
    echo informasi('negative','Produk tidak ditemukan');
  }
?>
