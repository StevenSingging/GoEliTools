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
	public function listParent(){
		$this->db->select('parent_goal_id');
		$this->db->from('goal');
		$this->db->order_by('goal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function listActgoal(){
		$this->db->select('goal_id');
		$this->db->from('activities');
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

	// ambil laporan data goal
	public function laporanGoal()
	{
		$this->db->select('count(goal.goal_id) as jumlah,
						   goal.stakeholder_id, 
						   stakeholder.stakeholder_id,
						   stakeholder.stakeholder_name
			');
		$this->db->from('goal');
		// join
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = goal.stakeholder_id', 'left');
		//end join
		$this->db->group_by('goal.stakeholder_id', 'asc');
		$this->db->where('goal.stakeholder_id = stakeholder.stakeholder_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function laporanAct()
	{
		$this->db->select('count(activities.activities_id) as jumlah,
						   activities.stakeholder_id, 
						   stakeholder.stakeholder_id,
						   stakeholder.stakeholder_name
			');
		$this->db->from('activities');
		// join
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = activities.stakeholder_id', 'left');
		//end join
		$this->db->group_by('activities.stakeholder_id', 'asc');
		$this->db->where('activities.stakeholder_id = stakeholder.stakeholder_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function laporanProc()
	{
		$this->db->select('count(procedure.procedure_id) as jumlah,
						   procedure.stakeholder_id, 
						   stakeholder.stakeholder_id,
						   stakeholder.stakeholder_name
			');
		$this->db->from('procedure');
		// join
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = procedure.stakeholder_id', 'left');
		//end join
		$this->db->group_by('procedure.stakeholder_id', 'asc');
		$this->db->where('procedure.stakeholder_id = stakeholder.stakeholder_id');
		$query = $this->db->get();
		return $query->result();
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
	public function laporan()
	{
		$this->db->select('count(*) as total');
		$this->db->from('goal');
		$this->db->group_by('stakeholder_id', 'asc');
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