<?php 
  $columnPost		= $this->arrParam['filter_column'] ?? '';
	$orderPost		= $this->arrParam['filter_column_dir'] ?? '';
  $lblID      	= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
  $lblUserName  = Helper::cmsLinkSort('UserName', 'username', $columnPost, $orderPost);
  $lblEmail  = Helper::cmsLinkSort('Email', 'email', $columnPost, $orderPost);
  $lblFullName  = Helper::cmsLinkSort('FullName', 'fullname', $columnPost, $orderPost);
  $lblCreated 	= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
  $lblOrdering 	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
  $lblStatus  	= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
  $message      = Helper::createMessage();
  $pagination   = $this->pagination->showPagination(true);
  $hiddenColumn    = Helper::cmsInput('hidden','filter_column','id');
  $hiddenColumnDir = Helper::cmsInput('hidden','filter_column_dir',$this->arrParam['filter_column_dir']??'');
  $hiddenPage      = Helper::cmsInput('hidden','filter_page','1');
  $nameController = $this->arrParam['controller'];

  $arraySelectGroup = $this->arrGroup;
  $selectGroup = Helper::cmsSelectbox('form[group]','form-control',$arraySelectGroup,$this->arrParam['form']['group']??'',null,null,'filterGroup');
  $filter       = Helper::createFilter($this->arrParam,$this->countStatus,$selectGroup);
  echo Helper::createTitle($this->_title);
?>

<form action="" id="adminForm" method="POST">
<?php //echo $selectGroup; ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php echo $message; ?> <!-- MESSAGE -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table <?php echo ucfirst($nameController); ?></h3>
              
              <?php echo $filter; ?> <!-- FILTER -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                        <th>
                          <div class="icheck-danger d-inline">
                            <input type="checkbox" id="checkboxDanger1">
                            <label for="checkboxDanger1">
                            </label>
                          </div>
                        </th>
                        <th><?php echo $lblID ?></th>
                        <th><?php echo $lblUserName ?> </th>
                        <th><?php echo $lblEmail ?> </th>
                        <th><?php echo $lblFullName ?> </th>
                        <th><?php echo $lblCreated ?></th>
                        <th><?php echo $lblOrdering ?></th>
                        <th><?php echo $lblStatus ?></th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $xhtml = '';
                    if (!empty($this->items)) {
                      foreach ($this->items as $key => $value) {
                        $status   = HTML::showStatus($value['status'],$value['id'],$this->arrParam['controller']);
                        $created  = HTML::dateFormat($value['created']);
                        $username = HTML::addSpan($value['username']);
                        $urlForm  = URL::createLink('admin',$nameController,'form',['id' => $value['id']]);
                        $urlDelete = URL::createLink('admin',$nameController,'delete',['id' => $value['id']]);
                        $xhtml .= '<tr>
                                    <td>
                                      <div class="icheck-danger d-inline">
                                      <input type="checkbox" id="'.$value['id'].'" name="multiDelete[]" value="'.$value['id'].'" onclick="chkBox(this);">
                                        <label for="'.$value['id'].'">
                                        </label>
                                      </div>
                                    </td>
                                    <td>'.$value['id'].'</td>
                                    <td>'.$username.'</td>
                                    <td>'.$value['email'].'</td>
                                    <td>'.$value['fullname'].'</td>
                                    <td>'.$created.'</td>
                                    <td>'.$value['ordering'].'</td>
                                    <td>'.$status.'</td>
                                    <td>
                                      <div class="action">
                                        <a href="'.$urlForm.'" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger" href="'.$urlDelete.'"><i class="fas fa-times"></i> Delete</a>
                                      </div>
                                    </td>
                                  </tr>';
                      } 
                    } else {
                      $xhtml = Helper::noData(9);
                    }
                    
                  echo $xhtml;
                  ?>       
                  </tbody>
              </table>
            </div><!-- /.card-body -->                  
        </div> <!-- /.card -->
      </div>
    </div>    <!-- end row -->
    <!-- PAGINATION -->
    <div class="row">
      <div class="col-md-12">
        <?php echo $pagination;?>
      </div>
    </div>
    <!-- END PAGINATION -->
  </div><!-- /.container-fluid -->
</section>
<?php echo $hiddenColumn.$hiddenColumnDir.$hiddenPage; ?>
</form>

