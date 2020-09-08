<?php 
  $linkDashBoard = URL::createLink('default','user','index',null,'my-account.html');
  $linkCart = URL::createLink('default','user','cart',null,'cart.html');
  $linkHistory = URL::createLink('default','user','history',null,'history.html');
  $linkLogout = URL::createLink('default','index','logout');
  $action = $this->arrParam['action'];
  $arrMenu = [
    'index' => ['icon' => 'fa fa-tools','link' => $linkDashBoard,'name' => 'Bảng Điều Khiển'],
    'cart' => ['icon' => 'fa fa-cart-arrow-down','link' => $linkCart,'name' => 'Giỏ Hàng'],
    'history' => ['icon' => 'fa fa-history','link' => $linkHistory,'name' => 'Lịch Sử'],
    'detail' => ['icon' => 'fa fa-user','link' => '#','name' => 'Thông Tin'],
  ];
  $xhtml = '';
  foreach ($arrMenu as $key => $value) {
    $active = ($key == $action) ? 'active' : '';
    $xhtml .= '<a href="'.$value['link'].'" class="'.$active.'"><i class="'.$value['icon'].'"></i> '.$value['name'].'</a>';
  }
?>
<div class="col-lg-3 col-md-4">
<div class="myaccount-tab-menu nav">
  <?php echo $xhtml; ?>
  <a href="#" onclick="submitURL('<?php echo $linkLogout ?>');"><i class="fa fa-sign-out-alt"></i></i> Đăng Xuất</a>
</div>
</div>