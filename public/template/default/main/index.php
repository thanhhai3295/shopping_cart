<!doctype html>
<html class="no-js" lang="en">
	<?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
	<title><?php echo $this->_title ?></title>
	<?php echo $this->_cssFiles;?>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js"></script>
  <script src="<?php echo ROOT_URL ?>public/template/admin/adminlte/js/message.js"></script>
	<link rel="icon" type="image/png" href="<?php echo ROOT_URL ?>public/template/default/main/img/favicon.png"/>

<body class="shop">

	<header>
		<?php 
			HTMLFrontEnd::createMessage();
			include 'html/head-top.php'; 
			include 'html/head-mid.php';
			include 'html/menu.php' 
		?>
	</header>
    <?php include 'html/breadcrumb.php' ?>
	<div class="shop-main-area mb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<?php include 'html/shop-left.php' ?>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php
						require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS .  $this->_fileView . '.php';
					?>
				</div>
			</div>
		</div>
	</div>
		<form action="" method="POST" id="urlForm">
			<input type="hidden" name="url">
		</form>
    <?php 
      include 'html/footer.php'; 
      echo $this->_jsFiles;
    ?>
</body>
</html>

