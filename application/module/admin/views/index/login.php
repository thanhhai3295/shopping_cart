<?php 
	$linkAction	= URL::createLink('admin', 'index', 'login');
	$username 	= $this->arrParam['form']['username'] ?? '';
	$password 	= $this->arrParam['form']['password'] ?? '';
	$error 			= isset($this->errors) ? 'username or password is incorrect' : '';
?>

<form class="login100-form validate-form flex-sb flex-w" action="<?php echo $linkAction ?>" method="POST">
	<span class="login100-form-title p-b-53">
		Sign In With
	</span>

	<a href="#" class="btn-face m-b-20">
		<i class="fa fa-facebook-official"></i>
		Facebook
	</a>

	<a href="#" class="btn-google m-b-20">
		<img src="public/template/admin/login/images/icons/icon-google.png" alt="GOOGLE">
		Google
	</a>
	<span class="login100-form-title" style="color:red;font-size:20px;">
		<?php echo $error; ?>
	</span>
	<div class="p-t-2 p-b-9">
		<span class="txt1">
			Username
		</span>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Username is required">
		<input class="input100" type="text" name="form[username]" value="<?php echo $username ?>">
		<span class="focus-input100"></span>
	</div>
	
	<div class="p-t-13 p-b-9">
		<span class="txt1">
			Password
		</span>

		<a href="#" class="txt2 bo1 m-l-5">
			Forgot?
		</a>
	</div>
	<div class="wrap-input100 validate-input" data-validate = "Password is required">
		<input class="input100" type="password" name="form[password]" value="<?php echo $password; ?>">
		<span class="focus-input100"></span>
	</div>

	<div class="container-login100-form-btn m-t-17">
		<button class="login100-form-btn">
			Sign In
		</button>
	</div>

	<div class="w-full text-center p-t-55">
		<span class="txt2">
			Not a member?
		</span>

		<a href="#" class="txt2 bo1">
			Sign up now
		</a>
	</div>
	<input type="hidden" name="form[token]" value="<?php echo time(); ?>">
</form>
			
