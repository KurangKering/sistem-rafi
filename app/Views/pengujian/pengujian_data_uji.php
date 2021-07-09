<?= $this->extend('top_layout') ?>

<?= $this->section('inline-css') ?>
<style>
	td {
		white-space: nowrap;
	}
	.card-header {
		padding: 0.4rem;
	}
	h4 {
		margin-bottom: 0px;
	}
	.tulisan {
		font-weight: 400;
		font-size: 1.25rem;
		margin: 0px;
	}
	#text-benar {
		color: green;
	}
	#text-salah {
		color: red;
	}

	#akurasi {
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
		color: blue;
		margin: 0px;
		padding: 0px;
	}

	#png-rumus {
		width: 100%;
		text-align: center;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Pengujian Data Uji</h1>
			</div><!-- /.col -->
			<div class="col-sm-6 text-right">
				<button type="button" class="btn btn-outline-primary" id="mulai_pengujian_data_uji_button">Mulai Pengujian</button>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">TABLE DATA UJI</h4>
						</div>
					</div>
					<div class="card-body">
						<table id="data_uji_table" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>kata</th>
									<th>kata stemmed</th>
									<th width="1%">Action</th>
								</tr>
							</thead>
							
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">HASIL DATA UJI</h4>
						</div>
					</div>
					<div class="card-body">
						<p class="text-center tulisan">Jumlah Data <span id="text-benar">BENAR</span> : <span id="total-benar"><?= $total_benar ?></span></p>
						<p class="text-center tulisan">Jumlah Data <span id="text-salah">SALAH</span> : <span id="total-salah"><?= $total_salah ?></span></p>
						<p class="text-center tulisan">Total Data Uji : <span id="total-uji"><?= $total_uji ?></span></p>
					</div>
				</div>
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">RUMUS TINGKAT AKURASI</h4>
						</div>
					</div>
					<div class="card-body">
						<img id="png-rumus" src="<?= base_url('images/rumus.png') ?>" alt="">
					</div>
				</div>
				<div class="card">
					<div class="card-header text-center bg-success text-white">
						<div class="d-flex align-items-center">
							<h4 class="mx-auto w-100">TINGKAT AKURASI </h4>
						</div>
					</div>
					<div class="card-body">
						<p id="akurasi"><span id="akurasi"><?= $akurasi ?></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade card card-primary" id="detail_pengujian_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h4 class="modal-title">Detail Stemming</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body card-body">
				<div id="content-hasil">
					
				</div>

			</div>
			<div class="modal-footer  card-footer">


			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<template id="render-action-button-template">
	<button type="button" class="btn  btn-outline-primary" onclick="show_detail_pengujian('place_here')"><i class="fas fa-list"></i> Detail</button>
</template>
<?= $this->endSection() ?>

<?= $this->section('inline-js') ?>
<script>
	$(function() {

		

		$("#data_uji_form").submit(function(e) {
			e.preventDefault();

			let form_data = {
				id: $("#id").val(),
				kata: $("#kata").val(),
				arti_kata: $("#arti_kata").val(),
			};

			$.ajax({
				url: '<?= base_url("data-uji/create_or_update") ?>',
				type: 'POST',
				data: form_data,
			})
			.done(function(response) {
				if (!response.success) {

				} else {
					clearKataDasarForm();
					data_uji_table.ajax.reload();
					$("#detail_pengujian_modal").modal('hide');
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		$("#mulai_pengujian_data_uji_button").click(function(e) {
			$.ajax({
				url: '<?= base_url("pengujian/proses_pengujian_data_uji") ?>',
				type: 'POST',
			})
			.done(function(response) {
				if (!response.success) {

				} else {
					$("#total-benar").text(response.total_benar);
					$("#total-salah").text(response.total_salah);
					$("#akurasi").text(response.akurasi);
					data_uji_table.ajax.reload(null, false);
					Swal.fire({icon: 'success', showConfirmButton: false, timer: 1000})
					
					
				}
			});
			
		});

		let data_uji_table = $("#data_uji_table").DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": "<?= base_url('pengujian/show_all_data_uji_menu_pengujian') ?>",
			"columns": [
			{ "data": "id" },
			{ "data": "kata" },
			{ "data": "kata_stemmed" },
			{ "data": null },
			],
			"columnDefs": [
			{
				"targets": 2,
				"data": null,
				"render" : function(data, type, row) {
					text_color = 'red';

					if (row['ketemu'] == 1) {
						text_color = 'lime';
					} else if (row['ketemu'] == 0 ) {
						text_color = 'green';

					}

					output = '<span style="color: '+text_color+';">'+row['kata_stemmed']+'</span>';
					return output;	
				}
			} ,
			{
				"targets": -1,
				"data": null,
				"render" : function(data, type, row) {
					return render_action_button(row['kata']);
				}
			} ],

		});
	});



	function clearKataDasarForm() {
		$("#kata").val('');
		$("#arti_kata").val('');
		$("#id").val('');
	}

	function show_tambah_kata_dasar_modal() {
		clearKataDasarForm();
		$("#detail_pengujian_modal").modal('show');
	}

	function show_delete_kata_dasar_modal(id) {

	}
	function show_detail_pengujian(input_kata) {


		$.ajax({
			url: '<?= base_url("pengujian/proses_pengujian_tunggal") ?>',
			type: 'POST',
			data: {data_uji: input_kata},
		})
		.done(function(response) {
			if (!response.success) {


			} else {
				makeOutputPengujianTunggal(response.data.hasil_data_uji, "#content-hasil");

				$("#detail_pengujian_modal").modal('show');
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function render_action_button(input_kata) {
		let tmpl = $("#render-action-button-template").html();
		tmpl = tmpl.replace('place_here', input_kata);

		return tmpl;
	}
</script>
<?= $this->endSection() ?>