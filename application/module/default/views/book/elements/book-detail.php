<?php 
  $name        = $this->bookInfo['name'];
  $picture     = BOOK_URL.$this->bookInfo['picture'];
  $largePicture = BOOK_LARGE_URL.$this->bookInfo['picture'];
  $description = $this->bookInfo['description'];
  $price       = $this->bookInfo['price'];
  $sale        = $this->bookInfo['sale_off'];
  $sale_off = HTMLFrontEnd::showPrice($sale,$price);  
  $bookID			= $this->bookInfo['id'];
  $realPrice = HTMLFrontEnd::salePrice($sale,$price);
  if(!isset($_SESSION['user'])) {
    $link = URL::createLink('default','index','login',null,'login.html');
  } else {
    $link = URL::createLink('default','user','order',['bookID' => $bookID,'price' => $realPrice]);
  }
  
?>

<div class="product-main-area">
  <div class="row">
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
    <a href="<?php echo $picture ?>" data-fancybox="images">
      <img id="zoom_01" src="<?php echo $picture ?>" style="width:100%" class="img-thumbnail" data-zoom-image="<?php echo $largePicture ?>"/>
    </a>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
      <div class="product-info-main">
        <div class="page-title">
          <h1><?php echo $name?></h1>
        </div>

        <div class="product-info-price">
          <div class="price-final">
            <?php echo $sale_off; ?>
          </div>
        </div>
        <div class="product-add-form">
          <form action="#">
            <div class="quality-button">
              <input class="qty" type="number" value="1">
            </div>
            <a href="#" onClick="submitURL('<?php echo $link ?>');">Add to cart</a>
          </form>
        </div>
        <div class="product-social-links">
          <!-- <div class="product-addto-links">
            <a href="#"><i class="fa fa-heart"></i></a>
            <a href="#"><i class="fa fa-pie-chart"></i></a>
          </div> -->
          <div class="product-addto-links-text">
            <p><?php echo Helper::cutString($description,500) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>	
</div>
<br>
