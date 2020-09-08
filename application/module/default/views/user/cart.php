<?php 
  $linkCategory	= URL::createLink('default', 'category', 'index',null,'category.html');
  $linkSubmitForm	= URL::createLink('default', 'user', 'buy');
  $tableHeader = '<thead class="thead-light"><tr><th>IMAGE</th><th>PRODUCT</th><th>PRICE</th><th>QUANTITY</th><th>TOTAL</th><th>REMOVE</th></tr></thead>';
?>
<form action="<?php echo $linkSubmitForm;?>" method="POST" name="adminForm" id="adminForm">
<input type="hidden" name="url">
<div>
  <div class="myaccount-content">
    <h5><?php echo $this->_title ?></h5>
    <div class="myaccount-table table-responsive text-center">
    <table class="table table-bordered">
      <?php echo $tableHeader ?>
        <tbody>
          <?php 
            $xhtml = '';
            $sumPrice = 0;
            if(!empty($this->Items)) {
              foreach ($this->Items as $key => $value) {
                $linkDelete = URL::createLink('default','user','delete',['bookID' => $value['id']]);
                $picture = Helper::createImage('book','98x150-',$value['picture'],['width'=>30,'height']);
                $name = $value['name'];
                $bookID  = $value['id'];
                $catID	 = $value['category_id'];
                $bookNameURL	= URL::filterURL($name);
                $catNameURL		= URL::filterURL($value['category_name']);
                $linkDetailBook = URL::createLink('default','book','detail',['bookID' => $bookID,'catID' => $catID],"$catNameURL/$bookNameURL-$catID-$bookID.html");
                $price = number_format($value['price']).'đ';
                $quantity = $value['quantity'];
                $totalprice = number_format($value['totalprice']).'đ';
                $sumPrice += $value['totalprice'];                
                $inputBookID	= Helper::cmsInput('hidden', 'form[bookid][]',$value['id']);
                $inputQuantity	= Helper::cmsInput('hidden', 'form[quantity][]',$value['quantity']);
                $inputPrice		= Helper::cmsInput('hidden', 'form[price][]',$value['price']);
                $inputName		= Helper::cmsInput('hidden', 'form[name][]',$value['name']);
                $inputPicture		= Helper::cmsInput('hidden', 'form[picture][]',$value['picture']);
                $xhtml .= '<tr>
                            <td class="product-thumbnail"><a href="'.$linkDetailBook.'">'.$picture.'</td>
                            <td class="product-name"><a href="'.$linkDetailBook.'">'.$name.'</a></td>
                            <td class="product-price"><span class="amount">'.$price.'</span></td>
                            <td class="product-quantity w-10">'.$quantity.'</td>
                            <td class="product-subtotal">'.$totalprice.'</td>
                            <td class="product-remove"><a href="#" onClick="submitURL(\''.$linkDelete.'\')"><i class="fa fa-times"></i></a></td>
                          </tr>';
                $xhtml	.= $inputBookID . $inputQuantity . $inputPrice . $inputName . $inputPicture;
              }
            } else {
              $xhtml = '<tr><td colspan="6">No Data</td></tr>';
            }
            echo $xhtml;
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
</form>
<?php include 'elements/cart-total.php' ?>

