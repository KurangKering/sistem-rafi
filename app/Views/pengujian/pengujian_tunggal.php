<?= $this->extend('top_layout') ?>
<?= $this->section('inline-css') ?>

<style> 
	.card-header {
		padding: 0.4rem;
	}
	h4 {
		margin-bottom: 0px;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Pengujian</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container">
		<div class="row">
			
			<div class="col-md-7 col-sm-12">
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">INPUT KATA BERIMBUHAN</h4>
						</div>
					</div>
					
					<div class="card-body">
						<form id="pengujian_form" method="POST">
							<div class="form-group">
								<label for="data_uji">Inputan</label>
								<input name="data_uji" id="data_uji"  class="form-control">

							</div>
							<button type="submit" class="btn btn-primary">Stem !</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">HASIL STEMMING</h4>
						</div>
					</div>
					<div class="card-body">
						<div id="content-hasil">
							
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
	$(function() {

		$("#pengujian_form").submit(function(e) {
			e.preventDefault();

			let form_data = {
				data_uji: $("#data_uji").val(),
			};

			$.ajax({
				url: '<?= base_url("pengujian/proses_pengujian_tunggal") ?>',
				type: 'POST',
				data: form_data,
			})
			.done(function(response) {
				if (!response.success) {

				} else {

					makeOutputPengujianTunggal(response.data.hasil_data_uji, "#content-hasil");

				}
			});
			
		});


	});

	
	function showTambahKataModal() {
		alert('welcome');
	}

	function render_edit_delete_button(id) {
		var button_edit = '<button type="button" class="show_modal_edit btn btn-warning" data-id="'+id+'">Edit</button>';
		var button_delete = '<button type="button" class="show_modal_delete btn btn-danger" data-id="'+id+'">Delete</button>';
		html = button_edit + " "+ button_delete;
		return html
	}
</script>
<?= $this->endSection() ?>