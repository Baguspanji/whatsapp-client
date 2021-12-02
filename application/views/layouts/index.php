<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title><?= $title ?></title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css" />

	<!-- MDB -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/mdb.min.js"></script>

	<!-- Custom scripts -->
	<!-- <script type="text/javascript" src="<?= base_url() ?>assets/js/admin.js"></script> -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="<?= base_url() ?>assets/js/notify.min.js"></script>

	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.2.0/socket.io.js"></script>

	<style>
		input {
			height: 40px;
		}

		div.dataTables_wrapper div.dataTables_filter input {
			height: 30px;
		}
	</style>

</head>

<body>
	<!--Main Navigation-->
	<header>
		<?php $this->load->view('layouts/sidebar') ?>

		<?php $this->load->view('layouts/header') ?>
	</header>
	<!--Main Navigation-->

	<!--Main layout-->
	<main style="margin-top: 58px">
		<div class="container pt-4">
			<!-- Section: Main chart -->
			<?php $this->load->view($content) ?>

		</div>
	</main>
	<!--Main layout-->

	<script>
		function notifikasi(pesan, tipe, ico = '') {
			$.notify({
				// options
				icon: ico,
				message: pesan,
			}, {
				// settings
				type: tipe,
				z_index: 9999
			});
		}

		$(document).ready(function() {
			$('#data-table').DataTable({
				"paging": true,
				"ordering": true,
				"info": false
			});
		});
	</script>

	<?= $this->session->flashdata('notifikasi'); ?>


</body>

</html>
