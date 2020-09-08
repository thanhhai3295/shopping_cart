<?php
	$linkAction	= URL::createLink('default', 'index', 'login',null,'login.html');
	$username 	= $this->arrParam['form']['username'] ?? '';
	$password 	= $this->arrParam['form']['password'] ?? '';
  $error 			= isset($this->errors) ? 'Tài Khoản Hoặc Mật Khẩu Không Đúng!' : '';
  $actual_link = isset($this->arrParam['url']) ? $this->arrParam['url'] :'my-account.html';
?>
<div class="container">
  <?php HTMLFrontEnd::showTitle($this->_title); ?>
  <span style="color:red;front-weight:bold"><?php echo $error ?></span>
<div class="login-form">
  <form name="loginForm" method="POST" action="<?php echo $linkAction ?>" id="loginForm">
    <div class="single-login">
      <label>Username<span>*</span></label>
      <input type="text" name="form[username]" value="<?php echo $username ?>">
    </div>
    <div class="single-login">
      <label>Passwords <span>*</span></label>
      <input type="text" name="form[password]" value="<?php echo $password ?>">
    </div>
    <div class="single-login single-login-2">
      <a href="#" onclick="submit('loginForm')">login</a>
      <input id="rememberme" type="checkbox" name="rememberme" value="forever">
      <span>Remember me</span>
    </div>
    <a href="#">Lost your password?</a>
    <input type="hidden" name="form[token]" value="<?php echo time(); ?>">
    <input type="hidden" name="url" value="<?php echo $actual_link ?>">
    </form>
</div>
</div>