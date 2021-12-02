<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title><?= $title ?></title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
	<!-- MDB -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/mdb.min.css" />
	<!-- Custom styles -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css" /><!-- MDB -->

	<!-- MDB -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/mdb.min.js"></script>

	<style>
		.form-control {
			height: 40px;
		}
	</style>

</head>

<body>
	<!--Main layout-->
	<div style="margin-top: 100px">
		<div class="container pt-4">
			<!-- Section: Main chart -->
			<section>
				<div class="row justify-content-center">
					<div class="col-4 mb-4">
						<div class="card">
							<div class="card-header py-3">
								<h5 class="mb-0 text-center"><strong><?= $title ?></strong></h5>
							</div>
						</div>
					</div>
				</div>

				<div class="row justify-content-center">

					<div class="col-4">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url() ?>auth/login" method="POST">
									<!-- Email input -->
									<div class="form-group mb-4">
										<label for="username">Username</label>
										<input type="text" name="username" class="form-control" />
									</div>

									<!-- Password input -->
									<div class="form-group mb-4">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control" />
									</div>

									<!-- Submit button -->
									<button type="submit" class="btn btn-primary btn-block">Sign in</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>
	</div>
	<!--Main layout-->

</body>

</html>
