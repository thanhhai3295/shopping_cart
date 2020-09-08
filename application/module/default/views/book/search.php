<?php 
  $xhtml = '';
  $valueSearch = $this->arrParam['filter-search'];
  if(!empty($this->items)) {
    $count = count($this->items);
    $xhtml .= '<h3>Kết quả tìm kiếm cho \''.$valueSearch.'\': <span style="color:red;">'.$count.'</span> kết quả </h3>';
    foreach ($this->items as $key => $value) {
      $name    = $value['name'];
      $bookID  = $value['id'];
      $catID	 = $value['category_id'];
      $catName = $value['category_name'];
      $price   = $value['price'];        
      $sale = $value['sale_off'];
      if($sale > 0) {
        $salePrice = HTMLFrontEnd::salePrice($sale,$price);
        $productPrice = '<div class="product-price"><ul><li>'.HTMLFrontEnd::numberFormat($salePrice).'</li><li class="old-price"> '.HTMLFrontEnd::numberFormat($price).'</li></ul></div>';
      } else {
        $productPrice = '<div class="product-price"><ul><li>'.HTMLFrontEnd::numberFormat($price).'</li></ul></div>';
      }
      $salePrice = HTMLFrontEnd::salePrice($sale,$price);
      
      $bookNameURL	= URL::filterURL($name);
      $catNameURL		= URL::filterURL($catName);
      $linkDetail   = URL::createLink('default','book','detail',['bookID' => $bookID,'catID' => $catID],"$catNameURL/$bookNameURL-$catID-$bookID.html");
      if(!isset($_SESSION['user'])) {
        $linkOrder = URL::createLink('default','index','login',null,'login.html');
      } else {
        $linkOrder = URL::createLink('default','user','order',['bookID' => $bookID,'price' => $salePrice]);
      }
      $description  = Helper::cutString($value['description'],200);
      $picture      = Helper::createImage('book', '', $value['picture'],['class'=>'img-thumbnail']);
      $xhtml .= '<div class="single-shop mb-30">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="product-wrapper-2">
            <div class="product-img">
              <a href="'.$linkDetail.'">
                '.$picture.'
              </a>
            </div>	
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="product-wrapper-content">
            <div class="product-details">
              <h4><a href="'.$linkDetail.'">'.HTMLFrontEnd::addSpanSearch($name,$valueSearch).'</a></h4>
              '.$productPrice.'             
              <p>'.$description.'</p>
            </div>
            <div class="product-link">
              <div class="product-button">
                <a href="#" onclick="submitURL(\''.$linkOrder.'\');"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>
              <div class="add-to-link">
                <ul>
                    <li><a href="'.$linkDetail.'" title="Details"><i class="fas fa-external-link-alt"></i></a></li>
                </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div><hr>';

    }
  } else {
    $xhtml = '<h3>Không tìm thấy kết quả cho "'.$valueSearch.'"</h3>';
  }
  echo $xhtml;
?>

