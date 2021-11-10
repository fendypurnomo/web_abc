<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Profil';
				$data['row'] = $this->model_profile->data_profile();
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Profil','/profile');
				$this->template->load('administrator/dashboard','administrator/modules/profil/tampil_profil',$data);
			}
			else
			{
				redirect(base_url());
			}
		}
	}
