<div class="row mt-3">
  <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
  <div class="buttons-cart mb-30">
    <ul>
        <li><a href="<?php echo $linkCategory ?>">Tiếp Tục Mua Sách</a></li>
    </ul>
  </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="cart_totals">
          <table>
              <tbody>              
                  <tr class="order-total">
                      <th>Tổng Cộng:</th>
                      <td>
                          <strong>
                              <span class="amount"><?php echo number_format($sumPrice).'đ'; ?></span>
                          </strong>
                      </td>
                  </tr>
              </tbody>
          </table>
          <div class="wc-proceed-to-checkout">
            <a href="#" onClick="submitForm()">Proceed to Checkout</a>
          </div>
      </div>
  </div>
</div>