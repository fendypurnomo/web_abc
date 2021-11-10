<nav class="navbar navbar-expand-sm navbar-light border-bottom row p-0">
	<div class="brand col col-md-2 pr-0">
		<div class="row">
			<div class="navbar-nav menu_toggle_link">
				<div class="nav-item navbar_hover">
					<a class="nav-link d-flex align-items-center" id="sidebarToggle" title="Menu Kiri" tooltip="tooltip" data-toggle="collapse" data-target="#sidebar">
						<span class="ti-menu"></span>
					</a>
				</div>
			</div>
			<a class="navbar-brand" href="#">Apps</a>
		</div>
	</div>

	<div class="navbar-toggler col text-right border-0">
		<a class="navbar-toggler waves-effect waves-dark text-right border-0 px-1 navbar_hover" href="#" data-toggle="collapse" data-target="#navbarToggleSearch">
			<span class="ti-search"></span>
		</a>
	</div>

	<div class="collapse navbar-collapse col col-sm-5 col-md-5 col-lg-6 py-1" id="navbarToggleSearch">
		<form class="form-inline w-100" action="<?= base_url() ?>search">
			<div class="input-group input-group-sm w-100">
				<input type="text" class="form-control" placeholder="Pencarian">
				<div class="input-group-append">
					<button class="btn btn-outline-primary waves-effect waves-light" type="submit">
						<span class="ti-search"></span>
					</button>
				</div>
			</div>
		</form>
	</div>

	<div class="collapse navbar-collapse col justify-content-center p-0">
		<img src="<?= base_url() ."assets/images/profile/". $profil['pengguna_foto'] ?>" class="rounded-pill" width="30" alt="photo profil" title="Profil" tooltip="tooltip">
	</div>

	<div class="collapse navbar-collapse col justify-content-between pl-0">
		<ul class="navbar-nav">
			<li class="nav-item navbar_hover" title="Beranda" tooltip="tooltip">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>home">
					<span class="ti-home"></span>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav">
			<li class="nav-item dropdown navbar_hover">
				<a class="nav-link d-flex align-items-center" id="navbarDropdown1" title="Pesan Masuk" tooltip="tooltip" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="ti-email"></i>
					<span class="badge badge-danger">10</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow-sm dropdown_menu_box">
					<h6 class="text-left pl-2">Pesan Masuk</h6>
					<div class="border-top border-bottom dropdown_menu_scroll">
						<ul class="list-group list-group-flush">
							<?php foreach ($new_message as $pesan): ?>
							<a href="#" class="list-group-item list-group-item-action py-0">
								<div class="row d-flex align-items-center">
									<div class="col-2 p-0">
										<img src="<?= base_url() ?>assets/images/profile/default.jpg" class="img-fluid rounded-pill p-1">
									</div>
									<div class="col-10 p-0">
										<div class="d-flex w-100 justify-content-between">
											<small class="font-weight-bold"><?= $pesan["hubungi_nama"] ?></small>
											<small class="text-black-50"><?= ig_date($pesan['hubungi_tanggal']) ?></small>
										</div>
										<small class="text-body"><?= substr($pesan['hubungi_pesan'],0,45) ?></small>
										<small class="text-black-50"><?= $pesan["hubungi_subyek"] ?></small>
									</div>
								</div>
							</a>
							<?php endforeach ?>
						</ul>
					</div>
					<a class="dropdown-item text-center small" href="<?= base_url() ?>messages">Lihat semua pesan</a>
				</div>
			</li>
		</ul>

		<ul class="navbar-nav">
			<li class="nav-item dropdown navbar_hover">
				<a class="nav-link d-flex align-items-center" id="navbarDropdown2" title="Pemberitahuan" tooltip="tooltip" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="ti-bell"></i>
					<span class="badge badge-danger">5</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow-sm dropdown_menu_box">
					<h6 class="text-left pl-2">Pemberitahuan</h6>
					<div class="border-top border-bottom dropdown_menu_scroll">
						<ul class="list-group list-group-flush">
							<a href="#" class="list-group-item list-group-item-action py-1 px-2">
								<div class="d-flex w-100 justify-content-between">
									<small class="font-weight-bold">Pemberitahuan 1</small>
									<small class="text-black-50">1 jam yang lalu</small>
								</div>
								<small class="text-body">Donec id elit non mi porta gravida at eget metus.</small>
							</a>
						</ul>
					</div>
					<a class="dropdown-item text-center small" href="<?= base_url() ?>notifications">Lihat semua pemberitahuan</a>
				</div>
			</li>
		</ul>

		<ul class="navbar-nav">
			<li class="nav-item dropdown navbar_hover">
				<a class="nav-link d-flex align-items-center" id="navbarDropdown3" title="Menu" tooltip="tooltip" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="ti-arrow-circle-down"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right shadow-sm">
					<a class="dropdown-item" href="<?= base_url() ?>profile"><i class="ti-user mr-2"></i>Profil</a>
					<a class="dropdown-item" href="<?= base_url() ?>settings"><i class="ti-settings mr-2"></i>Pengaturan</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url() ?>logout"><i class="ti-power-off mr-2"></i>Keluar</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
