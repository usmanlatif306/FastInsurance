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
					<h4><i class="fa fa-plus"></i> &nbsp; Update SEO</h4>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= base_url('admin/settings/seo'); ?>" class="btn btn-success"><i class="fa fa-list"></i> SEO Pages</a>

				</div>
			</div>
		</div>
	</div>



	<div class="row">

		<?php echo form_open(base_url('admin/settings/seo/update/' . $slug)); ?>

		<div class="col-md-12">

			<div class="box">

				<div class="box-header with-border">

					<h3 class="box-title">Page SEO Detail</h3>

				</div>

				<!-- /.box-header -->

				<!-- form start -->

				<div class="box-body my-form-body">

					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" name="title" class="form-control" id="title" value="<?= $page['title']; ?>" placeholder="Page title" required>
					</div>

					<div class="form-group">
						<label for="meta_description" class="control-label">Meta Description</label>
						<textarea name="meta_description" class="textarea form-control" id="details" value="" placeholder="Page meta description" required rows="10"><?= $page['meta_description']; ?></textarea>
					</div>

					<div class="form-group">
						<label for="keywords" class="control-label">Keywords</label>
						<input type="text" name="keywords" class="form-control" id="title" value="<?= $page['keywords']; ?>" placeholder="Page keywords with comma(,) seprator" required>
					</div>

				</div>

				<!-- /.box-body -->

			</div>

		</div>

		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<input type="submit" name="submit" value="Update SEO" class="btn btn-primary pull-right">
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>

</section>