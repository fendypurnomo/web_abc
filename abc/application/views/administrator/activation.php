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
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.floating.labels.css">
	</head>

	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
					<div class="card shadow-sm">
						<div class="card-body">
							<div class="row justify-content-center">
								<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 align-self-center py-lg-5 py-xl-5">
									<h5 class="card-title text-center mb-4"> Terima kasih telah mendaftar!</h5>
									<h6 class="card-subtitle text-center text-muted mb-5">Akun Anda telah di aktifkan. Anda dapat masuk menggunakan akun email yang telah terdaftar dengan mengeklik tombol masuk di bawah ini.</h6>
									<div class="row justify-content-center">
										<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<button type="button" class="btn btn-outline-primary btn-block rounded-pill waves-effect waves-light" onclick="window.location.href='<?= base_url(); ?>'">MASUK</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/popper/popper.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/waves/dist/waves.min.js"></script>
		<script src="<?= base_url() ?>assets/js/custom.contents.js"></script>
	</body>
</html>
