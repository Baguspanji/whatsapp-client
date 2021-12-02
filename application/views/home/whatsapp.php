<?php
$username = $this->session->userdata('username');
?>

<style>
	body {
		padding: 50px;
	}

	.hide {
		display: none;
	}

	.profile-user-img {
		width: 200px;
		height: 200px;
	}

	#link {
		color: blue;
		background-color: transparent;
		text-decoration: none;
	}

	.language-json {
		background-color: darkslategray;
		padding: 16px;
		border-radius: 8px;
		height: 80px;
	}
</style>

<section class="mb-4">
	<div class="card">
		<div class="card-header py-3">
			<h5 class="mb-0 text-center"><strong><?= $title ?></strong></h5>
		</div>
	</div>
</section>

<section>
	<div class="row">
		<div class="col-sm-6 col-12 mb-4">
			<div class="card">
				<div class="card-header text-center">
					<h4 class="card-title">Log WhatsApp</h4>
				</div>
				<div class="card-body">
					<div class="card-body">
						<div class="client-container">
							<div class="client hide">
								<img src="" alt=" QR Code" id="qrcode">
								<ul class="logs"></ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-12 mb-4">
			<div class="card">
				<div class="card-body p-5">
					<form>
						<!-- Email input -->
						<div class="form-outline mb-4">
							<label for="client-id">Username</label>
							<input type="text" id="client-id" class="form-control" value="<?= $username ?>" readonly />
						</div>

						<!-- Password input -->
						<!-- <div class="form-outline mb-4">
							<input type="password" id="form1Example2" class="form-control" />
							<label class="form-label" for="form1Example2">Password</label>
						</div> -->

						<!-- Submit button -->
						<button type="submit" id="add-client-btn" class="btn btn-primary">Connect</button>
						<button type="button" id="send-data" class="btn btn-info">Send Message</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>

<script>
	var username = '<?= $username ?>';

	$(document).ready(function() {
		// client-side
		const socket = io("http://147.139.193.105/", {
			transports: ['websocket']
		});
		// Ketika button tambah diklik
		$('#add-client-btn').click(function() {
			var clientId = $('#client-id').val();
			var clientDescription = $('#client-description').val();
			var template = $('.client').first().clone()
				.removeClass('hide')
				.addClass(clientId);
			$('.client-container').append(template);
			socket.emit('create-session', {
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
						$(`.client.${session.id} .logs`).append($('<li>').text('Whatsapp is connected!'));
						$(`.client.${session.id} #qrcode`).hide();
						$('#add-client-btn').addClass('disabled');
					} else {
						$(`.client.${session.id} .logs`).append($('<li>').text('Connecting...'));
					}
				}
			}
		});

		socket.on('message', function(data) {
			if (data.id == username) {
				$(`.client.${data.id} .logs`).append($('<li>').text(data.text));
			}
		});
		socket.on('qr', function(data) {
			if (data.id == username) {
				$(`.client.${data.id} #qrcode`).attr('src', data.src);
				$(`.client.${data.id} #qrcode`).show();
			}
		});
		socket.on('ready', function(data) {
			if (data.id == username) {
				$(`.client.${data.id} #qrcode`).hide();
			}
		});
		socket.on('authenticated', function(data) {
			if (data.id == username) {
				$(`.client.${data.id} #qrcode`).hide();
			}
		});

		socket.on('remove-session', function(id) {
			if (id == username) {
				$('#add-client-btn').removeClass('disabled');
			}
		});
	});
</script>

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
						<label for="nomor">Nomor</label>
						<input type="number" id="nomor" name="nomor" class="form-control" required="" placeholder="085xxxx"/>
					</div>
					<div class="form-group mb-3">
						<label for="message">Pesan</label>
						<input type="text" id="message" name="message" class="form-control" required="" placeholder="Hello"/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="send-submit" class="btn btn-secondary">Send</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#send-data').on('click', function() {
		$('#addModal').modal('show');
	})

	$('#send-submit').on('click', function() {
		$('#add-form').submit();
	})
</script>
