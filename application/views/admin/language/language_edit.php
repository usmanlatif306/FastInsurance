<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Edit Language</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/languages'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Languages List</a>
          <a href="<?= base_url('admin/languages/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Language</a>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Language</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/languages/edit/'.$language['id']), 'class="form-horizontal"' )?>
          <div class="form-group">
            <label for="group_name" class="col-sm-3 control-label">Display Name</label>

            <div class="col-sm-9">
              <input type="text" name="display_name" value="<?=$language['display_name']?>" class="form-control" id="group_name" placeholder="e.g., English">
            </div>
          </div>

          <div class="form-group">
            <label for="group_name" class="col-sm-3 control-label">Directory Name</label>

            <div class="col-sm-9">
              <input type="text" name="directory_name" value="<?=$language['directory_name']?>" class="form-control" id="group_name" placeholder="e.g., english">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-11">
              <input type="submit" name="submit" value="Update Language" class="btn btn-info pull-right">
            </div>
          </div>

            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


 <script>
    $("#languages").addClass('active');
  </script>