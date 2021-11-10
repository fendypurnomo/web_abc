<?php
	class Model_profile extends CI_Model {

		public function __construct()
		{
			parent::__construct();
		}

		function data_profile()
		{
			return $query = $this->db->query("SELECT pengguna_id,pengguna_nama,pengguna_nama_depan,pengguna_nama_belakang,pengguna_email,pengguna_sandi,pengguna_tanggal_lahir,pengguna_jenis_kelamin,pengguna_nomor_telepon,pengguna_lokasi,pengguna_alamat,pengguna_level,pengguna_sistem_operasi,pengguna_peramban,pengguna_foto,pengguna_tanggal_masuk,pengguna_tanggal_keluar,pengguna_keterangan FROM tabel_pengguna WHERE pengguna_id='".$this->session->userdata('pengguna_id')."' LIMIT 1")->row_array();
		}
	}
