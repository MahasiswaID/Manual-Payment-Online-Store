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
            $kon = Home::getKontak();
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

<?php
  include_once('template/footer.php');
?>
