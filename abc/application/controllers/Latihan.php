<?php
	defined('BASEPATH') OR exit('Tidak ada akses script langsung diizinkan');

	class Latihan extends CI_Controller {

		public function index()
		{
			$data['title'] = 'Apps - Beranda';
			$this->template->load('administrator/latihan','administrator/modules/latihan/latihan',$data);
		}
	}
