<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goal_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data goal
	public function listing()
	{
		$this->db->select('goal.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id
			');
		$this->db->from('goal');
		// join
		$this->db->join('users', 'users.id_user = goal.id_user', 'left');
		$this->db->join('project', 'project.project_id = goal.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = goal.stakeholder_id', 'left');
		//end join
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function listing2()
	{
		$this->db->select('*');
		$this->db->from('goal');
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	
	// daftar_goal_project
	public function project($project_id)
	{
		$this->db->select('goal.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal2.goal_desc as parent_goal_desc
			');
		$this->db->from('goal');
		// join
		$this->db->join('users', 'users.id_user = goal.id_user', 'left');
		$this->db->join('project', 'project.project_id = goal.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = goal.stakeholder_id', 'left');
		$this->db->join('goal as goal2', 'goal2.goal_id = goal.parent_goal_id', 'left');
		//end join
		//where
		$this->db->where('project.project_id', $project_id);
		// End Where
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// daftar_goal_project
	public function stakeholder($stakeholder_id)
	{
		$this->db->select('goal.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal2.goal_desc as parent_goal_desc
			');
		$this->db->from('goal');
		// join
		$this->db->join('users', 'users.id_user = goal.id_user', 'left');
		$this->db->join('project', 'project.project_id = goal.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = goal.stakeholder_id', 'left');
		$this->db->join('goal as goal2', 'goal2.goal_id = goal.parent_goal_id', 'left');
		//end join
		//where
		$this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
		// End Where
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// ambil detail data goal
	public function detail($goal_id)
	{
		$this->db->select('goal.*, 
						   users.nama_user,
						   users.username,
						   project.project_name,
						   project.project_id,
						   stakeholder.stakeholder_name,
						   stakeholder.stakeholder_id,
						   goal2.goal_desc as parent_goal_desc
			');
		$this->db->from('goal');
		// join
		$this->db->join('users', 'users.id_user = goal.id_user', 'left');
		$this->db->join('project', 'project.project_id = goal.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = goal.stakeholder_id', 'left');
		$this->db->join('goal as goal2', 'goal2.goal_id = goal.parent_goal_id', 'left');
		//end join
		$this->db->where('goal.goal_id', $goal_id);
		$this->db->order_by('goal.goal_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total goal
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('goal');
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('goal_id', $data['goal_id']);
		$this->db->delete('goal',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('goal_id', $data['goal_id']);
		$this->db->update('goal',$data);
	}
	//Fungsi tambah goal
	public function tambah($data)
	{
		$this->db->insert('goal', $data);
	}

	public function getId(){
		$result = $this->db->select('goal_id')->from('goal')->limit(1)->order_by('goal.goal_id', 'desc')->get()->row();
		return $result->goal_id;
	}


}

/* End of file Goal_model.php */
/* Location: ./application/models/Goal_model.php */