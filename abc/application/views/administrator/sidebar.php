<div class="sidebar col col-md-2 d-none bg-light px-0 h-100 <?php if(get_cookie('sidebar-toggle')==null){echo "d-lg-block";} ?>" id="sidebar">
	<ul class="nav flex-column mt-2">
		<li class="nav-item">
			<a class="nav-link profil" href="#">
				<img src="<?= base_url() ."assets/images/profile/". $profil['pengguna_foto'] ?>" class="rounded-circle mr-3" width="35" alt="photo profil"> Administrator
			</a>
		</li>
	</ul>

	<div class="dropdown-divider"></div>

	<nav class="sidebar-nav collapse d-lg-block" id="sidebarToggler">
		<ul class="nav flex-column" id="sidebar-nav">
			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>home" data-url="home">
					<i class="icon ti-home mr-3"></i> Beranda
				</a>
			</li>

			<div class="dropdown-divider"></div>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="#parameter" data-target="#sub-parameter" data-toggle="collapse" role="button" aria-haspopup="true" aria-expanded="<?php if($this->uri->segment(1)=="parameter"){echo "true";}else{echo "false";} ?>" data-url="parameter">
					<i class="icon ti-file mr-3"></i> Data Parameter
					<span class="fa fa-fw ml-auto has-arrow"></span>
				</a>
				<ul class="nav collapse <?php if($this->uri->segment(1)=="parameter"){echo "show";} ?>" id="sub-parameter">
					<a class="dropdown-item <?php if($this->uri->segment(2)=="rekening"){echo "active";} ?>" href="<?= base_url() ?>parameter/rekening"><i class="ti-server ml-2 mr-2"></i>Rekening</a>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="#entri" data-target="#sub-entri" data-toggle="collapse" role="button" aria-haspopup="true" aria-expanded="<?php if($this->uri->segment(1)=="entri"){echo "true";}else{echo "false";} ?>" data-url="entri">
					<i class="icon ti-pencil-alt mr-3"></i> Data Entri
					<span class="fa fa-fw ml-auto has-arrow"></span>
				</a>
				<ul class="nav collapse <?php if($this->uri->segment(1)=="entri"){echo "show";} ?>" id="sub-entri">
					<a class="dropdown-item" href="<?= base_url() ?>entri/dataentri1"><i class="ti-server ml-2 mr-2"></i>Data Entri 1</a>
					<a class="dropdown-item" href="<?= base_url() ?>entri/dataentri2"><i class="ti-server ml-2 mr-2"></i>Data Entri 2</a>
					<a class="dropdown-item" href="<?= base_url() ?>entri/dataentri3"><i class="ti-server ml-2 mr-2"></i>Data Entri 3</a>
					<a class="dropdown-item" href="<?= base_url() ?>entri/dataentri4"><i class="ti-server ml-2 mr-2"></i>Data Entri 4</a>
					<a class="dropdown-item" href="<?= base_url() ?>entri/dataentri5"><i class="ti-server ml-2 mr-2"></i>Data Entri 5</a>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>media" data-url="media">
					<i class="icon ti-bar-chart-alt mr-3"></i> Media
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>reports" data-url="reports">
					<i class="icon ti-bar-chart-alt mr-3"></i> Laporan
				</a>
			</li>

			<div class="dropdown-divider"></div>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>settings" data-url="settings">
					<i class="icon ti-settings mr-3"></i> Pengaturan
				</a>
			</li>

			<div class="dropdown-divider"></div>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>profile" data-url="profile">
					<i class="icon ti-user mr-3"></i> Profil
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link d-flex align-items-center" href="<?= base_url() ?>logout">
					<i class="icon ti-power-off mr-3"></i> Keluar
				</a>
			</li>
		</ul>
	</nav>
</div>
