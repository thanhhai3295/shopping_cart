<?php
  $name = $_SESSION['user']['info']['fullname'];
?>
<div class="tab-pane fade show active" id="dashboad" role="tabpanel">
  <div class="myaccount-content">
    <h5>Bảng điều khiển</h5>
    <div class="welcome">
        <p>Xin Chào, <strong><?php echo $name ?></strong></p>
    </div>
    <p class="mb-0">Từ Bảng điều khiển. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của bạn.
    </p>
  </div>
</div>