<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data activities
	public function listing()
	{
		$this->db->select('activities.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal.goal_id,
						   goal.goal_desc
			');
		$this->db->from('activities');
		// join
		$this->db->join('users', 'users.id_user = activities.id_user', 'left');
		$this->db->join('project', 'project.project_id = activities.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		$this->db->join('goal', 'goal.goal_id = activities.goal_id', 'left');
		//end join
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function listing2()
	{
		$this->db->select('*');
		$this->db->from('activities');
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function listParent()
	{
		$this->db->select('parent_activities_id');
		$this->db->from('activities');
		$this->db->order_by('activities_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function listActres()
	{
		$this->db->select('activities_id');
		$this->db->from('activities_resources');
		$this->db->order_by('activities_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function listProc()
	{
		$this->db->select('activities_id');
		$this->db->from('procedure');
		$this->db->order_by('activities_id');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_activities_project
	public function project($project_id)
	{
		$this->db->select('activities.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal.goal_id,
						   goal.goal_desc,
						   activities2.activities_desc as parent_activities_desc
			');
		$this->db->from('activities');
		// join
		$this->db->join('users', 'users.id_user = activities.id_user', 'left');
		$this->db->join('project', 'project.project_id = activities.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		$this->db->join('goal', 'goal.goal_id = activities.goal_id', 'left');
		$this->db->join('activities as activities2', 'activities2.activities_id = activities.parent_activities_id', 'left');
		//end join
		//where
		$this->db->where('project.project_id', $project_id);
		// End Where
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_activities_stakeholder
	public function stakeholder($stakeholder_id)
	{
		$this->db->select('activities.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal.goal_id,
						   goal.goal_desc,
						   activities2.activities_desc as parent_activities_desc
			');
		$this->db->from('activities');
		// join
		$this->db->join('users', 'users.id_user = activities.id_user', 'left');
		$this->db->join('project', 'project.project_id = activities.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		$this->db->join('goal', 'goal.goal_id = activities.goal_id', 'left');
		$this->db->join('activities as activities2', 'activities2.activities_id = activities.parent_activities_id', 'left');
		//end join
		//where
		$this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
		// End Where
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_activities_goal
	public function goal($goal_id)
	{
		$this->db->select('activities.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal.goal_id,
						   goal.goal_desc,
						   activities2.activities_desc as parent_activities_desc
			');
		$this->db->from('activities');
		// join
		$this->db->join('users', 'users.id_user = activities.id_user', 'left');
		$this->db->join('project', 'project.project_id = activities.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		$this->db->join('goal', 'goal.goal_id = activities.goal_id', 'left');
		$this->db->join('activities as activities2', 'activities2.activities_id = activities.parent_activities_id', 'left');
		//end join
		//where
		$this->db->where('goal.goal_id', $goal_id);
		// End Where
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// ambil detail data activities
	public function detail($activities_id)
	{
		$this->db->select('activities.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal.goal_id,
						   goal.goal_desc,
						   activities2.activities_desc as parent_activities_desc
			');
		$this->db->from('activities');
		// join
		$this->db->join('users', 'users.id_user = activities.id_user', 'left');
		$this->db->join('project', 'project.project_id = activities.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		$this->db->join('goal', 'goal.goal_id = activities.goal_id', 'left');
		$this->db->join('activities as activities2', 'activities2.activities_id = activities.parent_activities_id', 'left');
		//end join
		$this->db->where('activities.activities_id', $activities_id);
		$this->db->order_by('activities.activities_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total activities
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('activities');
		$this->db->order_by('activities_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('activities_id', $data['activities_id']);
		$this->db->delete('activities',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('activities_id', $data['activities_id']);
		$this->db->update('activities',$data);
	}
	//Fungsi tambah activities
	public function tambah($data)
	{
		$this->db->insert('activities', $data);
	}


}

/* End of file Activities_model.php */
/* Location: ./application/models/Activities_model.php */