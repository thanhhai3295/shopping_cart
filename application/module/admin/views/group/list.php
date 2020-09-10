<?php 
  $columnPost		= $this->arrParam['filter_column'] ?? '';
	$orderPost		= $this->arrParam['filter_column_dir'] ?? '';
  $lblID      	= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
  $lblName    	= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
  $lblCreated 	= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
  $lblOrdering 	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
  $lblStatus  	= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
  $message      = Helper::createMessage();
  $filter       = Helper::createFilter($this->arrParam,$this->countStatus);
  $pagination   = $this->pagination->showPagination(true);
  $hiddenColumn    = Helper::cmsInput('hidden','filter_column','id');
  $hiddenColumnDir = Helper::cmsInput('hidden','filter_column_dir',$this->arrParam['filter_column_dir']??'');
  $hiddenPage      = Helper::cmsInput('hidden','filter_page','1');

?>

<div class="container-fluid">
  <div class="page-header">
      <div class="row">
          <div class="col-lg-6">
              <div class="page-header-left">
                  <h3>Category
                      <small>Multikart Admin panel</small>
                  </h3>
              </div>
          </div>
          <div class="col-lg-6">
              <ol class="breadcrumb pull-right">
                  <li class="breadcrumb-item"><a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                  <li class="breadcrumb-item">Physical</li>
                  <li class="breadcrumb-item active">Category</li>
              </ol>
          </div>
      </div>
  </div>
</div>


<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h5>Products Category</h5>
              </div>
              <div class="card-body">
                  <div class="btn-popup pull-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Category</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="needs-validation">
                                          <div class="form">
                                              <div class="form-group">
                                                  <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                  <input class="form-control" id="validationCustom01" type="text">
                                              </div>
                                              <div class="form-group mb-0">
                                                  <label for="validationCustom02" class="mb-1">Category Image :</label>
                                                  <input class="form-control" id="validationCustom02" type="file">
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  <div class="modal-footer">
                                      <button class="btn btn-primary" type="button">Save</button>
                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="table-responsive">
                  <div id="basicScenario" class="product-physical jsgrid" style="position: relative; height: auto; width: 100%;">
                    <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                        <table class="jsgrid-table">
                          <tr class="jsgrid-header-row">
                              <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Image</th>
                              <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Name</th>
                              <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">Price</th>
                              <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Status</th>
                              <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Category</th>
                              <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Switch to inserting"></th>
                          </tr>
                          <tr class="jsgrid-filter-row" style="display: table-row;">
                              <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"></td>
                              <td class="jsgrid-cell" style="width: 100px;"><input type="text"></td>
                              <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;"><input type="number"></td>
                              <td class="jsgrid-cell" style="width: 50px;"><input type="text"></td>
                              <td class="jsgrid-cell" style="width: 50px;"><input type="text"></td>
                              <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-search-button" type="button" title="Search"><input class="jsgrid-button jsgrid-clear-filter-button" type="button" title="Clear filter"></td>
                          </tr>
                          <tr class="jsgrid-insert-row" style="display: none;">
                              <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><input type="file"></td>
                              <td class="jsgrid-cell" style="width: 100px;"><input type="text"></td>
                              <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;"><input type="number"></td>
                              <td class="jsgrid-cell" style="width: 50px;"><input type="text"></td>
                              <td class="jsgrid-cell" style="width: 50px;"><input type="text"></td>
                              <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-insert-button" type="button" title="Insert"></td>
                          </tr>
                        </table>
                    </div>
                    <div class="jsgrid-grid-body">
                        <table class="jsgrid-table">
                          <tbody>
                              <tr class="jsgrid-row">
                                <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><img src="public/template/admin/multicart/images/dashboard/product/1.jpg" class="blur-up lazyloaded" style="height: 50px; width: 50px;"></td>
                                <td class="jsgrid-cell" style="width: 100px;">Headphones</td>
                                <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">$20.00</td>
                                <td class="jsgrid-cell" style="width: 50px;"><i class="fa fa-circle font-success f-12"></i></td>
                                <td class="jsgrid-cell" style="width: 50px;">Electronics</td>
                                <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></td>
                              </tr>
                              
                             
                          </tbody>
                        </table>
                    </div>
                    <div class="jsgrid-pager-container" style="">
                        <div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span> <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 2 </div>
                    </div>
                    <div class="jsgrid-load-shader" style="display: none; position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: 1000;"></div>
                    <div class="jsgrid-load-panel" style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>