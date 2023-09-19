<?php
$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?= ucwords($this->session->userdata('name')); ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li id="dashboard" class="treeview">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id="dashboard"><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li id="admin" class="treeview">
				<a href="#">
					<i class="fa fa-user"></i> <span>Admin</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/profile'); ?>"><i class="fa fa-circle-o"></i>Admin Profile</a></li>
					<li id=""><a href="<?= base_url('admin/profile/change_pwd'); ?>"><i class="fa fa-circle-o"></i>Change Password</a></li>
				</ul>
			</li>
		</ul>

		<!-- <ul class="sidebar-menu">
			<li id="users" class="treeview">
				<a href="#">
					<i class="fa fa-users"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i>Users List</a></li>
					<li id="user_add"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i>Add New Users</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="employer" class="treeview">
				<a href="#">
					<i class="fa fa-user-circle"></i> <span>Employers/ Company</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/employer'); ?>"><i class="fa fa-circle-o"></i>Employers List</a></li>
					<li id=""><a href="<?= base_url('admin/employer/add'); ?>"><i class="fa fa-circle-o"></i>Add New Employer</a></li>
				</ul>
			</li>
		</ul> -->

		<ul class="sidebar-menu">
			<li id="job" class="treeview">
				<a href="#">
					<i class="fa fa-file-text"></i> <span>Insurance Posting</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/insurances'); ?>"><i class="fa fa-circle-o"></i>View Insurances</a></li>
					<!-- <li id=""><a href="<?= base_url('admin/job/post'); ?>"><i class="fa fa-circle-o"></i>Add New Job</a></li> -->
				</ul>
			</li>
		</ul>

		<!-- <ul class="sidebar-menu">
			<li id="job" class="treeview">
				<a href="#">
					<i class="fa fa-file-text"></i> <span>Jobs Posting</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/job'); ?>"><i class="fa fa-circle-o"></i>View Jobs</a></li>
					<li id=""><a href="<?= base_url('admin/job/post'); ?>"><i class="fa fa-circle-o"></i>Add New Job</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="category" class="treeview">
				<a href="#">
					<i class="fa fa-bars"></i> <span>Categories</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?= base_url('admin/category'); ?>"><i class="fa fa-circle-o"></i>Category</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="industry" class="treeview">
				<a href="#">
					<i class="fa fa-industry "></i> <span>Industry</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?= base_url('admin/industry'); ?>"><i class="fa fa-circle-o"></i>Industry</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="location" class="treeview">
				<a href="#">
					<i class="fa fa-map-marker "></i> <span>Manage Locations</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?= base_url('admin/location'); ?>"><i class="fa fa-circle-o"></i>country</a></li>
					<li class=""><a href="<?= base_url('admin/location/state'); ?>"><i class="fa fa-circle-o"></i>state</a></li>
					<li class=""><a href="<?= base_url('admin/location/city'); ?>"><i class="fa fa-circle-o"></i>city</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="pages" class="treeview">
				<a href="#">
					<i class="fa fa-file-o"></i> <span>Pages</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/pages'); ?>"><i class="fa fa-circle-o"></i>Pages</a></li>
					<li id=""><a href="<?= base_url('admin/pages/add'); ?>"><i class="fa fa-circle-o"></i>Add new page</a></li>
				</ul>
			</li>
		</ul> -->

		<!-- <ul class="sidebar-menu">
			<li id="blog" class="treeview">
				<a href="#">
					<i class="fa fa-file-text"></i> <span>Blog</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/blog'); ?>"><i class="fa fa-circle-o"></i>Posts</a></li>
					<li id=""><a href="<?= base_url('admin/blog/category'); ?>"><i class="fa fa-circle-o"></i>Category</a></li>
				</ul>
			</li>
		</ul> -->

		<ul class="sidebar-menu">
			<li id="payment" class="treeview">
				<a href="#">
					<i class="fa fa-money"></i> <span>Payment</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/payment'); ?>"><i class="fa fa-circle-o"></i>View Payments</a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li id="newsletter" class="treeview">
				<a href="#">
					<i class="fa fa-envelope"></i> <span>Newsletters</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/newsletter'); ?>"><i class="fa fa-circle-o"></i>View Subscribers</a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li id="testimonial" class="treeview">
				<a href="#">
					<i class="fa fa-users"></i> <span>Testimonials</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/testimonial'); ?>"><i class="fa fa-circle-o"></i>View Testimonials</a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li id="contact" class="treeview">
				<a href="#">
					<i class="fa fa-envelope"></i> <span>Contact Queries</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id=""><a href="<?= base_url('admin/contact'); ?>"><i class="fa fa-circle-o"></i>View Queries</a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li class="header">Insurance Variants</li>
			<li id="packages" class="treeview">
				<a href="#">
					<i class="fa fa-bars"></i> <span>Variants</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?= base_url('admin/packages'); ?>"><i class="fa fa-circle-o"></i>Packages List</a></li>
					<li class=""><a href="<?= base_url('admin/packages/add'); ?>"><i class="fa fa-circle-o"></i>Add New Package</a></li>
				</ul>
			</li>
		</ul>

		<!-- <ul class="sidebar-menu">
			<li class="header">JOB ATTRIBUTES</li>
			<li id=""><a href="<?= base_url('admin/job_type'); ?>"><i class="fa fa-circle-o"></i>Job Type</a></li>
			<li id=""><a href="<?= base_url('admin/education'); ?>"><i class="fa fa-circle-o"></i>Education</a></li>
			<li id=""><a href="<?= base_url('admin/employment'); ?>"><i class="fa fa-circle-o"></i>Employment Type</a></li>
		</ul> -->

		<ul class="sidebar-menu">
			<li class="header">BACKUP</li>
			<li id="export" class="treeview">
				<a href="#">
					<i class="fa fa-life-ring"></i> <span>Backup & Export</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class=""><a href="<?= base_url('admin/export'); ?>"><i class="fa fa-circle-o"></i> Database Backup </a></li>
				</ul>
			</li>
		</ul>

		<ul class="sidebar-menu">
			<li class="header">SETTING</li>
			<li id="setting" class="treeview">
				<a href="<?= base_url('admin/general_settings'); ?>">
					<i class="fa fa-cogs"></i> <span>General Settings</span>
				</a>
			</li>
			<li id="setting" class="treeview">
				<a href="<?= base_url('admin/settings/seo'); ?>">
					<i class="fa fa-cogs"></i> <span>SEO Settings</span>
				</a>
			</li>
			<!-- <li id="template" class="treeview">
				<a href="<?= base_url('admin/general_settings/email_templates'); ?>">
					<i class="fa fa-cogs"></i> <span>Email Templates Settings</span>
				</a>
			</li> -->
			<!-- <li id="languages" class="treeview">
				<a href="<?= base_url('admin/languages'); ?>">
					<i class="fa fa-cogs"></i> <span>Language Settings</span>
				</a>
			</li> -->
		</ul>

		<ul class="sidebar-menu">
			<li id="ui" class="treeview">
				<a href="#">
					<i class="fa fa-laptop"></i> <span>UI Components</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li id="general"><a href="<?= base_url('admin/ui/general'); ?>"><i class="fa fa-circle-o"></i> General</a></li>
					<li id="widgets"><a href="<?= base_url('admin/ui/widgets'); ?>"><i class="fa fa-circle-o"></i> Widgets</a></li>
					<li id="icons"><a href="<?= base_url('admin/ui/icons'); ?>"><i class="fa fa-circle-o"></i> Icons</a></li>
					<li id="buttons"><a href="<?= base_url('admin/ui/buttons'); ?>"><i class="fa fa-circle-o"></i> Buttons</a></li>
					<li id="sliders"><a href="<?= base_url('admin/ui/sliders'); ?>"><i class="fa fa-circle-o"></i> Sliders</a></li>
					<li id="timeline"><a href="<?= base_url('admin/ui/timeline'); ?>"><i class="fa fa-circle-o"></i> Timeline</a></li>
					<li id="modals"><a href="<?= base_url('admin/ui/modals'); ?>"><i class="fa fa-circle-o"></i> Modals</a></li>
				</ul>
			</li>
		</ul>

	</section>
	<!-- /.sidebar -->
</aside>


<script>
	$("#<?= $cur_tab ?>").addClass('active');
</script>