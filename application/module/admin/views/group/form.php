<form action="" method="POST" id="mainForm">
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title f-w-600" id="filterLabel">Form</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">				
        <div class="form needs-validation">
          <div class="form-group">
              <label for="validationCustom01" class="mb-1">Name :</label>
              <input class="form-control" type="text" name="name" id="name">
              <p class="text-danger"></p>
          </div>
          <div class="form-group">
              <label for="validationCustom01" class="mb-1">Ordering Name :</label>
              <input class="form-control" type="number" name="ordering" id="ordering">
              <p class="text-danger"></p>
          </div>			
          <div class="form-group">
              <label for="validationCustom01" class="mb-1">Status</label>
              <select class="custom-select" name="status" id="status">
                <option value="default">-- Choose Status --</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              <p class="text-danger"></p>
          </div>																
        </div>
      </div>
      <div class="modal-footer">
      <?php 
        $funct = "onclick=process($data,'$url')";
      ?>
        <button class="btn btn-primary" id="btnForm" type="button" <?php echo $funct ?> >Add</button>
        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close" type="button">Close</button>
      </div>
    </div>
  </div>
</div>
</form>