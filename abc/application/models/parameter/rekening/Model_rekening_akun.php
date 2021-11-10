<?php
	class Model_rekening_akun extends CI_Model
	{
		var $table					= 'ref_rekening_1';
		var $column_order		= array(null,'rekening_1','nama_rekening_1',null);
		var $column_search	= array('rekening_1','nama_rekening_1');
		var $order					= array('rekening_1'=>'asc');

		public function __construct()
		{
			parent::__construct();
			$this->db2 = $this->load->database('db2',true);
		}

		private function query()
		{
			$this->db2->select('rekening_1,nama_rekening_1');
			$this->db2->from('ref_rekening_1');
			$this->db2->where('rekening_1 > ',0);
			$i = 0;

			foreach($this->column_search as $item)
			{
				if($_REQUEST['search']['value'])
				{
					if($i === 0)
					{
						$this->db2->group_start();
						$this->db2->like($item,$_REQUEST['search']['value']);
					}
					else
					{
						$this->db2->or_like($item,$_REQUEST['search']['value']);
					}
					if(count($this->column_search) - 1 == $i)
					$this->db2->group_end();
				}
				$i++;
			}

			if(isset($_REQUEST['order']))
			{
				$this->db2->order_by($this->column_order[$_REQUEST['order']['0']['column']],$_REQUEST['order']['0']['dir']);
			}
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db2->order_by(key($order),$order[key($order)]);
			}
		}

		function data()
		{
			$this->query();
			if($_REQUEST['length'] != -1)
				$this->db2->limit($_REQUEST['length'],$_REQUEST['start']);
			return $query = $this->db2->get()->result();
		}

		function disaring()
		{
			$this->query();
			return $query = $this->db2->get()->num_rows();
		}

		public function total()
		{
			$this->db2->from($this->table);
			return $this->db2->where('rekening_1 > ',0)->count_all_results();
		}

		function data_detail($rekening_1)
		{
			$this->db2->from($this->table);
			$this->db2->where('rekening_1',$rekening_1);
			return $query = $this->db2->get()->row();
		}

		function rek_akun_check($rekening_1)
		{
			$this->db2->select('rekening_1');
			$this->db2->from('ref_rekening_1');
			$this->db2->where('rekening_1',$rekening_1);
			return $query = $this->db2->get()->num_rows();
		}

		public function data_simpan($data)
		{
			$this->db2->insert($this->table,$data);
		}

		public function data_perbaharui($where,$data)
		{
			$this->db2->update($this->table,$data,$where);
			return $this->db2->affected_rows();
		}

		function data_hapus($rekening_1)
		{
			$this->db2->where('rekening_1',$rekening_1);
			$this->db2->delete($this->table);
		}

		function cetak_data()
		{
			return $query = $this->db2->query("CALL sp_rekening_1()")->result();
		}
	}
