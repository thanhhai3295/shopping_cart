<?php 
  $linkNew      = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'new'],"new/category.html");
  $LinkName     = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'name'],"name/category.html");
  $LinkOrdering = URL::createLink('default',$this->arrParam['controller'],'list',['filter' => 'ordering'],"ordering/category.html");
  $data = [
    'new' => $linkNew,
    'name' => $LinkName,
    'ordering' => $LinkOrdering,
  ];
  $pagination = $this->pagination->frontEndPagination($this->arrParam,'category');
  HTMLFrontEnd::showTitle($this->_title);
?>

<div class="toolbar mb-30">
  <div class="shop-tab">
    <div class="tab-3">
      <h3></h3>
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
              $id = $value['id'];
              $link    = URL::createLink('default','book','list',['catID' => $value['id']],URL::filterURL($name).'-'.$id.'.html');
              $picture = Helper::createImage('category', '', $value['picture']);
              $xhtml .= '<div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="product-wrapper mb-40 hidden-md hidden-sm">
                            <div class="product-img">
                                <a href="'.$link.'">
                                    '.$picture.'
                                </a>                                               
                            </div>
                            <div class="product-details text-center">                               
                                <h4><a href="'.$link.'">'.$name.'</a></h4>                                 
                            </div>	
                          </div>
                        </div>';
            }
           
          } else {
            $xhtml .= HTMLFrontEnd::noData(NO_DATA);
          }
          echo $xhtml;
        ?>  

    </div>
  </div>
</div>


<div class="pagination-area">
    <div style="float:right">
      <?php echo $pagination; ?>
    </div>
</div>
