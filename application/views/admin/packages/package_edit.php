<!-- bootstrap datepicker -->

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<section class="content">

	<div class="row">

		<div class="col-md-12">

			<?php if (isset($msg) || validation_errors() !== '') : ?>

				<div class="alert alert-warning alert-dismissible">

					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

					<h4><i class="icon fa fa-warning"></i> Alert!</h4>

					<?= validation_errors(); ?>

					<?= isset($msg) ? $msg : ''; ?>

				</div>

			<?php endif; ?>

		</div>

	</div>





	<div class="row">

		<div class="col-md-12">

			<div class="box box-body">

				<div class="col-md-6">

					<h4><i class="fa fa-plus"></i> &nbsp; Update Package</h4>

				</div>

				<div class="col-md-6 text-right">

					<a href="<?= base_url('admin/packages'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Package List</a>

				</div>



			</div>

		</div>

	</div>



	<div class="row">

		<?php echo form_open(base_url('admin/packages/edit/' . $package['id'])); ?>

		<div class="col-md-12">

			<div class="box">

				<div class="box-header with-border">

					<h3 class="box-title">Package Detail</h3>

				</div>

				<!-- /.box-header -->

				<!-- form start -->

				<div class="box-body my-form-body">



					<div class="form-group">

						<label for="title" class="control-label">Package Name</label>

						<input type="text" name="title" class="form-control" id="title" value="<?= $package['title']; ?>" placeholder="eg. basic, premium" required>

					</div>



					<div class="form-group">

						<label for="days" class="control-label">Price</label>

						<input type="price" name="price" class="form-control" id="" value="<?= $package['price']; ?>" placeholder="" required>

					</div>


					<!-- <div class="form-group">

              <label for="posts" class="control-label">No of Posts</label>

              <input type="number" name="no_of_posts" class="form-control" id="" value="<?= $package['no_of_posts']; ?>" placeholder="" required>

            </div> -->



					<!-- <div class="form-group">

						<label for="package_for" class="control-label">Package Type</label>

						<select name="package_for" class="form-control">

							<option value="0" <?= ($package['package_for'] == 0) ? 'selected' : '' ?>>JobSeeker</option>

							<option value="1" <?= ($package['package_for'] == 1) ? 'selected' : '' ?>>Employer</option>

						</select>

					</div> -->


					<div class="form-group">
						<label for="posts" class="control-label">Package Detail</label>
						<textarea name="detail" class="textarea form-control" id="details" value="" placeholder="" required rows="10"><?= $package['detail']; ?></textarea>
					</div>

					<div class="form-group">

						<label for="posts" class="control-label">Sort Order</label>

						<input type="number" name="sort_order" class="form-control" id="" value="<?= $package['sort_order']; ?>" placeholder="">

					</div>


					<div class="form-group">

						<label for="status" class="control-label">Status</label>

						<select name="status" class="form-control">

							<option value="1">Active</option>

							<option value="0">Inactive</option>

						</select>

					</div>



				</div>

				<!-- /.box-body -->

			</div>

		</div>



		<div class="col-md-12">

			<div class="box">

				<div class="box-body">

					<input type="submit" name="submit" value="Update Package" class="btn btn-primary pull-right">

				</div>

			</div>

		</div>

		<?php echo form_close(); ?>
	</div>

</section>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
	$(function() {
		// bootstrap WYSIHTML5 - text editor
		$('.textarea').wysihtml5({
			toolbar: {
				fa: true
			}
		});
	})
</script>
<script>
	$('#packages').addClass('active');
</script>