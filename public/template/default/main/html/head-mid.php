<?php 
  $search = $this->arrParam['search']??'';
  $search = Helper::replaceString(trim($search),'+');
  if(!empty($search)) {
    $linkSearch = URL::createLink('default','book','search',null,"search=$search");
    header('location: '.$linkSearch);
  }
  $valueSearch = $this->arrParam['filter-search']??'';
?>
<div class="header-mid-area ptb-40">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
        <div class="header-search">
          <form action="" method="POST" id="searchForm">
            <input type="text" placeholder="Nhập Tên Sách..." name="search" value="<?php echo $valueSearch ?>" />
            <a href="#" onclick="submit('searchForm')"><i class="fa fa-search"></i></a>
          </form>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
        <div class="logo-area text-center logo-xs-mrg">
          <a href="#"><img src="<?php echo ROOT_URL ?>public\template\default\main\img\logo.png" alt="logo" /></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <?php include_once BLOCK_PATH . 'my-cart.php';?>
      </div>
    </div>
  </div>
</div>