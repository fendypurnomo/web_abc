<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reset_password extends CI_Controller {

		function view_reset_password()
		{
			$key = $this->uri->segment(3);
			$cek = $this->model_administrator->forgot_password_key_check($key);
			$ada = $cek->num_rows();

			if($ada > 0)
			{
				$data['row'] = $this->model_administrator->forgot_password_key_check($key);
				$data['title'] = 'Apps - Ubah kata sandi';
				$this->load->view('administrator/reset_password',$data);
			}
			else
			{
				$data['title'] = 'Apps - Ubah kata sandi';
				$this->load->view('administrator/error',$data);
			}
		}

		function update_reset_password()
		{
			$email = $this->input->post('email');
			$sandi = md5($this->input->post('sandi'));

			$this->model_administrator->forgot_password_update($email,$sandi);
			$callback = array('status' => 'berhasil');
			echo json_encode($callback);
		}
	}
