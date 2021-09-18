
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<title>Stemmer Rafi</title>

	<?= $this->include('base_css') ?>  
	<style>
		.btn-edit {
			margin-right:  7px;
		}
	</style>
	
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a href="<?= base_url('/') ?>" class="navbar-brand">
					<img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">STEMMER BAHASA GAYO</span>
				</a>

				<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse order-3" id="navbarCollapse">
					<!-- Left navbar links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="<?= base_url('/') ?>" class="nav-link">Home</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('kata-dasar') ?>" class="nav-link">Data Kata Dasar</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('data-uji') ?>" class="nav-link">Data Uji</a>
						</li>

						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pengujian</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a href="<?= base_url('pengujian/pengujian_data_uji') ?>" class="dropdown-item">Pengujian data uji</a></li>
								<li><a href="<?= base_url('pengujian/pengujian_tunggal') ?>" class="dropdown-item">Pengujian tunggal</a></li>

							</ul>
						</li>
					</ul>


				</div>


			</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?= $this->renderSection('content') ?>

		</div>
		<!-- /.content-wrapper -->


		
	</div>
	<!-- ./wrapper -->

	<?= $this->include('base_js') ?>  
</body>
</html>
