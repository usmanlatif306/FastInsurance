 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">   
  
 <section class="content">
   <div class="row">
    <div class="col-md-12">
       <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Job Cities</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/location/city/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New City</a>
        </div>
        
      </div>
    </div>
  </div>

   <div class="box border-top-solid">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="na_datatable" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>State Name</th>
          <th>City Name</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Action</th>
        </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/location/city_datatable_json')?>",
      "order": [[1,'asc']],
      "columnDefs": [
        { "targets": 0, "name": "", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "state_id", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "name", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "status", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "action", 'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });
  </script>
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
  <script>
  $("#country").addClass('active');
  </script>

