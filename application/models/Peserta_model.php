<?php

class Peserta_model extends CI_Model {

	private $table_name = 'peserta';
	private $view_name = 'v_peserta_2';
	private $view_name2 = 'v_peserta_kegiatan';

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('db', TRUE);
	}
	
	public function get_all($array = false, $instansi_id = false, $verifikator = false) {
		if($instansi_id){
			if(!is_array($instansi_id)){
				$instansi_id = array($instansi_id);
			}
			$this->db->where_in('instansi_id', $instansi_id);
		}
		if($verifikator){
			if(!is_array($verifikator)){
				$verifikator = array($verifikator);
			}
			
			$this->db->where_in('verifikator', $verifikator);
		}
		
		$query = $this->db->get($this->view_name);
		$result = $query->result();
		if(!$array){
			return $query->result();
		}
		
		$return = array();
		foreach($result as $r){
			$return[$r->id] = $r;
		}
		return $return;
	}
	
	public function get_tipe_registrasi($array = false) {
		$query = $this->db->get('tipe_registrasi');
		$result = $query->result();
		if(!$array){
			return $query->result();
		}
		
		$return = array();
		foreach($result as $r){
			$return[$r->id] = $r;
		}
		return $return;
	}
	
	public function count_all(){
		return $this->db->count_all($this->view_name);
	}
	
	private function filtering($filter){
		$masking_field = array('doc_design', 'doc_surat_tugas', 'doc_laporan', 'doc_biodata', 'doc_hasil');
		$masking_field2 = array('status_kegiatan');
		
		foreach($filter as $f){
			if(in_array($f['name'], $masking_field)){
				if($f['value'] == 'true'){
					$this->db->where('TRIM(' . $f['name'] . ') <> ""');
				}else if($f['value'] == 'false'){
					$this->db->where('(' . $f['name'] . ' = "" OR ' . $f['name'] . ' IS NULL)');
				}
			}if(in_array($f['name'], $masking_field2)){
				if($f['value'] == 'true'){
					$this->db->where($f['name'], 1);
				}else if($f['value'] == 'false'){
					$this->db->where($f['name'], 0);
				}
			}else if(isset($f['method'])){
				if($f['method'] == 'like'){
					$this->db->where('(TRIM(' . $f['name'] . ') = "" OR ' . $f['name'] . ' IS NULL)');
				}else{
					$this->db->like($f['name'], $f['value']);
				}
			}else{
				$this->db->like($f['name'], $f['value']);
			}
		}
	}
	
	public function count_filter($filter){
		$this->filtering($filter);
		
		return $this->db->count_all_results($this->view_name);
	}
	
	public function get_filter($filter, $limit = false, $offset = false, $order_column = false, $order_method = false){
		$this->filtering($filter);
		
		if($limit){
		$this->db->limit($limit, $offset);
		}
		if($order_column){
		$this->db->order_by($order_column, $order_method);
		}
		
		$query = $this->db->get($this->view_name);
		$result = $query->result();
		return $query->result();
	}
	
	public function ptp_get_filter($filter, $limit, $offset, $order_column, $order_method){
		$this->filtering($filter);
		
		$this->db->where_in('status_approval', array('approved', 'passed', 'perbaikan'));
		
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_column, $order_method);
		
		$query = $this->db->get($this->view_name);
		$result = $query->result();
		return $query->result();
	}
	
	public function ptp_count_filter($filter){
		$this->filtering($filter);
		$this->db->where_in('status_approval', array('approved', 'passed', 'perbaikan'));
		return $this->db->count_all_results($this->view_name);
	}
	
	public function add($data) {
		$this->db->insert($this->table_name, $data);
		$insert_id = $this->db->insert_id();
		if($insert_id){
			return $this->get_row($insert_id);
		}else{
			return false;
		}
	}
	
	public function get_row($id, $array = false) {
		$query = $this->db->get_where($this->view_name, array('id' => $id), 1);
		if($array){
			return $query->row_array();
		}else{
			return $query->row();
		}
	}
	
	public function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data);
		return $id;
	}
	
	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}
	
	public function check_login($username, $password){
		if(is_numeric($username)){
			$query = $this->db->get_where($this->table_name, array('nip' => $username), 1);
		}else{
			$query = $this->db->get_where($this->table_name, array('username' => $username), 1);
		}
		$row = $query->row();
		
		if(!is_object($row)){
			return false;
		}
		if($row->password != $password){
			return false;
		}
		return $row;
	}
	
	public function check_login_bypass($username){
		$query = $this->db->get_where($this->table_name, array('nip' => $username, 'status_approval' => 'approved'), 1);
		$row = $query->row();
		if(!is_object($row)){
			return false;
		}
		return $row;
	}
	
	public function check_login_by_nip($username, $password){
		$query = $this->db->get_where($this->table_name, array('nip' => $username), 1);
		$row = $query->row();
		if(!is_object($row)){
			return false;
		}
		if($row->password != $password){
			return false;
		}
		return $row;
	}

}