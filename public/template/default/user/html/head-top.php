<?php 
  $linkLogin = URL::createLink('default','index','login',null,'login.html');
  $linkLogout = URL::createLink('default','index','logout');
  $checkLogin = isset($_SESSION['user']) ? true : false;
  if($checkLogin) {
    $name = $_SESSION['user']['info']['fullname'];
    $menu = '<li>Xin Chào '.$name.' | <a href="#" onClick="submitURL(\''.$linkLogout.'\')"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a></li>';
  } else {
    $menu = '<li><a href="#" onClick="submitURL(\''.$linkLogin.'\')"><i class="far fa-user"></i> Đăng Nhập</a></li>';
  }
?>
<div class="header-top-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?php // include 'language-area.php' ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="account-area text-right">
          <ul>
            <?php echo $menu ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- header-top-area-end -->