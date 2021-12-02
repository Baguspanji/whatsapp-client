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
		<div class="col-sm-6 col-12 mb-4">
			<div class="card">
				<!-- <div class="card-header">
					<a href="#" id="add-data" class="btn btn-sm btn-info float-end mb-2"><i class="fas fa-plus"></i> Add Data</a>
				</div> -->
				<div class="card-body">
					<h5 class="card-title mb-4 w-100 text-center"><?= $user->nama ?></h5>
					<table class="table table-sm">
						<tbody>
							<tr>
								<td>Username</td>
								<td><?= $user->username ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?= $user->email ?></td>
							</tr>
							<tr>
								<td>Role</td>
								<td><?= $user->is_admin == 1 ? 'Admin' : 'User' ?></td>
							</tr>
						</tbody>
					</table>
					<?php if ($user->status == 1) : ?>
						<a href="#" class="btn btn-sm btn-success">Aktif</a>
					<?php else : ?>
						<a href="#" class="btn btn-sm btn-danger">Non-aktif</a>
					<?php endif ?>
					<a href="#" class="btn btn-sm btn-danger disabled" id="kill-client">Disconnect</a>
				</div>
			</div>
		</div>

		<div class="col-sm-4 col-12 mb-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-4 w-100 text-center">Log WhatsApp</h5>
					<div class="client-container">
						<div class="client hide">
							<ul class="logs"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<!--Section: Minimal statistics cards-->


<script>
	var username = '<?= $user->username ?>';

	$(document).ready(function() {
		// client-side
		const socket = io("http://147.139.193.105/", {
			transports: ['websocket']
		});

		$('#kill-client').click(function() {
			var clientId = username;
			var clientDescription = $('#client-description').val()
			socket.emit('kill-session', {
				id: clientId,
				description: clientDescription
			});
		});

		socket.on('init', function(data) {
			$('.client-container .client').not(':first').remove();
			// console.log(data);
			for (var i = 0; i < data.length; i++) {
				var session = data[i];
				if (session.id == username) {
					var clientId = session.id;
					var clientDescription = session.description;
					var template = $('.client').first().clone()
						.removeClass('hide')
						.addClass(clientId);
					$('.client-container').append(template);
					if (session.ready) {
						$(`.client.${session.id} .logs`).append($('<li>').text('Whatsapp connected!'));
						$('#kill-client').removeClass('disabled')
						$('.init-log').addClass('hide')
					}
				}
			}
		});

		socket.on('remove-session', function(id) {
			if (id == username) {
				$('#kill-client').addClass('disabled')
			}
		});

		socket.on('remove-session', function(id) {
			if (id == username) {
				$(`.client.${id}`).remove();
			}
		});

		socket.on('message', function(data) {
			if (data.id == username) {
				$(`.client.${data.id} .logs`).append($('<li>').text(data.text));
			}
		});
	});
</script>
