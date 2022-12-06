<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data stakeholder
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('stakeholder');
		$this->db->order_by('stakeholder_id');
		$query = $this->db->get();
		return $query->result();
	}

	
	
	// ambil detail data stakeholder
	public function detail($stakeholder_id)
	{
		$this->db->select('stakeholder.*,
						   users.nama_user,
						   users.username
						');
		$this->db->from('stakeholder');
		$this->db->join('users', 'users.id_user = stakeholder.id_user', 'left');
		// where
		$this->db->where('stakeholder_id', $stakeholder_id);
		$this->db->order_by('stakeholder_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// fungsi untuk login
	public function login($stakeholdername,$password)
	{
		$this->db->select('*');
		$this->db->from('stakeholder');
		// where
		$this->db->where(array( 'stakeholder_name' => $stakeholder_name, 
						  		'password' => SHA1($password)));
		$this->db->order_by('stakeholder_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function arem()
	{
		$query = $this->db->query('SELECT * FROM data_arem.stakeholder T1 WHERE NOT EXISTS (SELECT * FROM arem.stakeholder T2 WHERE T1.stakeholder_id = T2.stakeholder_id)');
		return $query->result();
	}

	// hitung total stakeholder
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('stakeholder');
		$this->db->order_by('stakeholder_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('stakeholder_id', $data['stakeholder_id']);
		$this->db->delete('stakeholder',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('stakeholder_id', $data['stakeholder_id']);
		$this->db->update('stakeholder',$data);
	}
	//Fungsi tambah stakeholder
	public function tambah($data)
	{
		$this->db->insert('stakeholder', $data);
	}
	public function tambahArem($data)
	{
		$this->db->insert('arem.stakeholder', $data);
	}


}

/* End of file Stakeholder_model.php */
/* Location: ./application/models/Stakeholder_model.php */