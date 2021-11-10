<?php
	class Model_administrator extends CI_Model {

		public function __construct()
		{
			parent::__construct();
		}

		public function logged_id()
		{
			return $this->session->userdata('pengguna_id');
		}

		public function authentication_user($nama)
		{
			return $query = $this->db->query("SELECT * FROM tabel_pengguna WHERE pengguna_nama='".$this->db->escape_str($nama)."' OR pengguna_email='".$this->db->escape_str($nama)."' LIMIT 1");
		}

		public function data_user_login($nama)
		{
			$browser_user = $this->agent->browser().' '.$this->agent->version();
			$os_user = $this->agent->platform();
			return $query = $this->db->query("UPDATE tabel_pengguna SET pengguna_aktif='1', pengguna_sistem_operasi='$os_user', pengguna_peramban='$browser_user', pengguna_tanggal_masuk='".date('Y-m-d h:i:s')."' WHERE pengguna_nama='$nama' OR pengguna_email='$nama'");
		}

		public function data_user_logout()
		{
			return $query = $this->db->query("UPDATE tabel_pengguna SET pengguna_aktif='0', pengguna_tanggal_keluar='".date('Y-m-d h:i:s')."' WHERE pengguna_id='".$this->session->userdata('pengguna_id')."'");
		}

		public function new_message($limit)
		{
			return $query = $this->db->query("SELECT * FROM tabel_hubungi ORDER BY hubungi_tanggal DESC LIMIT $limit")->result_array();
		}

		public function register()
		{
			$id = random_string('numeric',10);
			$sesi = random_string('alnum',10);
			$data = array(
				'pengguna_nama' => strtolower(($this->input->post('daftar_nama_depan').'.'.$this->input->post('daftar_nama_belakang'))).'.'.$id,
				'pengguna_nama_depan' => $this->input->post('daftar_nama_depan'),
				'pengguna_nama_belakang' => $this->input->post('daftar_nama_belakang'),
				'pengguna_email' => $this->input->post('daftar_email'),
				'pengguna_sandi' => md5($this->input->post('daftar_sandi')),
				'pengguna_jenis_kelamin' => $this->input->post('daftar_jenis_kelamin'),
				'pengguna_level' => '4',
				'pengguna_syarat_ketentuan' => '1',
				'pengguna_foto' => 'default.jpg',
				'pengguna_sesi' => $sesi
			);
			$this->db->insert('tabel_pengguna',$data);
		}

		public function activation_check($username)
		{
			return $query = $this->db->query("SELECT * FROM tabel_pengguna WHERE pengguna_nama='$username' LIMIT 1");
		}

		public function activation_user($username)
		{
			return $query = $this->db->query("UPDATE tabel_pengguna SET pengguna_aktivasi='1' WHERE pengguna_nama='$username'");
		}

		function forgot_password($email,$reset_key)
		{
			$data = array(
				'pengguna_email' => $email,
				'pengguna_key' => $reset_key,
				'pengguna_tanggal' => date('Y-m-d H:i:s'),
				'pengguna_kadaluarsa' => date('Y-m-d'),
				'pengguna_aktivasi' => '0'
			);
			return $this->db->insert('tabel_pengguna_pemulihan',$data);
		}

		function forgot_password_email_check($email)
		{
			return $query = $this->db->query("SELECT pengguna_email FROM tabel_pengguna WHERE pengguna_email='".$this->db->escape_str($email)."' LIMIT 1")->num_rows();
		}

		function forgot_password_key_check($key)
		{
			return $query = $this->db->query("SELECT * FROM tabel_pengguna_pemulihan WHERE pengguna_key='$key' AND pengguna_kadaluarsa='".date('Y-m-d')."' AND pengguna_aktivasi='0' LIMIT 1")->row_array();
		}

		function forgot_password_update($email,$sandi)
		{
			return $query = $this->db->query("UPDATE tabel_pengguna AS a, tabel_pengguna_pemulihan AS b SET a.pengguna_sandi='$sandi', b.pengguna_aktivasi='1', b.pengguna_key='' WHERE a.pengguna_email='$email' AND b.pengguna_email='$email' AND b.pengguna_kadaluarsa='".date('Y-m-d')."'");
		}

		function profil_data()
		{
			return $profil = $this->db->query("SELECT pengguna_nama_depan,pengguna_nama_belakang,pengguna_email,pengguna_foto FROM tabel_pengguna WHERE pengguna_id='".$this->session->userdata('pengguna_id')."' LIMIT 1")->row_array();
		}
	}
