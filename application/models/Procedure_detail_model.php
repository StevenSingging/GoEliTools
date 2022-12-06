<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_detail_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data procedure_detail
	public function listing()
	{
		$this->db->select('procedure_detail.*, 
						   users.nama_user,
						   users.username,
						   procedure.procedure_id,
						   procedure.procedure_desc
			');
		$this->db->from('procedure_detail');
		// join
		$this->db->join('users', 'users.id_user = procedure_detail.id_user', 'left');
		$this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
		//end join
		$this->db->order_by('procedure_detail_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function listing2()
	{
		$this->db->select('*');
		$this->db->from('procedure_detail');
		$this->db->order_by('procedure_detail_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_procedure_detail_project
	public function procedure($procedure_id)
	{
		$this->db->select('procedure_detail.*, 
						   users.nama_user,
						   users.username,
						   procedure.procedure_id,
						   procedure.procedure_desc
			');
		$this->db->from('procedure_detail');
		// join
		$this->db->join('users', 'users.id_user = procedure_detail.id_user', 'left');
		$this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
		//end join
		//where
		$this->db->where('procedure_detail.procedure_id', $procedure_id);
		// End Where
		$this->db->order_by('procedure_detail_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}


	// ambil detail data procedure_detail
	public function detail($procedure_detail_id)
	{
		$this->db->select('procedure_detail.*, 
						   users.nama_user,
						   users.username,
						   procedure.procedure_id,
						   procedure.procedure_desc
			');
		$this->db->from('procedure_detail');
		// join
		$this->db->join('users', 'users.id_user = procedure_detail.id_user', 'left');
		$this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
		//end join
		$this->db->where('procedure_detail.procedure_detail_id', $procedure_detail_id);
		$this->db->order_by('procedure_detail.procedure_detail_id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total procedure_detail
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('procedure_detail');
		$this->db->order_by('procedure_detail_id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('procedure_detail_id', $data['procedure_detail_id']);
		$this->db->delete('procedure_detail',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('procedure_detail_id', $data['procedure_detail_id']);
		$this->db->update('procedure_detail',$data);
	}
	//Fungsi tambah procedure_detail
	public function tambah($data)
	{
		$this->db->insert('procedure_detail', $data);
	}
	
	public function getNumid($proid){
		$this->db->where('procedure_id =', $proid);
		$query = $this->db->get('procedure_detail');
		return $query->num_rows();;
	}

	public function arem()
	{
		$query = $this->db->query('SELECT * FROM data_arem.procedure_detail T1 WHERE NOT EXISTS (SELECT * FROM arem.procedure_detail T2 WHERE T1.id = T2.id)');
		return $query->result();
	}

	public function tambahArem($data)
	{
		$this->db->insert('arem.procedure_detail', $data);
	}


}

/* End of file Procedure_detail_model.php */
/* Location: ./application/models/Procedure_detail_model.php */