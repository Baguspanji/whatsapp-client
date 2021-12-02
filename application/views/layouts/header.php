<!-- Navbar -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
	<!-- Container wrapper -->
	<div class="container-fluid">
		<!-- Toggle button -->
		<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Brand -->
		<a class="navbar-brand px-4" href="#">
			<!-- <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="25" alt="" loading="lazy" /> -->
			<h3>WA Directs</h3>
		</a>

		<!-- Right links -->
		<ul class="navbar-nav ms-auto d-flex flex-row">
			<!-- Avatar -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
					<img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle" height="22" alt="" loading="lazy" />
				</a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="#">My profile</a></li>
					<!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
					<li><a class="dropdown-item" href="<?= base_url() ?>auth/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- Container wrapper -->
</nav>
<!-- Navbar -->
