<?php 
  $catID = $this->arrParam['catID']??'';
  $catName = URL::filterURL($this->categoryName['name']);
  $linkNew      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'new','catID' => $catID],"new/$catName-$catID.html");
  $LinkName     = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'name','catID' => $catID],"name/$catName-$catID.html");
  $LinkOrdering = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'ordering','catID' => $catID],"ordering/$catName-$catID.html");
  $linkPrice      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'price','catID' => $catID],"price/$catName-$catID.html");
  $data = [
    'new' => $linkNew,
    'name' => $LinkName,
    'ordering' => $LinkOrdering,
    'price' => $linkPrice
  ];
  $pagination = $this->pagination->frontEndPagination($this->arrParam,$catName.'-'.$catID);
  HTMLFrontEnd::showTitle($this->_titleContent);
?>

<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3><?php echo $this->categoryName['name'] ?></h3>
    </div>

  </div>
  <?php HTMlFrontEnd::createFilter($data,$this->arrParam)?>
</div>
<div class="tab-content">
  <div class="tab-pane active" id="th">
    <div class="row">
        <?php 
          $xhtml = '';
          if (!empty($this->items)) {
            foreach ($this->items as $key => $value) {
              $name    = $value['name'];
              $bookID  = $value['id'];
              $catID	 = $value['category_id'];
              $price   = $value['price'];        
              $productPrice = '<div class="product-price"><ul><li>'.HTMLFrontEnd::numberFormat($price).'</li></ul></div>';
              $bookNameURL	= URL::filterURL($name);
              $catNameURL		= URL::filterURL($catName);
              $link = URL::createLink('default','book','detail',['bookID' => $bookID,'catID' => $catID],"$catNameURL/$bookNameURL-$catID-$bookID.html");
              $description = Helper::cutString($value['description'],200);
              $picture = Helper::createImage('book', '', $value['picture'],['class'=>'img-thumbnail']);
              $xhtml .= '<div class="card" style="max-width: 540px;margin-bottom:20px;">
                          <div class="row no-gutters">
                            <div class="col-md-4"><a href="'.$link.'">'.$picture.'</a></div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title"><a href="'.$link.'">'.$name.'</a></h5>
                                <p class="card-text">'.$description.'</p>
                              </div>'.$productPrice.'
                            </div>
                          </div>
                        </div><hr>';
            }
          } else {
            $xhtml .= HTMLFrontEnd::noData(NO_DATA);
          }
          echo $xhtml;
        ?>  

    </div>
  </div>
</div>

<div class="pagination-area" style="border:none">
    <div style="float:right">
      <?php echo $pagination; ?>
    </div>
</div>
