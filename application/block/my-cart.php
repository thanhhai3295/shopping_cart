<?php
  $cart	= Session::get('cart');
	$totalItems		= 0;
  $totalPrices	= 0;
  $xhtml = '';
	if(!empty($cart)){
		foreach ($cart as $key => $value) {
      $linkDelete = URL::createLink('default','user','delete',['bookID' => $key]);
      $totalItems += $value['quantity'];
      $totalPrices += $value['price'];
      $oldPrice = $value['price']/$value['quantity'];
      $picture = BOOK_URL.$value['image'];
      $name = $value['name'];
      $xhtml .= '<div class="single-cart">
                  <div class="cart-img">
                    <a href="#"><img src="'.$picture.'" alt="book"></a>
                  </div>
                  <div class="cart-info">
                    <h5><a href="#">'.$name.'</a></h5>
                    <p>'.$value['quantity'].' x '.number_format($oldPrice).'đ</p>
                  </div>
                  <div class="cart-icon">
                      <a href="#" onClick="submitURL(\''.$linkDelete.'\')"><i class="fa fa-remove"></i></a>
                  </div>
                </div>';
    }
  }
  $linkViewCart		= URL::createLink('default', 'user', 'cart',null,'cart.html');
  
?>
<div class="my-cart">
  <ul>
    <li><a href="<?php echo $linkViewCart ?>"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a>
      <span><?php echo $totalItems; ?></span>
      <div class="mini-cart-sub">
        <div class="cart-product">
        <?php echo $xhtml; ?>
        </div>
        <div class="cart-totals">
          <h5>Tổng Cộng<span><?php echo number_format($totalPrices) ?></span></h5>
        </div>
        <div class="cart-bottom">
          <a class="view-cart" href="<?php echo $linkViewCart ?>">view cart</a>
        </div>
        
      </div>
    </li>
  </ul>
</div>