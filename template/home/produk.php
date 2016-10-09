<?php
  $produk = Produk::getProduk($data,'','',1);
  if(!empty($produk)){
    ?>

    <div class="product-details"><!--product-details-->
      <div class="col-sm-5">
        <div class='gambar-utama'>
          <?php
            echo "<img style='max-height:400px;' src='".base_url('kebutuhan/gambar_utama_produk/'.$produk[0]->getGambarUtama())."'/>";
          ?>
        </div>
        <div class='gambar-lain'>
          <div class='dalam'>
            <?php
              echo "<div class='gambar' srcnya='kebutuhan/gambar_utama_produk/".$produk[0]->getGambarUtama()."'>
                ".returnImageResize(60,60,'kebutuhan/gambar_utama_produk/',$produk[0]->getGambarUtama(),safe_echo_html($produk[0]->getNama()))."
              </div>";
              foreach ($produk[0]->getGambarTambahan() as $glain) {
                echo "<div class='gambar' srcnya='kebutuhan/gambar_tambahan_produk/".$glain['nama']."'>
                  ".returnImageResize(60,60,'kebutuhan/gambar_tambahan_produk/',$glain['nama'],safe_echo_html($produk[0]->getNama()))."
                </div>";
              }
            ?>
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
          <h2><?php
            echo safe_echo_html($produk[0]->getNama());
            if(!empty($produk[0]->getBrand())){
              echo " by ".safe_echo_html($produk[0]->getBrand());
            }
          ?></h2>
          <span>
            <span><?php echo toRupiah($produk[0]->getHarga()); ?></span>
          </span>
          <p><b>Kategori:</b> <?php echo $produk[0]->getKategori(); ?></p>
          <a class='tombol-order' href='#!'>Order Sekarang</a>
        </div><!--/product-information-->
      </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
      <div class="col-sm-12">
        <ul class="nav nav-tabs">
          <li class='active'><a href="#details" data-toggle="tab">Details</a></li>
          <li><a href="#cara-pembelian" data-toggle="tab">Cara Pembelian</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
          <div class='col-sm-12'>
            <?php
              echo $produk[0]->getDeskripsi();
            ?>
          </div>
        </div>
        <div class='tab-pane fade' id='cara-pembelian'>
          <p>Untuk memesan / membeli produk dari <b><?php echo safe_echo_html($site->getTitle()); ?></b>, dapat menghubungi kami melalui </p>
          <table>
            <tbody>
              <?php
                $kon = Site::getKontak();
                foreach ($kon as $kontak) {
                  echo "
                  <tr>
                    <td style='padding:5px 10px;'>".safe_echo_html($kontak['nama'])."</td>
                    <td>: ".safe_echo_html($kontak['val'])."</td>
                  </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php
  }else{
    echo informasi('negative','Produk tidak ditemukan');
  }
?>
