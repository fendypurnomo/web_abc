<div class="row m-0 py-3 min-h-content-page">
	<div class="col">
		<h6>Profil</h6>
		<nav class="mb-3" aria-label="breadcrumb">
			<?=$this->breadcrumbs->show();?>
		</nav>

		<div class="row">
			<div class="col-4 col-md-4 col-xl-2 offset-md-1 offset-xl-2">
				<img src="<?= base_url()."assets/images/profile/".$row['pengguna_foto']?>" class="img-thumbnail" alt="Foto Profil">
			</div>

			<div class="col-8 col-md-6 col-xl-6">
				<form>
					<div class="form-group">
						<input class="form-control form-control-sm" type="text" name="pengguna_nama" placeholder="Nama Pengguna" value="<?=$row['pengguna_nama']?>">
					</div>

					<div class="form-row">
						<div class="form-group col">
							<input class="form-control form-control-sm" type="text" name="pengguna_nama_depan" placeholder="Nama Depan" value="<?=$row['pengguna_nama_depan']?>">
						</div>
						<div class="form-group col">
							<input class="form-control form-control-sm" type="text" name="pengguna_nama_belakang" placeholder="Nama Belakang" value="<?=$row['pengguna_nama_belakang']?>">
						</div>
					</div>

					<div class="form-group">
						<input class="form-control form-control-sm" type="text" name="pengguna_email" placeholder="Email" value="<?=$row['pengguna_email']?>">
					</div>

					<div class="form-row">
						<div class="form-group col-4">
							<select class="custom-select custom-select-sm" name="tanggal_lahir">
								<option selected>Pilih Tanggal Lahir</option>
								<?php
									$tanggal = substr($row['pengguna_tanggal_lahir'],8,2);
									comboTanggal($tanggal);
								?>
							</select>
						</div>
						<div class="form-group col-4">
							<select class="custom-select custom-select-sm" name="bulan_lahir">
								<option selected>Pilih Bulan Lahir</option>
								<?php
									$bulan = substr($row['pengguna_tanggal_lahir'],5,2);
									comboBulan($bulan);
								?>
							</select>
						</div>
						<div class="form-group col-4">
							<select class="custom-select custom-select-sm" name="tahun_lahir">
								<option selected>Pilih Tahun Lahir</option>
								<?php
									$tahun = substr($row['pengguna_tanggal_lahir'],0,4);
									comboTahun($tahun);
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="custom-control custom-radio custom-control-inline">
							<input class="custom-control-input" type="radio" id="laki-laki" name="pengguna_jenis_kelamin" value="L" <?php if($row['pengguna_jenis_kelamin'] == 'L'){echo "checked";} ?>>
							<label class="custom-control-label" for="laki-laki">Laki-laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input class="custom-control-input" type="radio" id="perempuan" name="pengguna_jenis_kelamin" value="P" <?php if($row['pengguna_jenis_kelamin'] == 'P'){echo "checked";} ?>>
							<label class="custom-control-label" for="perempuan">Perempuan</label>
						</div>
					</div>

					<div class="form-group">
						<textarea class="form-control form-control-sm" name="pengguna_alamat" placeholder="Alamat" rows="2"><?=$row['pengguna_alamat']?></textarea>
					</div>

					<div class="form-group">
						<input class="form-control form-control-sm" type="text" name="pengguna_nomor_telepon" placeholder="Nomor Handphone" value="<?=$row['pengguna_nomor_telepon']?>">
					</div>

					<div class="form-group">
						<input class="form-control form-control-sm" type="password" name="pengguna_sandi" placeholder="Sandi">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
