      </div>
    </div>
  </div>

  <div class="ui small modal">
    <div class="header">Cara Pembelian / Order</div>
    <div class="content">
    <p>Untuk memesan / membeli produk dari <b><?php echo safe_echo_html($site->getTitle()); ?></b>, kamu dapat menghubungi kami di : </p>
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
    <div class="actions">
      <div class="ui positive right labeled icon button">
        Yes
        <i class="checkmark icon"></i>
      </div>
    </div>
  </div>

  <script src='<?php echo base_url('assets/js/jquery.min.js'); ?>'></script>
  <script src='<?php echo base_url('assets/datatable/datatables.min.js'); ?>'></script>
  <script src='<?php echo base_url('assets/semantic/semantic.min.js'); ?>'></script>
  <script src='<?php echo base_url('assets/js/jquery.are-you-sure.js'); ?>'></script>
  <script src='<?php echo base_url('assets/js/global.js'); ?>'></script>
  </body>
</HTML>
