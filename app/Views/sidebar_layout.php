
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stemmer Bahasa Gayo</title>

	<?= $this->include('base_css') ?>  
	
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="<?= base_url('#') ?>" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">

			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url('index3.html') ?>" class="brand-link">
				<img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
          	
          	<li class="nav-item">
          		<a href="<?= base_url('kata-dasar') ?>" class="nav-link">
          			<i class="far fa-circle nav-icon"></i>
          			<p>Data Kata Dasar</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="<?= base_url('data-uji') ?>" class="nav-link">
          			<i class="far fa-circle nav-icon"></i>
          			<p>Data Uji</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="<?= base_url('pengujian') ?>" class="nav-link">
          			<i class="far fa-circle nav-icon"></i>
          			<p>Pengujian</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="#" class="nav-link">
          			<i class="far fa-circle nav-icon"></i>
          			<p>
          				Pengujian
          				<i class="fas fa-angle-left right"></i>
          			</p>
          		</a>
          		<ul class="nav nav-treeview">
          			<li class="nav-item">
          				<a href="<?= base_url('pengujian/pengujian_data_uji') ?>" class="nav-link">
          					<i class="far fa-circle nav-icon"></i>
          					<p>Pengujian data uji</p>
          				</a>
          			</li>
          			<li class="nav-item">
          				<a href="<?= base_url('pengujian/pengujian_tunggal') ?>" class="nav-link">
          					<i class="far fa-circle nav-icon"></i>
          					<p>Pengujian tunggal</p>
          				</a>
          			</li>
          		</ul>
          	</li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?= $this->renderSection('content') ?>
</div>
<!-- /.content-wrapper -->


<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Anything you want
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2014-2021 <a href="<?= base_url('#') ?>">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<?= $this->include('base_js') ?>  

</body>
</html>
