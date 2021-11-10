<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

		<title>Beranda</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?= base_url('assets/node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
	</head>

	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Navbar</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Tautan</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Aksi</a>
								<a class="dropdown-item" href="#">Aksi Lain</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Sesuatu yang lain</a>
							</div>
						</li>
					</ul>

					<form class="form-inline">
						<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Pencarian" aria-label="Pencarian">
						<button class="btn btn-sm btn-outline-secondary" type="submit">Cari</button>
					</form>

				</div>
			</div>
		</nav>
	
		<div class="container">
			<?= $contents ?>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="<?= base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
		<script src="<?= base_url('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
	</body>
</html>
