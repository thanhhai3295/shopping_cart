<?php 
  $filter_status = $this->arrParam['filter_status'] ?? '';
?>
<form action="" method="POST">
<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title f-w-600" id="filterLabel">Filter</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">				
        <div class="form needs-validation">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10 filter-status">									
              <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                <label class="d-block" for="rdoAll">
                  <input class="radio_animated" id="rdoAll" type="radio" name="filter_status" checked="checked" value="">All
                </label>
                <label class="d-block" for="rdoActive">
                  <input class="radio_animated" id="rdoActive" type="radio" name="filter_status" value="active" <?php 
                    if($filter_status == 'active') echo 'checked="checked"';
                  ?> >Active
                </label>
                <label class="d-block" for="rdoInactive">
                  <input class="radio_animated" id="rdoInactive" type="radio" name="filter_status" value="inactive" <?php 
                    if($filter_status == 'inactive') echo 'checked="checked"';
                  ?> >Inactive
                </label>
              </div>
            </div>
          </div>																	
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="submit">Close</button>
      </div>
    </div>
  </div>
</div>
</form>