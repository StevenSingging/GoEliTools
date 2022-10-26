<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data procedure
	public function listing()
	{
		$this->db->select('procedure.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   activities.activities_id,
						   activities.activities_desc
			');
		$this->db->from('procedure');
		// join
		$this->db->join('users', 'users.id_user = procedure.id_user', 'left');
		$this->db->join('project', 'project.project_id = procedure.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = procedure.stakeholder_id', 'left');
		$this->db->join('activities', 'activities.activities_id = procedure.activities_id', 'left');
		//end join
		$this->db->order_by('procedure_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function listing2()
	{
		$this->db->select('*');
		$this->db->from('procedure');
		$this->db->order_by('procedure_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function listProc()
	{
		$this->db->select('activities_id');
		$this->db->from('procedure');
		$this->db->order_by('procedure_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_procedure_project
	public function activities($activities_id)
	{
		$this->db->select('procedure.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   activities.activities_id,
						   activities.activities_desc
			');
		$this->db->from('procedure');
		// join
		$this->db->join('users', 'users.id_user = procedure.id_user', 'left');
		$this->db->join('project', 'project.project_id = procedure.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = procedure.stakeholder_id', 'left');
		$this->db->join('activities', 'activities.activities_id = procedure.activities_id', 'left');
		//end join
		//where
		$this->db->where('procedure.activities_id', $activities_id);
		// End Where
		$this->db->order_by('procedure_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	// ambil detail data procedure
	public function detail($procedure_id)
	{
		$this->db->select('procedure.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   activities.activities_id,
						   activities.activities_desc
			');
		$this->db->from('procedure');
		// join
		$this->db->join('users', 'users.id_user = procedure.id_user', 'left');
		$this->db->join('project', 'project.project_id = procedure.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = procedure.stakeholder_id', 'left');
		$this->db->join('activities', 'activities.activities_id = procedure.activities_id', 'left');
		//end join
		$this->db->where('procedure.procedure_id', $procedure_id);
		$this->db->order_by('procedure.procedure_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total procedure
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('procedure');
		$this->db->order_by('procedure_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('procedure_id', $data['procedure_id']);
		$this->db->delete('procedure',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('procedure_id', $data['procedure_id']);
		$this->db->update('procedure',$data);
	}
	//Fungsi tambah procedure
	public function tambah($data)
	{
		$this->db->insert('procedure', $data);
	}


}

/* End of file Procedure_model.php */
/* Location: ./application/models/Procedure_model.php */