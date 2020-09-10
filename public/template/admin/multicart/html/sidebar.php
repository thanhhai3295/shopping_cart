<?php                     
	$linkDashBoard       = URL::createLink('admin','index','dashboard');
	$linkGroupList 		 = URL::createLink('admin','group','list');
    $linkGroupForm 		 = URL::createLink('admin','group','form');
    $action              = $this->arrParam['action']; 
    $controller          = $this->arrParam['controller'];
	$menu = [
			['name' => 'Dashboard', 'icon' => '<i data-feather="home"></i>','link' => $linkDashBoard],
			['name' => 'Products', 'icon' => '<i data-feather="box"></i>', 'link' => '#',
					'child' => [
							['name' => 'Product List','icon' => '<i class="fa fa-circle"></i>','link' => '#'],
							['name' => 'Add Product','icon' => '<i class="fa fa-circle"></i>','link' => '#'],
					]
			],
			['name' => 'Group', 'icon' => '<i data-feather="clipboard"></i>', 'link' => '#',
					'child' => [
							['name' => 'Group List','icon' => '<i class="fa fa-circle"></i>','link' => $linkGroupList],
							['name' => 'Add Group','icon' => '<i class="fa fa-circle"></i>','link' => $linkGroupForm],
					]
			],
	];
?>
<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="public/template/admin/multicart/images/dashboard/multikart-logo.png" alt=""></a></div>
</div>
    <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
        <div><img class="img-60 rounded-circle lazyloaded blur-up" src="public/template/admin/multicart/images/dashboard/man.png" alt="#">
        </div>
        <h6 class="mt-3 f-14">JOHN</h6>
        <p>general manager.</p>
    </div>
    <ul class="sidebar-menu">
        <?php 
            $xhtml = '';
            foreach ($menu as $key => $value) {
                $arrow = isset($value['child']) ? '<i class="fa fa-angle-right pull-right"></i>' : '';
                $xhtml .= '<li><a class="sidebar-header" href="'.$value['link'].'">'.$value['icon'].'<span>'.$value['name'].'</span>'.$arrow.'</a>';
                    if(isset($value['child'])) {
                        $xhtml .= '<ul class="sidebar-submenu">';
                        foreach ($value['child'] as $key02 => $value02) {
                            $xhtml .= '<li><a href="'.$value02['link'].'">'.$value02['icon'].$value02['name'].'</a></li>';
                        }
                        $xhtml .= '</ul>';
                    }
                $xhtml .= '</li>';
            }
            echo $xhtml;
        ?>
    </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
