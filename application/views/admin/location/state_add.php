<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body with-border">
        <div class="col-md-6">
          <h4><i class="fa fa-plus"></i> &nbsp; Add New State</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/location/state'); ?>" class="btn btn-success"><i class="fa fa-list"></i> State List</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box border-top-solid">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
            <?php echo validation_errors(); ?>           
            <?php echo form_open(base_url('admin/location/state/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Country</label>
                <div class="col-sm-7">
                  <select class="form-control" required name="country">
                   <option>Select Country</option>
                    <?php foreach($countries as $country):?>
                      <?php if($job_detail['country'] == $country['id']): ?>
                      <option value="<?= $country['id']; ?>" selected> <?= $country['name']; ?> </option>
                    <?php else: ?>
                      <option value="<?= $country['id']; ?>"> <?= $country['name']; ?> </option>
                  <?php endif; endforeach; ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">State Name</label>
                <div class="col-sm-7">
                  <input type="text" name="state" class="form-control" id="name" placeholder="State name" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-10">
                  <input type="submit" name="submit" value="Add State" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<script>
  $("#country").addClass('active');
  </script>