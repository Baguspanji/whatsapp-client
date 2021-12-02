<?php 
	$role = $this->session->userdata('role');
?>


<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
	<div class="position-sticky">
		<div class="list-group list-group-flush mx-3 mt-4">
			<a href="<?= base_url() ?>" class="list-group-item list-group-item-action py-2 ripple <?= link_active('admin/') ?> <?= link_active('/') ?>" aria-current="true">
				<i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
			</a>
			<?php if($role == 'admin') : ?>
				<a href="<?= base_url() ?>user" class="list-group-item list-group-item-action py-2 ripple <?= link_active('user/') ?>"><i class="fas fa-users fa-fw me-3"></i><span>List User</span></a>
			<?php else : ?>
				<a href="<?= base_url() ?>admin/whatsapp" class="list-group-item list-group-item-action py-2 ripple <?= link_active('admin/whatsapp') ?>"><i class="fas fa-user fa-fw me-3"></i><span>WhatsApp</span></a>
			<?php endif ?>
		</div>
	</div>
</nav>
<!-- Sidebar -->
