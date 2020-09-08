<?php 
  $xhtml = '';
  if (!empty($this->newBook)) {
    foreach ($this->newBook as $key => $value) {
      $name    = $value['name'];
      $bookID  = $value['id'];
      $catID	 = $value['category_id'];
      $bookNameURL	= URL::filterURL($name);
      $catNameURL		= URL::filterURL($value['category_name']);
      $link = URL::createLink('default','book','detail',['bookID' => $bookID,'catID' => $catID],"$catNameURL/$bookNameURL-$catID-$bookID.html");
      $picture = Helper::createImage('book', '98x150-', $value['picture']);
      $xhtml .= '
                  <div class="col-md-4">
                    <div class="card relative overflow" style="width: 18rem;">
                    <a href="'.$link.'">'.$picture.'</a>
                    <div class="product-flag">
                      <ul>
                          <li><span class="sale">new</span></li>
                      </ul>
                    </div>
                    <div class="card-body" style="margin-top:1rem;">
                    <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                    </div>
                    </div>
                  </div>';

    }
  } 
  echo $xhtml;
?>  