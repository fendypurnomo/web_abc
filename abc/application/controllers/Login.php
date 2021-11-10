<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//$this->load->library('phpmailerautoload');
		}

		public function index()
		{
			if($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Beranda';
				$this->template->load('administrator/dashboard','administrator/modules/beranda/tampil_beranda',$data);
			}
			else if(get_cookie('remember-me') != null)
			{
				$data['title'] = 'Apps - Beranda';
				$this->template->load('administrator/dashboard','administrator/modules/beranda/tampil_beranda',$data);
			}
			else
			{
				$data['title'] = 'Administrator - Masuk';
				$this->load->view('administrator/login',$data);
			}
		}

		function authentication()
		{
			$nama = $this->input->post('nama');
			$sandi = MD5($this->input->post('sandi'));
			$ingat = $this->input->post('ingat');
			$cek = $this->model_administrator->authentication_user($nama);
			$row = $cek->row_array();
			$ada = $cek->num_rows();

			if ($ada > 0)
			{
				if ($sandi == $row['pengguna_sandi'])
				{
					if ($row['pengguna_blokir'] == '0')
					{
						if ($row['pengguna_aktivasi'] == '1')
						{
							$data_session = array(
								'pengguna_id' => $row['pengguna_id'],
								'pengguna_nama' => $nama,
								'pengguna_sandi' => $sandi,
								'pengguna_masuk' => 'masuk'
							);
							$this->session->set_userdata($data_session);
							$this->model_administrator->data_user_login($nama);
							echo "berhasil";

							if (!empty($ingat))
							{
								$key = random_string('alnum',64);
								set_cookie('remember-me',$key,3600*24*30);
							}
						}
						else
						{
							echo "belum_aktivasi";
						}
					}
					else
					{
						echo "diblokir";
					}
				}
				else
				{
					echo "sandi_salah";
				}
			}
			else
			{
				echo "gagal";
			}
		}

		function register()
		{
			$this->form_validation->set_rules(
				'daftar_email','Email','is_unique[tabel_pengguna.pengguna_email]',
				array('is_unique' => 'Email ini telah terdaftar')
			);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'error',
					'error_email' => form_error('daftar_email')
				);
			}
			else
			{
				$this->model_administrator->register();
				$callback = array('status' => 'success');
			}
			echo json_encode($callback);
		}

		function register_send_email()
		{
			$email = $this->input->post('email');
			$mail = $this->phpmailerautoload->load();
			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'fendypurnomo98@gmail.com';
			$mail->Password   = 'fendy@google.234';
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;
			$mail->setFrom('fendypurnomo98@gmail.com','Fendy Purnomo');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = 'Aktivasi Pendaftaran Akun';
			$mail->Body    = 'Anda telah melakukan pendaftaran akun, klik tautan dibawah ini untuk melakukan aktivasi akun Anda. Jika Anda tidak melakukan pendaftaran akun, abaikan pesan ini. <br><br> <a href="' . site_url('activation/' . $email) . '">Klik aktivasi</a> <br><br> Terima Kasih <br><br> Administrator';
			$mail->send();
		}

		function forgot_password()
		{
			$this->form_validation->set_rules('email','Email','callback_forgot_password_check_email');

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array('status' => 'error','error_email' => form_error('email'));
			}
			else
			{
				$callback = array('status' => 'success');
			}
			echo json_encode($callback);
		}

		function forgot_password_check_email($email)
		{
			$email = $this->input->post('email');
			$result = $this->model_administrator->forgot_password_email_check($email);

			if (empty($this->input->post('email')))
			{
				$response = false;
				$this->form_validation->set_message('forgot_password_check_email','Masukkan email pemulihan kata sandi Anda');
			}
			else if ($result == 0)
			{
				$response = false;
				$this->form_validation->set_message('forgot_password_check_email','Tidak dapat menemukan email Anda');
			}
			else
			{
				$response = true;
			}
			return $response;
    }

		function forgot_password_send_email()
		{
			$email = $this->input->post('email');
			$reset_key = random_string('alnum', 50);

			$this->model_administrator->forgot_password($email,$reset_key);

			$mail = $this->phpmailerautoload->load();

			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host				= 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'fendypurnomo98@gmail.com';
			$mail->Password   = 'fendy@google.234';
			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;
			$mail->setFrom('fendypurnomo98@gmail.com','Fendy Purnomo');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = 'Permintaan Ubah Kata Sandi';
			$mail->Body    = 'Anda telah melakukan permintaan ubah kata sandi, klik tautan dibawah ini untuk melakukan ubah kata sandi Anda. Jika Anda tidak melakukan permintaan ini, abaikan pesan ini. <br><br> <a href="' . site_url('reset_password/key/' . $reset_key) . '">Klik ubah kata sandi</a> <br><br> Terima Kasih <br><br> Administrator';
			$mail->send();
		}
	}
