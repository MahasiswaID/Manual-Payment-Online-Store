<style>
  body{
    background: #FF530D;
  }
</style>
<div class='login-form'>
  <h1 class='header' style='text-align:center;margin:20px 0;'>
    LOG IN
  </h1>
  <?php
    if(!empty($site->alert)){
      echo $site->getAlert();
    }
  ?>
  <form method='POST' class='ui form'>
    <div class='field'>
      <div class="ui icon input">
        <input placeholder="Username" autofocus name='username' maxlength="20"/>
        <i class="user icon"></i>
      </div>
    </div>
    <div class='field'>
      <div class='ui icon input'>
        <input placeholder='Password' name='password' type='password'/>
        <i class='lock icon'></i>
      </div>
    </div>
    <div class='field'>
      <button type='submit' name='login' class='ui button fluid primary'>Log in</button>
    </div>
  </form>
</div>
