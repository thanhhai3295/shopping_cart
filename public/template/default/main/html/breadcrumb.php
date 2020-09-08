<?php 
  $controller = $this->arrParam['controller'];
  if($controller == 'index') {
    $xhtml = '<li>Home</li>';
  } else {
    $xhtml = '<li><a href="index.php">Home</a></li>';
    $xhtml .= '<li>'.ucfirst($controller).'</li>';
  }
?>
<div class="breadcrumbs-area mb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumbs-menu">
          <ul>
            <?php echo $xhtml ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>