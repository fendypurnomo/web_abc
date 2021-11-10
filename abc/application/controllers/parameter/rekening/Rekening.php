<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rekening extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('parameter/rekening/model_rekening_akun','akun');
			$this->load->model('parameter/rekening/model_rekening_kelompok','kelompok');
			$this->load->model('parameter/rekening/model_rekening_jenis','jenis');
			$this->load->model('parameter/rekening/model_rekening_obyek','obyek');
			$this->load->model('parameter/rekening/model_rekening_rincian','rincian');
		}

		function index()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Rekening Akun';
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Akun','parameter/rekening');
				$this->template->load('administrator/dashboard','administrator/modules/parameter/rekening/tampil_rekening_akun',$data);
			}
			else
			{
				redirect(base_url());
			}
		}

		function kelompok()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Rekening Kelompok';
				$data['row'] = $this->kelompok->data_detail_uraian();
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Akun','/parameter/rekening');
				$this->breadcrumbs->push('Kelompok','/parameter/rekening/kelompok');
				$this->template->load('administrator/dashboard','administrator/modules/parameter/rekening/tampil_rekening_kelompok',$data);
			}
			else
			{
				redirect(base_url());
			}
		}

		function jenis()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Rekening Jenis';
				$data['row'] = $this->jenis->data_detail_uraian();
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Akun','/parameter/rekening');
				$this->breadcrumbs->push('Kelompok','/parameter/rekening/kelompok/'.$this->uri->segment(4));
				$this->breadcrumbs->push('Jenis','/parameter/rekening/jenis');
				$this->template->load('administrator/dashboard','administrator/modules/parameter/rekening/tampil_rekening_jenis',$data);
			}
			else
			{
				redirect(base_url());
			}
		}

		function obyek()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Rekening Obyek';
				$data['row'] = $this->obyek->data_detail_uraian();
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Akun','/parameter/rekening');
				$this->breadcrumbs->push('Kelompok','/parameter/rekening/kelompok/'.$this->uri->segment(4));
				$this->breadcrumbs->push('Jenis','/parameter/rekening/jenis/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
				$this->breadcrumbs->push('Obyek','/parameter/rekening/obyek');
				$this->template->load('administrator/dashboard','administrator/modules/parameter/rekening/tampil_rekening_obyek',$data);
			}
			else
			{
				redirect(base_url());
			}
		}

		function rincian()
		{
			if ($this->model_administrator->logged_id())
			{
				$data['title'] = 'Apps - Rekening Rincian';
				$data['row'] = $this->rincian->data_detail_uraian();
				$this->breadcrumbs->push('Beranda','beranda');
				$this->breadcrumbs->push('Akun','/parameter/rekening');
				$this->breadcrumbs->push('Kelompok','/parameter/rekening/kelompok/'.$this->uri->segment(4));
				$this->breadcrumbs->push('Jenis','/parameter/rekening/jenis/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
				$this->breadcrumbs->push('Obyek','/parameter/rekening/obyek/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));
				$this->breadcrumbs->push('Rincian','/parameter/rekening/rincian');
				$page = $this->template->load('administrator/dashboard','administrator/modules/parameter/rekening/tampil_rekening_rincian',$data,true);
				echo $page;
			}
			else
			{
				redirect(base_url());
			}
		}

		function data_rekening_akun()
		{
			$list = $this->akun->data();
			$data = array();
			$no = 1 + $_REQUEST['start'];
			foreach ($list as $field)
			{
				$row = array();
				$row[] = $no;
				$row[] = $field->rekening_1;
				$row[] = $field->nama_rekening_1;
				$row[] = "<div class='btn-group'>
						<button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill waves-effect waves-light btn_action' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
						<div class='dropdown-menu dropdown-menu-right shadow-sm'>
							<a class='dropdown-item' href='".base_url()."parameter/rekening/kelompok/".$field->rekening_1."'>Pilih</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_akun_detail(".$field->rekening_1.")'>Detail</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_akun_ubah(".$field->rekening_1.")'>Ubah</a>
							<a class='dropdown-item btn-delete-akun' href='javascript:void();' rekening_1='".$field->rekening_1."'>Hapus</a>
						</div>
					</div>";
				$data[] = $row;
				$no++;
			}

			$output = array(
				"draw" => $_REQUEST['draw'],
				"recordsTotal" => $this->akun->total(),
				"recordsFiltered" => $this->akun->disaring(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function data_rekening_kelompok()
		{
			$akun = $this->input->post('akun');
			$list = $this->kelompok->data($akun);
			$data = array();
			$no = 1 + $_REQUEST['start'];
			foreach ($list as $field)
			{
				$row = array();
				$row[] = $no;
				$row[] = $field->rekening_1;
				$row[] = $field->rekening_2;
				$row[] = $field->nama_rekening_2;
				$row[] = "<div class='btn-group'>
						<button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill waves-effect waves-light btn_action' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
						<div class='dropdown-menu dropdown-menu-right shadow-sm'>
							<a class='dropdown-item' href='".base_url()."parameter/rekening/jenis/".$field->rekening_1."/".$field->rekening_2."'>Pilih</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_kelompok_detail(".$field->rekening_1.",".$field->rekening_2.")'>Detail</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_kelompok_ubah(".$field->rekening_1.",".$field->rekening_2.")'>Ubah</a>
							<a class='dropdown-item btn-delete-kelompok' href='javascript:void();' rekening_1='".$field->rekening_1."' rekening_2='".$field->rekening_2."'>Hapus</a>
						</div>
					</div>";
				$data[] = $row;
				$no++;
			}

			$output = array(
				"draw" => $_REQUEST['draw'],
				"recordsTotal" => $this->kelompok->total(),
				"recordsFiltered" => $this->kelompok->disaring(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function data_rekening_jenis()
		{
			$akun = $this->input->post('akun');
			$kelompok = $this->input->post('kelompok');
			$list = $this->jenis->data($akun,$kelompok);
			$data = array();
			$no = 1 + $_REQUEST['start'];
			foreach ($list as $field)
			{
				$row = array();
				$row[] = $no;
				$row[] = $field->rekening_1;
				$row[] = $field->rekening_2;
				$row[] = $field->rekening_3;
				$row[] = $field->nama_rekening_3;
				$row[] = "<div class='btn-group'>
						<button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill waves-effect waves-light btn_action' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
						<div class='dropdown-menu dropdown-menu-right shadow-sm'>
							<a class='dropdown-item' href='".base_url()."parameter/rekening/obyek/".$field->rekening_1."/".$field->rekening_2."/".$field->rekening_3."'>Pilih</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_jenis_detail(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.")'>Detail</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_jenis_ubah(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.")'>Ubah</a>
							<a class='dropdown-item btn-delete-jenis' href='javascript:void();' rekening_1='".$field->rekening_1."' rekening_2='".$field->rekening_2."' rekening_3='".$field->rekening_3."'>Hapus</a>
						</div>
					</div>";
				$data[] = $row;
				$no++;
			}

			$output = array(
				"draw" => $_REQUEST['draw'],
				"recordsTotal" => $this->jenis->total(),
				"recordsFiltered" => $this->jenis->disaring(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function data_rekening_obyek()
		{
			$akun = $this->input->post('akun');
			$kelompok = $this->input->post('kelompok');
			$jenis = $this->input->post('jenis');
			$list = $this->obyek->data($akun,$kelompok,$jenis);
			$data = array();
			$no = 1 + $_REQUEST['start'];
			foreach ($list as $field)
			{
				$row = array();
				$row[] = $no;
				$row[] = $field->rekening_1;
				$row[] = $field->rekening_2;
				$row[] = $field->rekening_3;
				$row[] = $field->rekening_4;
				$row[] = $field->nama_rekening_4;
				$row[] = "<div class='btn-group'>
						<button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill waves-effect waves-light btn_action' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
						<div class='dropdown-menu dropdown-menu-right shadow-sm'>
							<a class='dropdown-item' href='".base_url()."parameter/rekening/rincian/".$field->rekening_1."/".$field->rekening_2."/".$field->rekening_3."/".$field->rekening_4."'>Pilih</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_obyek_detail(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.",".$field->rekening_4.")'>Detail</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_obyek_ubah(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.",".$field->rekening_4.")'>Ubah</a>
							<a class='dropdown-item btn-delete-obyek' href='javascript:void();' rekening_1='".$field->rekening_1."' rekening_2='".$field->rekening_2."' rekening_3='".$field->rekening_3."' rekening_4='".$field->rekening_4."'>Hapus</a>
						</div>
					</div>";
				$data[] = $row;
				$no++;
			}

			$output = array(
				"draw" => $_REQUEST['draw'],
				"recordsTotal" => $this->obyek->total(),
				"recordsFiltered" => $this->obyek->disaring(),
				"data" => $data
			);
			echo json_encode($output);
		}

		function data_rekening_rincian()
		{
			$akun = $this->input->post('akun');
			$kelompok = $this->input->post('kelompok');
			$jenis = $this->input->post('jenis');
			$obyek = $this->input->post('obyek');
			$list = $this->rincian->data($akun,$kelompok,$jenis,$obyek);
			$data = array();
			$no = 1 + $_REQUEST['start'];
			foreach ($list as $field)
			{
				$row = array();
				$row[] = $no;
				$row[] = $field->rekening_1;
				$row[] = $field->rekening_2;
				$row[] = $field->rekening_3;
				$row[] = $field->rekening_4;
				$row[] = $field->rekening_5;
				$row[] = $field->nama_rekening_5;
				$row[] = "<div class='btn-group'>
						<button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill waves-effect waves-light btn_action' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Aksi</button>
						<div class='dropdown-menu dropdown-menu-right shadow-sm'>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_rincian_detail(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.",".$field->rekening_4.",".$field->rekening_5.")'>Detail</a>
							<a class='dropdown-item' href='javascript:void();' onclick='rekening_rincian_ubah(".$field->rekening_1.",".$field->rekening_2.",".$field->rekening_3.",".$field->rekening_4.",".$field->rekening_5.")'>Ubah</a>
							<a class='dropdown-item btn-delete-rincian' href='javascript:void();' rekening_1='".$field->rekening_1."' rekening_2='".$field->rekening_2."' rekening_3='".$field->rekening_3."' rekening_4='".$field->rekening_4."' rekening_5='".$field->rekening_5."'>Hapus</a>
						</div>
					</div>";
				$data[] = $row;
				$no++;
			}

			$output = array(
				"draw" => $_REQUEST['draw'],
				"recordsTotal" => $this->rincian->total(),
				"recordsFiltered" => $this->rincian->disaring(),
				"data" => $data
			);
			echo json_encode($output);
		}

		public function tambah_akun()
		{
			$config = array(
				array(
					'field' => 'rekening_1',
					'label' => 'Rekening 1',
					'rules' => 'callback_rek_akun_check|numeric|max_length[2]',
					'errors' => array(
						'max_length' => 'Kode %s maksimal 2 karakter!',
						'numeric' => 'Kode %s harus angka!'
					)
				),
				array(
					'field' => 'nama_rekening_1',
					'label' => 'Nama Rekening 1',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('rekening_1','nama_rekening_1'),
					'error_messages' => array(form_error('rekening_1'),form_error('nama_rekening_1'))
				);
			}
			else
			{
				$data = array(
					'rekening_1' => $this->input->post('rekening_1'),
					'nama_rekening_1' => $this->input->post('nama_rekening_1')
				);
				$query = $this->akun->data_simpan($data);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function rek_akun_check()
		{
			$rekening_1 = $this->input->post('rekening_1');
			$result = $this->akun->rek_akun_check($rekening_1);

			if (empty($rekening_1))
			{
				$this->form_validation->set_message('rek_akun_check','Masukkan Kode {field}');
				return FALSE;
			}
			else if ($result > 0)
			{
				$this->form_validation->set_message('rek_akun_check','Kode {field} sudah ada!');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		public function tambah_kelompok()
		{
			$config = array(
				array(
					'field' => 'rekening_2',
					'label' => 'Rekening 2',
					'rules' => 'callback_rek_kelompok_check|numeric|max_length[2]',
					'errors' => array(
						'max_length' => 'Kode %s maksimal 2 karakter!',
						'numeric' => 'Kode %s harus angka!'
					)
				),
				array(
					'field' => 'nama_rekening_2',
					'label' => 'Nama Rekening 2',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('rekening_2','nama_rekening_2'),
					'error_messages' => array(form_error('rekening_2'),form_error('nama_rekening_2'))
				);
			}
			else
			{
				$data = array(
					'rekening_1' => $this->input->post('rekening_1'),
					'rekening_2' => $this->input->post('rekening_2'),
					'nama_rekening_2' => $this->input->post('nama_rekening_2')
				);
				$query = $this->kelompok->data_simpan($data);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function rek_kelompok_check()
		{
			$rekening_1 = $this->input->post('rekening_1');
			$rekening_2 = $this->input->post('rekening_2');
			$result = $this->kelompok->rek_kelompok_check($rekening_1,$rekening_2);

			if (empty($rekening_2))
			{
				$this->form_validation->set_message('rek_kelompok_check','Masukkan Kode {field}');
				return FALSE;
			}
			else if ($result > 0)
			{
				$this->form_validation->set_message('rek_kelompok_check','Kode {field} sudah ada!');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		public function tambah_jenis()
		{
			$config = array(
				array(
					'field' => 'rekening_3',
					'label' => 'Rekening 3',
					'rules' => 'callback_rek_jenis_check|numeric|max_length[2]',
					'errors' => array(
						'max_length' => 'Kode %s maksimal 2 karakter!',
						'numeric' => 'Kode %s harus angka!'
					)
				),
				array(
					'field' => 'nama_rekening_3',
					'label' => 'Nama Rekening 3',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('rekening_3','nama_rekening_3'),
					'error_messages' => array(form_error('rekening_3'),form_error('nama_rekening_3'))
				);
			}
			else
			{
				$data = array(
					'rekening_1' => $this->input->post('rekening_1'),
					'rekening_2' => $this->input->post('rekening_2'),
					'rekening_3' => $this->input->post('rekening_3'),
					'nama_rekening_3' => $this->input->post('nama_rekening_3')
				);
				$query = $this->jenis->data_simpan($data);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function rek_jenis_check()
		{
			$rekening_1 = $this->input->post('rekening_1');
			$rekening_2 = $this->input->post('rekening_2');
			$rekening_3 = $this->input->post('rekening_3');
			$result = $this->jenis->rek_jenis_check($rekening_1,$rekening_2,$rekening_3);

			if (empty($rekening_3))
			{
				$this->form_validation->set_message('rek_jenis_check','Masukkan Kode {field}');
				return FALSE;
			}
			else if ($result > 0)
			{
				$this->form_validation->set_message('rek_jenis_check','Kode {field} sudah ada!');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		public function tambah_obyek()
		{
			$config = array(
				array(
					'field' => 'rekening_4',
					'label' => 'Rekening 4',
					'rules' => 'callback_rek_obyek_check|numeric|max_length[2]',
					'errors' => array(
						'max_length' => 'Kode %s maksimal 2 karakter!',
						'numeric' => 'Kode %s harus angka!'
					)
				),
				array(
					'field' => 'nama_rekening_4',
					'label' => 'Nama Rekening 4',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('rekening_4','nama_rekening_4'),
					'error_messages' => array(form_error('rekening_4'),form_error('nama_rekening_4'))
				);
			}
			else
			{
				$data = array(
					'rekening_1' => $this->input->post('rekening_1'),
					'rekening_2' => $this->input->post('rekening_2'),
					'rekening_3' => $this->input->post('rekening_3'),
					'rekening_4' => $this->input->post('rekening_4'),
					'nama_rekening_4' => $this->input->post('nama_rekening_4')
				);
				$query = $this->obyek->data_simpan($data);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function rek_obyek_check()
		{
			$rekening_1 = $this->input->post('rekening_1');
			$rekening_2 = $this->input->post('rekening_2');
			$rekening_3 = $this->input->post('rekening_3');
			$rekening_4 = $this->input->post('rekening_4');
			$result = $this->obyek->rek_obyek_check($rekening_1,$rekening_2,$rekening_3,$rekening_4);

			if (empty($rekening_4))
			{
				$this->form_validation->set_message('rek_obyek_check','Masukkan Kode {field}');
				return FALSE;
			}
			else if ($result > 0)
			{
				$this->form_validation->set_message('rek_obyek_check','Kode {field} sudah ada!');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		public function tambah_rincian()
		{
			$config = array(
				array(
					'field' => 'rekening_5',
					'label' => 'Rekening 5',
					'rules' => 'callback_rek_rincian_check|numeric|max_length[2]',
					'errors' => array(
						'max_length' => 'Kode %s maksimal 2 karakter!',
						'numeric' => 'Kode %s harus angka!'
					)
				),
				array(
					'field' => 'nama_rekening_5',
					'label' => 'Nama Rekening 5',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('rekening_5','nama_rekening_5'),
					'error_messages' => array(form_error('rekening_5'),form_error('nama_rekening_5'))
				);
			}
			else
			{
				$data = array(
					'rekening_1' => $this->input->post('rekening_1'),
					'rekening_2' => $this->input->post('rekening_2'),
					'rekening_3' => $this->input->post('rekening_3'),
					'rekening_4' => $this->input->post('rekening_4'),
					'rekening_5' => $this->input->post('rekening_5'),
					'nama_rekening_5' => $this->input->post('nama_rekening_5')
				);
				$query = $this->rincian->data_simpan($data);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function rek_rincian_check()
		{
			$rekening_1 = $this->input->post('rekening_1');
			$rekening_2 = $this->input->post('rekening_2');
			$rekening_3 = $this->input->post('rekening_3');
			$rekening_4 = $this->input->post('rekening_4');
			$rekening_5 = $this->input->post('rekening_5');
			$result = $this->rincian->rek_rincian_check($rekening_1,$rekening_2,$rekening_3,$rekening_4,$rekening_5);

			if (empty($rekening_5))
			{
				$this->form_validation->set_message('rek_rincian_check','Masukkan Kode {field}');
				return FALSE;
			}
			else if ($result > 0)
			{
				$this->form_validation->set_message('rek_rincian_check','Kode {field} sudah ada!');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}

		public function perbaharui_akun()
		{
			$config = array(
				array(
					'field' => 'nama_rekening_1',
					'label' => 'Nama Rekening 1',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('nama_rekening_1'),
					'error_messages' => array(form_error('nama_rekening_1'))
				);
			}
			else
			{
				$data = array(
					'nama_rekening_1' => $this->input->post('nama_rekening_1')
				);
				$this->akun->data_perbaharui(
					array(
						'rekening_1' => $this->input->post('rekening_1')
					), $data
				);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function perbaharui_kelompok()
		{
			$config = array(
				array(
					'field' => 'nama_rekening_2',
					'label' => 'Nama Rekening 2',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('nama_rekening_2'),
					'error_messages' => array(form_error('nama_rekening_2'))
				);
			}
			else
			{
				$data = array(
					'nama_rekening_2' => $this->input->post('nama_rekening_2')
				);
				$this->kelompok->data_perbaharui(
					array(
						'rekening_1' => $this->input->post('rekening_1'),
						'rekening_2' => $this->input->post('rekening_2')
					), $data
				);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function perbaharui_jenis()
		{
			$config = array(
				array(
					'field' => 'nama_rekening_3',
					'label' => 'Nama Rekening 3',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('nama_rekening_3'),
					'error_messages' => array(form_error('nama_rekening_3'))
				);
			}
			else
			{
				$data = array(
					'nama_rekening_3' => $this->input->post('nama_rekening_3')
				);
				$this->jenis->data_perbaharui(
					array(
						'rekening_1' => $this->input->post('rekening_1'),
						'rekening_2' => $this->input->post('rekening_2'),
						'rekening_3' => $this->input->post('rekening_3')
					), $data
				);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function perbaharui_obyek()
		{
			$config = array(
				array(
					'field' => 'nama_rekening_4',
					'label' => 'Nama Rekening 4',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('nama_rekening_4'),
					'error_messages' => array(form_error('nama_rekening_4'))
				);
			}
			else
			{
				$data = array(
					'nama_rekening_4' => $this->input->post('nama_rekening_4')
				);
				$this->obyek->data_perbaharui(
					array(
						'rekening_1' => $this->input->post('rekening_1'),
						'rekening_2' => $this->input->post('rekening_2'),
						'rekening_3' => $this->input->post('rekening_3'),
						'rekening_4' => $this->input->post('rekening_4')
					), $data
				);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function perbaharui_rincian()
		{
			$config = array(
				array(
					'field' => 'nama_rekening_5',
					'label' => 'Nama Rekening 5',
					'rules' => 'required',
					'errors' => array('required' => 'Masukkan %s')
				)
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$callback = array(
					'status' => 'false',
					'error_field' => array('nama_rekening_5'),
					'error_messages' => array(form_error('nama_rekening_5'))
				);
			}
			else
			{
				$data = array(
					'nama_rekening_5' => $this->input->post('nama_rekening_5')
				);
				$this->rincian->data_perbaharui(
					array(
						'rekening_1' => $this->input->post('rekening_1'),
						'rekening_2' => $this->input->post('rekening_2'),
						'rekening_3' => $this->input->post('rekening_3'),
						'rekening_4' => $this->input->post('rekening_4'),
						'rekening_5' => $this->input->post('rekening_5')
					), $data
				);
				$callback = array('status' => 'true');
			}
			echo json_encode($callback);
		}

		public function hapus_akun($rekening_1)
		{
			$this->akun->data_hapus($rekening_1);
			echo json_encode(array('status' => true));
		}

		public function hapus_kelompok($rekening_1,$rekening_2)
		{
			$this->kelompok->data_hapus($rekening_1,$rekening_2);
			echo json_encode(array('status' => true));
		}

		public function hapus_jenis($rekening_1,$rekening_2,$rekening_3)
		{
			$data = $this->jenis->data_hapus($rekening_1,$rekening_2,$rekening_3);
			echo json_encode(array('status' => true));
		}

		public function hapus_obyek($rekening_1,$rekening_2,$rekening_3,$rekening_4)
		{
			$data = $this->obyek->data_hapus($rekening_1,$rekening_2,$rekening_3,$rekening_4);
			echo json_encode(array('status' => true));
		}

		public function hapus_rincian($rekening_1,$rekening_2,$rekening_3,$rekening_4,$rekening_5)
		{
			$data = $this->rincian->data_hapus($rekening_1,$rekening_2,$rekening_3,$rekening_4,$rekening_5);
			echo json_encode(array('status' => true));
		}

		public function detail_akun($rekening_1)
		{
			$data = $this->akun->data_detail($rekening_1);
			echo json_encode($data);
		}

		public function detail_kelompok($rekening_1,$rekening_2)
		{
			$data = $this->kelompok->data_detail($rekening_1,$rekening_2);
			echo json_encode($data);
		}

		public function detail_jenis($rekening_1,$rekening_2,$rekening_3)
		{
			$data = $this->jenis->data_detail($rekening_1,$rekening_2,$rekening_3);
			echo json_encode($data);
		}

		public function detail_obyek($rekening_1,$rekening_2,$rekening_3,$rekening_4)
		{
			$data = $this->obyek->data_detail($rekening_1,$rekening_2,$rekening_3,$rekening_4);
			echo json_encode($data);
		}

		public function detail_rincian($rekening_1,$rekening_2,$rekening_3,$rekening_4,$rekening_5)
		{
			$data = $this->rincian->data_detail($rekening_1,$rekening_2,$rekening_3,$rekening_4,$rekening_5);
			echo json_encode($data);
		}

		public function cetak_rekening_akun()
		{
			ob_start();
			$data['akun'] = $this->akun->cetak_data();
			$this->load->view('administrator/modules/parameter/rekening/cetak_rekening_akun', $data);
			$content = ob_get_clean();
			require_once('assets/node_modules/html2pdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('P', 'F4', 'fr');
				$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('rekening-akun.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}

		public function cetak_rekening_kelompok()
		{
			ob_start();
			$data['kelompok'] = $this->kelompok->cetak_data();
			$this->load->view('administrator/modules/parameter/rekening/cetak_rekening_kelompok', $data);
			$content = ob_get_clean();
			require_once('assets/node_modules/html2pdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('P', 'F4', 'fr');
				$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('rekening-kelompok.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}

		public function cetak_rekening_jenis()
		{
			ob_start();
			$data['jenis'] = $this->jenis->cetak_data();
			$this->load->view('administrator/modules/parameter/rekening/cetak_rekening_jenis', $data);
			$content = ob_get_clean();
			require_once('assets/node_modules/html2pdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('P', 'F4', 'fr');
				$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('rekening-jenis.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}

		public function cetak_rekening_obyek()
		{
			ob_start();
			$data['obyek'] = $this->obyek->cetak_data();
			$this->load->view('administrator/modules/parameter/rekening/cetak_rekening_obyek', $data);
			$content = ob_get_clean();
			require_once('assets/node_modules/html2pdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('P', 'F4', 'fr');
				$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('rekening-obyek.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}

		public function cetak_rekening_rincian()
		{
			ob_start();
			$data['rincian'] = $this->rincian->cetak_data();
			$this->load->view('administrator/modules/parameter/rekening/cetak_rekening_rincian', $data);
			$content = ob_get_clean();
			ob_clean();
			require_once('assets/node_modules/html2pdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('P', 'F4', 'fr');
				$html2pdf->pdf->SetDisplayMode('fullpage');
				$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('rekening-rincian.pdf');
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}
	}
