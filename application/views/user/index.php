<section class="mb-4">
	<div class="card">
		<div class="card-header py-3">
			<h5 class="mb-0 text-center"><strong><?= $title ?></strong></h5>
		</div>
	</div>
</section>
<!-- Section: Main chart -->

<!--Section: Minimal statistics cards-->
<section>
	<div class="row">
		<div class="col-12 mb-4">
			<div class="card">
				<div class="card-header">
					<a href="#" id="add-data" class="btn btn-sm btn-info float-end mb-2"><i class="fas fa-plus"></i> Add Data</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-sm" id="data-table">
							<thead>
								<tr class="text-center">
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Username</th>
									<th scope="col">Email</th>
									<th scope="col">Role</th>
									<th scope="col">Status</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users as $key => $value) : ?>
									<tr class="text-center">
										<th scope="row"><?= $key + 1 ?></th>
										<td><?= $value->nama ?></td>
										<td><?= $value->username ?></td>
										<td><?= $value->email ?></td>
										<?php if ($value->is_admin == 1) : ?>
											<td>Admin</td>
										<?php else : ?>
											<td>User</td>
										<?php endif ?>
										<?php if ($value->id == 1) : ?>
											<td>
												<a href="#" class="btn btn-sm btn-success">Aktif</a>
											</td>
											<td></td>
										<?php else : ?>
											<?php if ($value->status == 1) : ?>
												<td>
													<a href="#" class="btn btn-sm btn-success">Aktif</a>
												</td>
											<?php else : ?>
												<td>
													<a href="#" class="btn btn-sm btn-danger">Non-aktif</a>
												</td>
											<?php endif ?>
											<td>
												<a href="<?= base_url('user/detail/') . $value->id ?>" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
												<a href="#" class="btn btn-sm btn-primary"><i class="fas fa-key"></i></a>
											</td>
										<?php endif ?>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Section: Minimal statistics cards-->

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Add Data</h5>
			</div>
			<div class="modal-body">
				<form method="POST" id="add-form">
					<div class="form-group mb-3">
						<label for="nama">Nama</label>
						<input type="text" id="nama" name="nama" class="form-control" />
					</div>
					<div class="form-group mb-3">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" />
					</div>
					<div class="form-group mb-3">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" class="form-control" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="add-submit" class="btn btn-secondary">Save data</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#add-data').on('click', function() {
		$('#addModal').modal('show');
	})

	$('#add-submit').on('click', function() {
		$('#add-form').submit();
	})
</script>
