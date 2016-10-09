<h2 class='header'>Pengaturan Password</h2>
<form method='POST' class='ui form'>
  <div class='two fields'>
    <div class='field'>
      <label>Password lama</label>
      <input name='old_password' required type='password' placeholder='Masukkan password lama'/>
    </div>
  </div>
  <div class='two fields'>
    <div class='field'>
      <label>Password baru</label>
      <input name='new_password' id='password' required type='password' placeholder='Masukkan password baru' pattern='.{6,}'/>
    </div>
    <div class='field'>
      <label>Konfirmasi password</label>
      <input name='confirm_password' id='confirm_password' required type='password' placeholder='Masukkan password baru' pattern='.{6,}'/>
    </div>
  </div>
  <div class='field'>
    <button name='submit' type='submit' class='ui primary button'>Simpan</button>
  </div>
</form>

<script>
var password = document.getElementById("password")
,confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Password tidak cocok");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
