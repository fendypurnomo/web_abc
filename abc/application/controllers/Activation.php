<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Activation extends CI_Controller {

		public function activation_account()
		{
			$username = $this->uri->segment(3);
			$code = $this->uri->segment(4);
			$cek = $this->model_administrator->activation_check($username);
			$row = $cek->row_array();
			$ada = $cek->num_rows();

			if ($ada > 0)
			{
				if ($row['pengguna_sesi'] == $code)
				{
					$this->model_administrator->activation_user($username);
					$data['title'] = 'Apps - Aktivasi';
					$this->load->view('administrator/activation',$data);
				}
			}
			else
			{
				$data['title'] = 'Apps - Aktivasi Bermasalah';
				$this->load->view('administrator/error',$data);
			}
		}
	}
