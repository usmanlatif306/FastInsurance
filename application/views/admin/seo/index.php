<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> <strong>
						<?= $this->session->flashdata('success') ?>
					</strong>
				</div>
			<?php endif; ?>
		</div>

		<div class="col-md-12">
			<div class="box box-body">
				<div class="col-md-6">
					<h4><i class="fa fa-list"></i> &nbsp; SEO Pages</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<section class="panel">
				<div class="panel-body">
					<div class="adv-table">
						<table class="mv_datatable display table table-bordered table-striped">
							<thead>
								<tr>
									<th> #</th>
									<th>Page</th>
									<th>Page Url</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pages as $index => $page) : ?>
									<tr>
										<td><?= $index + 1; ?></td>
										<td><?= $page['page']; ?></td>
										<td><?= $page['slug'] === 'homepage' ? base_url() : base_url()  . $page['slug']; ?></td>
										<td>
											<a class="edit btn btn-xs btn-primary" href="<?= base_url("admin/settings/seo/" . $page['slug'] . '/edit'); ?>" title="View">
												<i class="fa fa-eye"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</section>
		</div>
	</div>
</section>