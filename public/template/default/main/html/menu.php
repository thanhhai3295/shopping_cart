<?php 
  $linkHome     = URL::createLink('default','index','index',null,'index.html');
  $linkCategory = URL::createLink('default','category','list',null,'category.html');
  $linkMyAccount = URL::createLink('default','user','index',null,'my-account.html');
  $controller = !empty($this->arrParam['controller']) ? $this->arrParam['controller'] : 'index';
  $action = $this->arrParam['action'];
?>
<div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="menu-area">
          <nav>
            <ul>
              <li><a href="<?php echo $linkHome ?>">Trang Chủ</i></a>
              </li>
              <li><a href="<?php echo $linkCategory ?>">Thể Loại<i class="fa fa-angle-down"></i></a>
                <div class="mega-menu">
                  <?php 
                    $db = new Model();
                    $sql = "SELECT id,name FROM ".TBL_CATEGORY;
                    $result = $db->rawQuery($sql);
                    $xhtml = '';
                    $check = 0;
                    foreach ($result as $key => $value) {
                      $nameURL = URL::filterURL($value['name']);
                      $link   = URL::createLink('default','book','list',['catID' => $value['id']],$nameURL.'-'.$value['id'].'.html');
                      $xhtml .= '<span>';
                      $xhtml .= '	<a href="'.$link.'">'.$value['name'].'</a>';
                      $xhtml .= '</span>';
                    }
                    echo $xhtml;
                  ?>
                </div>
              </li>
              <li><a href="<?php echo $linkMyAccount ?>">Tài Khoản</a>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var controller = '<?php echo $controller ?>';
    var action = '<?php echo $action ?>';
    if(controller == 'index') controller = 'trang chủ';
    if(controller == 'category' || (controller == 'book')) controller = 'thể loại';
    if(controller == 'user') controller = 'tài khoản';
    var li = document.querySelectorAll('div.menu-area nav ul li');
    li.forEach(element => {
      if(element.firstElementChild.textContent.trim().toLowerCase() == controller) {
        element.classList.add('active');
      }
    });
  });
</script>