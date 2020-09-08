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
	<body class="cart">
	<header>
		<?php 
			HTMLFrontEnd::createMessage();
			include 'html/head-top.php'; 
			include 'html/head-mid.php';
			include 'html/menu.php'; 
		?>
	</header>
	<?php 
		include 'html/breadcrumb.php';
		include 'html/title.php';
	?>
<div class="my-account-wrapper mb-70">
  <div class="container">
    <div class="section-bg-color">
      <div class="row">
        <div class="col-lg-12">
				<!-- Start Wrapper -->
				<div class="myaccount-page-wrapper">
   				<!-- My Account Tab Menu Start -->
					<div class="row">
						<?php include 'html/tab-header.php' ?>
						<!-- My Account Tab Menu End -->
						<!-- My Account Tab Content Start -->
						<div class="col-lg-9 col-md-8">
							<div class="tab-content" id="myaccountContent">
							
							<?php
								require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS .  $this->_fileView . '.php';
							?>
							
							</div>
						</div>
						<!-- My Account Tab Content End -->
					</div>
				</div>
				<!-- End Wrapper -->	
        </div>
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

