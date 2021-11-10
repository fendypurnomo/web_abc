<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<title><?= $title; ?></title>
		<link rel="icon" type="image/png" href="<?= base_url() ?>assets/icons/<?php include "icon.php" ?>">
		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/waves/dist/waves.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.floating.labels.css">
	</head>

	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
					<div id="alert-success"></div>
					<div class="card shadow-sm">
						<div class="card-body py-5">
							<h1 class="card-title text-center mb-4">Apps</h1>
							<h6 class="card-subtitle text-center text-muted mb-5">Perbaharui kata sandi</h6>
							<form id="reset-password" class="mb-5">
								<div class="form-group mb-4">
									<div class="form-label-group">
										<input type="password" class="form-control rounded-pill" id="sandi" name="sandi" placeholder="Kata sandi baru" autofocus>
										<label for="sandi">Kata sandi baru</label>
									</div>
								</div>
								<div class="form-group mb-5">
									<div class="form-label-group">
										<input type="password" class="form-control rounded-pill" id="sandi_konfirmasi" name="sandi_konfirmasi" placeholder="Kata sandi baru konfirmasi">
										<label for="sandi_konfirmasi">Konfirmasi kata sandi baru</label>
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" id="email" name="email" value="<?= $row['pengguna_email'] ?>">
								</div>
								<button type="submit" class="btn btn-outline-primary btn-block rounded-pill waves-effect waves-light">PERBAHARUI</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>var base_url = "<?= base_url() ?>";</script>
		<script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/popper/popper.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/waves/dist/waves.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<script src="<?= base_url() ?>assets/js/custom.contents.js"></script>
		<script src="<?= base_url() ?>assets/js/reset.password.js"></script>
	</body>
</html>
