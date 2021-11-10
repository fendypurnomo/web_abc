<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			if($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Beranda';
				$this->template->load('administrator/dashboard','administrator/modules/beranda/tampil_beranda',$data);
			}
			else
			{
				redirect(base_url());
			}
		}

		public function logout()
		{
			$this->model_administrator->data_user_logout();
			$this->session->sess_destroy();
			delete_cookie('remember-me');
			delete_cookie('sidebar-toggle');
			redirect(base_url());
		}
	}
