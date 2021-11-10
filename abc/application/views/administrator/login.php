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
		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/waves/dist/css/waves.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/toast/dist/css/toast.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.floating.labels.css">
		<style>
			body{
				background: linear-gradient(85deg, rgba(2,0,36,1) 0%, rgba(102,0,255,1) 0%, rgba(179,128,255,1) 100%);
			}
		</style>
	</head>

	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-sm">
						<div class="card-body py-5">
							<h1 class="card-title text-center mb-3">Apps</h1>
							<h6 class="card-subtitle text-muted text-center mb-5">Silahkan masuk</h6>
							<form class="form-horizontal form-signin mb-5" id="login">
								<div class="form-group mb-3">
									<div class="form-label-group">
										<input type="text" class="form-control rounded-pill" id="nama" name="nama" placeholder="Nama atau email" autofocus>
										<label for="nama">Nama atau email</label>
									</div>
									<div id="error_username"></div>
								</div>
								<div class="form-group mb-4">
									<div class="form-label-group">
										<input type="password" class="form-control rounded-pill" id="sandi" name="sandi" placeholder="Kata sandi">
										<label for="sandi">Kata sandi</label>
									</div>
									<div id="error_password"></div>
								</div>
								<div class="row mb-2">
									<div class="col">
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="ingat" name="ingat" value="1">
											<label class="custom-control-label" for="ingat">Ingat saya</label>
										</div>
									</div>
									<div class="col">
										<div class="text-right">
											<a href="javascript:void();" class="small" onclick="forgot_password();">Lupa kata sandi?</a>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-outline-primary btn-block rounded-pill waves-effect waves-light" id="masuk">MASUK</button>
							</form>
							<div class="row mb-2">
								<div class="col">
									<div class="text-center">
										<small>Belum punya akun?</small>
										<a href="javascript:void();" class="small" onclick="register();">Daftar akun</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="modal_dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
					</div>
					<form id="form" method="post">
						<div class="modal-body py-5">
							<div class="row mb-2">
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control rounded-pill" name="daftar_nama_depan" placeholder="Nama Depan">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control rounded-pill" name="daftar_nama_belakang" placeholder="Nama Belakang">
									</div>
								</div>
							</div>
							<div class="row mb-2" id="reg-mb-n4">
								<div class="col">
									<div class="form-group">
										<input type="email" class="form-control rounded-pill" name="daftar_email" placeholder="Email">
									</div>
									<div id="error_email" class="invalid-feedback"></div>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col">
									<div class="form-group">
										<input type="password" class="form-control rounded-pill" name="daftar_sandi" placeholder="Sandi">
									</div>
								</div>
							</div>
							<div class="error-label">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="daftar_jenis_kelamin_pria" name="daftar_jenis_kelamin" class="custom-control-input" value="L">
									<label class="custom-control-label" for="daftar_jenis_kelamin_pria">Pria</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="daftar_jenis_kelamin_wanita" name="daftar_jenis_kelamin" class="custom-control-input" value="P">
									<label class="custom-control-label" for="daftar_jenis_kelamin_wanita">Wanita</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-outline-danger btn-close rounded-pill waves-effect waves-light" onclick="modal_close();">Tutup</button>
							<button type="submit" class="btn btn-sm btn-outline-primary btn-submit rounded-pill waves-effect waves-light">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>var base_url = "<?= base_url() ?>";</script>
		<script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/waves/dist/js/waves.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?= base_url() ?>assets/node_modules/toast/dist/js/toast.min.js"></script>
		<script src="<?= base_url() ?>assets/js/custom.contents.js"></script>
		<script src="<?= base_url() ?>assets/js/login.js"></script>
	</body>
</html>
