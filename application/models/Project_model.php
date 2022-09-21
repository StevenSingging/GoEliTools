<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data project
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// ambil detail data project
	public function detail($project_id)
	{
		$this->db->select('*');
		$this->db->from('project');
		// where
		$this->db->where('project_id', $project_id);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// fungsi untuk login
	public function login($projectname,$password)
	{
		$this->db->select('*');
		$this->db->from('project');
		// where
		$this->db->where(array( 'project_name' => $project_name, 
						  		'password' => SHA1($password)));
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// hitung total project
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('project');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('project_id', $data['project_id']);
		$this->db->delete('project',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('project_id', $data['project_id']);
		$this->db->update('project',$data);
	}
	//Fungsi tambah project
	public function tambah($data)
	{
		$this->db->insert('project', $data);
	}

	

}

/* End of file Project_model.php */
/* Location: ./application/models/Project_model.php */