<?php
  include_once('template/header.php');
?>
  <div class='ui container home-container'>
    <nav>
      <a href='<?php echo base_url(); ?>'>Home</a>
      <a href='#!'>Menu 1</a>
      <a href='#!'>Menu 2</a>
      <a href='#!'>Menu 3</a>
      <a href='#!'>Menu 4</a>
    </nav>
    <header>
      <h1><?php echo safe_echo_html($site->getTitle()); ?></h1>
      <h4><?php echo safe_echo_html($site->getTagline()); ?></h4>
    </header>
    <div class='ui grid'>
      <div class='four wide column'>
        <div id='sidebar'>
          <?php
            if(!empty($site->getInfoProduk())){
              $infoProduk = $site->getInfoProduk();
              echo "<div class='sidebar-produk'>
                <div class='harga'>".toRupiah($infoProduk->getHarga())."</div>
                <a class='tombol-order' href='#!'>Order Sekarang</a>
              </div>
              <div class='kat-brand'>
                <table>
                  <tbody>
                    <tr><td>Brand</td><td>".safe_echo_html($infoProduk->getBrand())."</td></tr>
                    <tr><td>Kategori</td><td>".safe_echo_html($infoProduk->getKategori())."</td></tr>
                  </tbody>
                </table>
              </div>";
            }
          ?>
          <div class='widget'>
            <form method='GET' class='ui form form-pencarian'>
              <h4 class='header'>Kategori</h4>
                <?php
                $listKategori = Home::getKategoriBrand()['kategori'];
                $no = 1;
                foreach ($listKategori as $kategori) {
                  echo "<div class='inline field'><input type='checkbox' value='".safe_echo_html($kategori)."' id='kat".$no."'/> <label for='kat".$no."'>".safe_echo_html($kategori)."</label></div>";
                  $no++;
                }
                ?>
                <input class='kat' value='' type='hidden'/>
              <h4 class='header'>Brand</h4>
                <?php
                $listBrand = Home::getKategoriBrand()['brand'];
                $no = 1;
                foreach ($listBrand as $brand) {
                  echo "<div class='inline field'><input type='checkbox' value='".safe_echo_html($brand)."' id='brand".$no."'/> <label for='brand".$no."'>".safe_echo_html($brand)."</label></div>";
                  $no++;
                }
                ?>
              <button type='submit' class='ui button primary' name='submit'>Cari</button>
            </form>
          </div>
        </div>
      </div>
      <div class='twelve wide column'>
