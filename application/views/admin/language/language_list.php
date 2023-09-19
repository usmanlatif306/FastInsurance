  
 <section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Languages List</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/languages/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Language</a>
        </div>
        
      </div>
    </div>
  </div>

   <div class="row">
     <div class="col-lg-12">
       <div class="box box-body">
       <div class="col-md-6">
         <strong>Default Language:</strong>
       </div>

       <div class="col-md-4">
         <div class="form-group">
           <?php echo form_open(base_url('admin/languages/set_default'), 'class="form-horizontal"');  ?>
         <select class="form-control" name="default_lang_id">
           <?php foreach($all_languages as $language):?>
             <?php if($language['is_default']): ?>
               <option value="<?= $language['id']; ?>" selected> <?= $language['display_name']; ?> </option>
             <?php else: ?>
               <option value="<?= $language['id']; ?>"> <?= $language['display_name']; ?> </option>
             <?php endif; endforeach; ?>
         </select>
         </div>
       </div>

       <div class="col-md-2 text-right">
         <input type="submit" name="submit" value="Set Default" class="btn btn-info pull-right">
       </div>

         <?php echo form_close( ); ?>

       </div>
     </div>
   </div>

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Display Name</th>
          <th>Directory Name</th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
          <?php $count=0; foreach($all_languages as $row):?>
          <tr>
            <td><?= $row['display_name']; ?></td>
            <td><?= $row['directory_name']; ?></td>
            <td><a title="Delete" class="btn-delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('admin/languages/del/'.$row['id']); ?>" > <i class="fa fa-trash-o"></i></a>
            <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('admin/languages/edit/'.$row['id'])?>"> <i class="fa fa-pencil-square-o"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


  <!-- Scripts for this page -->
  <!-- Scripts for this page -->
  <script type="text/javascript">
     $(document).ready(function(){
      $(".btn-delete").click(function(){
        if (!confirm("Do you want to delete")){
          return false;
        }
      });
    });
  </script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>

  <script>
    $("#misc").addClass('active');
  </script>

