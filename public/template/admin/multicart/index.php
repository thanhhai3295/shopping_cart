<!DOCTYPE html>
<html lang="en">
<head> 
    <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
	<title><?php echo $this->_title ?></title>
	<?php echo $this->_cssFiles;?>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>

<div class="page-wrapper">
    <?php include 'html/header.php' ?>
    <div class="page-body-wrapper">
        <?php include 'html/sidebar.php'; ?>
        <div class="page-body">
        <?php
            require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS .  $this->_fileView . '.php';
        ?>
        </div>
        <?php include 'html/footer.php' ?>
    </div>
</div>
        
    <?php 
        echo $this->_jsFiles;
    ?>
</body>
</html>
