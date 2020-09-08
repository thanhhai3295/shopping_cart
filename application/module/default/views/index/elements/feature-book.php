<?php
  HTMLFrontEnd::showTitle('SÁCH NỔI BẬT');
  $xhtml = '';
  if (!empty($this->featureBook)) {
    foreach ($this->featureBook as $key => $value) {
      $name    = $value['name'];
      $price   = $value['price'];
      $productPrice = '<div class="product-price"><ul><li>'.HTMLFrontEnd::numberFormat($price).'</li></ul></div>';     
      $bookID  = $value['id'];
      $catID	 = $value['category_id'];
      $bookNameURL	= URL::filterURL($name);
      $catNameURL		= URL::filterURL($value['category_name']);
      $link = URL::createLink('default','book','detail',['bookID' => $bookID,'catID' => $catID],"$catNameURL/$bookNameURL-$catID-$bookID.html");
      $description = Helper::cutString($value['description'],200);
      $picture = Helper::createImage('book', '', $value['picture']);
      $xhtml .= '<div class="card" style="max-width: 540px;margin-bottom:20px;">
                  <div class="row no-gutters">
                    <div class="col-md-4"><a href="'.$link.'">'.$picture.'</a></div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                        <p class="card-text">'.$description.'</p>'.$productPrice.'
                      </div>
                    </div>
                  </div>
                </div><hr>';
    }
  } 
  echo $xhtml;
  HTMLFrontEnd::showTitle('SÁCH MỚI');
?>  