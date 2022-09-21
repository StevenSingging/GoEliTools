<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_stakeholder_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data project_stakeholder
	public function listing()
	{
		$this->db->select('project_stakeholder.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id
			');
		$this->db->from('project_stakeholder');
		// join
		$this->db->join('users', 'users.id_user = project_stakeholder.id_user', 'left');
		$this->db->join('project', 'project.project_id = project_stakeholder.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = project_stakeholder.stakeholder_id', 'left');
		//end join

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// order by project_id
	public function listing2()
	{
		$this->db->select('project_stakeholder.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id
			');
		$this->db->from('project_stakeholder');
		// join
		$this->db->join('users', 'users.id_user = project_stakeholder.id_user', 'left');
		$this->db->join('project', 'project.project_id = project_stakeholder.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = project_stakeholder.stakeholder_id', 'left');
		//end join

		$this->db->order_by('project_stakeholder.project_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// project
	public function project($project_id)
	{
		$this->db->select('project_stakeholder.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   stakeholder.stakeholder_type,
						   stakeholder.stakeholder_competence
							');
		$this->db->from('project_stakeholder');
		// join
		$this->db->join('users', 'users.id_user = project_stakeholder.id_user', 'left');
		$this->db->join('project', 'project.project_id = project_stakeholder.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = project_stakeholder.stakeholder_id', 'left');
		//end join
		// where
		$this->db->where('project_stakeholder.project_id', $project_id);
		// End Where

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function stakeholder($stakeholder_id)
	{
		$this->db->select('project_stakeholder.*, 
						   users.nama_user,
						   users.username,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id
			');
		$this->db->from('project_stakeholder');
		// join
		$this->db->join('users', 'users.id_user = project_stakeholder.id_user', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = project_stakeholder.stakeholder_id', 'left');
		//end join
		//where
		$this->db->where('pasien.id_pasien', $id_pasien);
		// End Where

		$this->db->order_by('id_suhu_tubuh', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// ambil detail data project_stakeholder
	public function detail($id)
	{
		$this->db->select('project_stakeholder.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   stakeholder.stakeholder_type,
						   stakeholder.stakeholder_competence
							');
		$this->db->from('project_stakeholder');
		// join
		$this->db->join('users', 'users.id_user = project_stakeholder.id_user', 'left');
		$this->db->join('project', 'project.project_id = project_stakeholder.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = project_stakeholder.stakeholder_id', 'left');
		//end join
		// where
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// fungsi untuk login
	public function login($project_stakeholdername,$password)
	{
		$this->db->select('*');
		$this->db->from('project_stakeholder');
		// where
		$this->db->where(array( 'project_stakeholder_name' => $project_stakeholder_name, 
						  		'password' => SHA1($password)));
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// hitung total project_stakeholder
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('project_stakeholder');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('project_stakeholder',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('project_stakeholder',$data);
	}
	
	//Fungsi tambah project_stakeholder
	public function tambah($data)
	{
		$this->db->insert('project_stakeholder', $data);
	}


}

/* End of file Project_stakeholder_project_model.php */
/* Location: ./application/models/Project_stakeholder_project_model.php */