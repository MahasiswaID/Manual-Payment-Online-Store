<?php
  $produk = Produk::getProduk($data,'','',1);
  if(!empty($produk)){
    ?>

    <div class="product-details" itemscope itemtype="http://schema.org/Product"><!--product-details-->
      <div class="col-sm-5">
        <div class='gambar-utama'>
          <?php
            echo "<img itemprop='image' style='max-height:400px;' src='".base_url('kebutuhan/gambar_utama_produk/'.$produk[0]->getGambarUtama())."'/>";
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
          <h2 itemprop="name"><?php
            echo safe_echo_html($produk[0]->getNama());
            if(!empty($produk[0]->getBrand())){
              echo " by ".safe_echo_html($produk[0]->getBrand());
            }
          ?></h2>
          <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <meta itemprop="priceCurrency" content="IDR" />
            <span itemprop="price" style='display:none;'><?php echo $produk[0]->getHarga(); ?></span>
            <span><?php echo toRupiah($produk[0]->getHarga()); ?></span>
          </span>
          <span style='display:none;' itemprop="description"><?php echo strip_tags($produk[0]->getDeskripsi()); ?></span>
          <p><b>Kategori:</b> <?php echo safe_echo_html($produk[0]->getKategori()); ?></p>
          <p><b>Brand:</b> <span itemprop="brand"><?php echo safe_echo_html($site->getTitle()); ?></span></p>
          <a class='tombol-order' href='#!'>Order Sekarang</a>
        </div><!--/product-information-->
      </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
      <div class="col-sm-12">
        <ul class="nav nav-tabs">
          <li class='active'><a href="#details" data-toggle="tab">Details</a></li>
          <li><a href="#cara-pembelian" data-toggle="tab">Cara Pembelian</a></li>
          <li><a href='#review' data-toggle='tab'>Review</a></li>
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
        <div class='tab-pane fade' id='review'>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-comments" style='width: 100%;' data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-numposts="5"></div>
        </div>
      </div>
    </div>
    <?php
  }else{
    echo informasi('negative','Produk tidak ditemukan');
  }
?>
