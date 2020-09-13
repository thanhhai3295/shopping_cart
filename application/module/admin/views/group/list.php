<?php 
	$columnPost		= $this->arrParam['filter_column'] ?? '';
	$orderPost		= $this->arrParam['filter_column_dir'] ?? '';
	$lblID      	= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
	$lblName    	= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
	$lblCreated 	= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
	$lblOrdering 	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
	$lblStatus  	= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
	$filter       = Helper::createFilter($this->arrParam,$this->countStatus);
	$pagination   = $this->pagination->showPagination(true);
	$hiddenColumn    = Helper::cmsInput('hidden','filter_column','id');
	$hiddenColumnDir = Helper::cmsInput('hidden','filter_column_dir',$this->arrParam['filter_column_dir']??'');
	$hiddenPage      = Helper::cmsInput('hidden','filter_page','1');
	Helper::createMessage();
	$data = ['name','ordering','status'];
	$data = json_encode($data); 
	$url = URL::createLink('admin','group','form');
?>

<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-lg-6">
				<div class="page-header-left">
					<h3>GROUP
							<small>Multikart Admin panel</small>
					</h3>
				</div>
			</div>
			<?php include 'elements/breadcrumb.php' ?>
		</div>
	</div>
</div>

<div class="container-fluid">
  <div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
						<h5>Group List</h5>
				</div>
				<div class="card-body">
					<div class="btn-popup pull-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter">Filter</button>
							<?php include 'elements/filter.php' ?>
					</div>
					<div class="table-responsive">
					<div id="basicScenario" class="product-physical jsgrid" style="position: relative; height: auto; width: 100%;">
						<?php include 'elements/tableHeader.php' ?>
						<?php include 'form.php' ?>
						<div class="jsgrid-grid-body">
								<table class="jsgrid-table">
									<tbody class="data">
											<?php 
												$xhtml = '';
												foreach ($this->items as $key => $value) {
													$checked = ($value['status'] == 'active') ? 'checked' : '';
													$id = $value['id'];
													$status = $value['status'];
													$linkStatus = URL::createLink('admin','group','status',['id' => $id,'st' => $status]);
													$url = URL::createLink('admin','group','form',['id' => $id]);
													$jsFunction = "onclick=edit($data,'$url',$id)";
													$xhtml .= '<tr class="jsgrid-row">
																		<td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><img src="public/template/admin/multicart/images/dashboard/product/1.jpg" class="blur-up lazyloaded" style="height: 50px; width: 50px;"></td>
																		<td class="jsgrid-cell" style="width: 100px;">'.$value['name'].'</td>			<td class="jsgrid-cell" style="width: 50px;">'.$value['ordering'].'</td>			
																		<td class="jsgrid-cell" style="width: 50px;" onClick="changeStatus(event,\''.$linkStatus.'\');"><input type="checkbox" data-toggle="switchbutton" '.$checked.' data-onlabel="Active&nbsp;&nbsp;" data-offlabel="&nbsp;&nbsp;Inactive" data-onstyle="primary" data-offstyle="danger"></td>
																		<td class="jsgrid-cell" style="width: 50px;">'.$value['created'].'</td>
																		<td class="jsgrid-cell" style="width: 50px;">'.$value['modified'].'</td>
																		<td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit" data-toggle="modal" data-target="#form" '.$jsFunction.'><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></td>
																	</tr>';
												}
												echo $xhtml;
											?>
									</tbody>
								</table>
						</div>
						<div class="jsgrid-pager-container" style="">
								<?php include 'elements/pagination.php' ?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
</div>
<input type="hidden" id="id" name="id">