<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

<?= $this->renderSection('import-js') ?>

<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>

<?= $this->renderSection('inline-js') ?>
<script>
	function htmlInput(kata) {
		return `<p>Kata inputan: <b>${kata}</b></p>`;
	}

	function htmlCekKamus(kata) {
		return `<p>Proses cek kamus: <b>${kata}</b></p>`;
	}

	function htmlAdaTidakAdaDiKamus(kata) {
		return `<p>Kata <b>${kata}</b> di kamus</p>`;
	}


	function makeOutputPengujianTunggal(arr, el) {
		$(el).html("");


		let html_inputan =  htmlInput(arr.input);

		$(el).append(html_inputan);

		let html_cek =  htmlCekKamus(arr.input);

		$(el).append(html_cek);

		let cek_kamus_pertama = 'Tidak ada';
		if (arr.rules.length == 0 && arr.ketemu == true) {
			cek_kamus_pertama = 'Ada';
		}  
		let html_hasil_cek_pertama =  htmlAdaTidakAdaDiKamus(cek_kamus_pertama);

		$(el).append(html_hasil_cek_pertama);

		for (var i = 0; i < arr.rules.length; i++) {
			let status = 'Tidak ada';
			if (i == (arr.rules.length - 1) && arr.ketemu == true) {
				status = 'ada';
			}
			let input = arr.rules[i].subject;
			let rule = arr.rules[i].affixType[0] + " " + arr.rules[i].affixType[1];
			let result = arr.rules[i].result;

			let html_proses_cek =  `<p>Proses cek kata : <b>${input}</b></p>`;
			$(el).append(html_proses_cek);

			let html_proses_rule =  `<p>Rule: <b>${rule}</b>, Hasil: <b>${result}</b></p>`;
			$(el).append(html_proses_rule);

			let html_cek_kamus =  htmlCekKamus(result);
			$(el).append(html_cek_kamus);

			let html_hasil =  htmlAdaTidakAdaDiKamus(status);
			$(el).append(html_hasil);
		}

		let html_hasil =  `<p class="hasil-stemming">Hasil stemming adalah <b>${arr.hasil}</b></p>`;
		$(el).append(html_hasil);

		let html_arti =  `<p>Arti Kata <b>${arr.hasil}</b> adalah <b>${arr.arti}</b></p>`;
		if (arr.ketemu) {
			$(el).append(html_arti);

		}


	}
</script>