<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class error_page extends CI_Controller {

		public function index()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Kesalahan';
				$page = $this->template->load('administrator/dashboard','administrator/modules/kesalahan/tampil_kesalahan',$data,true);
				echo $page;
			}
			else
			{
				redirect(base_url());
			}
		}
	}
