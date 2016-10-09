			</div>
		</div>
	</div>
</section>

<footer id="footer"><!--Footer-->

<div class="footer-widget">
<div class="container">
<div class="row">
  <div class="col-sm-4">
    <div class="single-widget">
			<?php
				$pageList = Site::getPageList();
				if( !empty($pageList) ){
					echo "
						<h2>Pages</h2>
						<ul class='nav nav-pills nav-stacked'>
					";
					foreach ($pageList as $pl) {
						echo "<li><a href='".base_url('page/'.$pl['slug'])."'>".safe_echo_html($pl['judul'])."</a></li>";
					}
					echo "</ul>";
				}
			?>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="single-widget">
			<?php
				$blogList = Site::getBlogList();
				if( !empty($blogList) ){
					echo "
						<h2>Last Posts</h2>
						<ul class='nav nav-pills nav-stacked'>
					";
					foreach ($blogList as $bl) {
						echo "<li><a href='".base_url('blog/'.$bl['slug'])."'>".safe_echo_html($bl['title'])."</a></li>";
					}
					echo "</ul>";
				}
			?>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="single-widget">
      <h2>About Shopper</h2>
      <form action="#" class="searchform">
        <input type="text" placeholder="Your email address" />
        <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
        <p>Get the most recent updates from <br />our site and be updated your self...</p>
      </form>
    </div>
  </div>

</div>
</div>
</div>

<div class="footer-bottom">
<div class="container">
<div class="row">
  <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
  <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
</div>
</div>
</div>

</footer><!--/Footer-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cara Pembelian / Order</h4>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>

  <script src="<?php echo base_url('assets/eshopper/js/jquery.js'); ?>"></script>
  <script src="<?php echo base_url('assets/eshopper/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/eshopper/js/jquery.scrollUp.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/eshopper/js/price-range.js'); ?>"></script>
  <script src="<?php echo base_url('assets/eshopper/js/jquery.prettyPhoto.js'); ?>"></script>
  <script src="<?php echo base_url('assets/eshopper/js/main.js'); ?>"></script>

  <script src='<?php echo base_url('assets/datatable/datatables.min.js'); ?>'></script>
  <script src='<?php echo base_url('assets/js/jquery.are-you-sure.js'); ?>'></script>
  <script src='<?php echo base_url('assets/js/global.js'); ?>'></script>
  </body>
</HTML>
