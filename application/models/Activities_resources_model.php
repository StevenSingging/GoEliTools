<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_resources_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data activities
	public function listing()
	{
		$this->db->select('activities_resources.*, 
						   activities.activities_id,
						   activities.activities_desc
						   
			');
		$this->db->from('activities_resources');
		// join
		$this->db->join('activities', 'activities.activities_id = activities_resources.activities_id', 'left');
		//end join
		$this->db->order_by('id', 'desc');
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

	// daftar_activities_project
	public function activities($activities_id)
	{
		$this->db->select('activities_resources.*, 
						   activities.activities_id,
						   activities.activities_desc
			');
		$this->db->from('activities_resources');
		// join
		$this->db->join('activities', 'activities.activities_id = activities_resources.activities_id', 'left');
		//end join
		//where
		$this->db->where('activities.activities_id', $activities_id);
		// End Where
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	

	// ambil detail data activities resources
	public function detail($id)
	{
		$this->db->select('activities_resources.*, 
						   activities.activities_id,
						   activities.activities_desc
			');
		$this->db->from('activities_resources');
		// join
		$this->db->join('activities', 'activities.activities_id = activities_resources.activities_id', 'left');
		//end join
		$this->db->where('activities_resources.id', $id);
		$this->db->order_by('activities_resources.id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total activities
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('activities_resources');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('activities_resources',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('activities_resources',$data);
	}
	//Fungsi tambah activities
	public function tambah($data)
	{
		$this->db->insert('activities_resources', $data);
	}
	public function arem()
	{
		$query = $this->db->query('SELECT * FROM data_arem.activities_resources T1 WHERE NOT EXISTS (SELECT * FROM arem.activities_resources T2 WHERE T1.id = T2.id)');
		return $query->result();
	}
	public function tambahArem($data)
	{
		$this->db->insert('arem.activities_resources', $data);
	}


}

/* End of file Activities_model.php */
/* Location: ./application/models/Activities_model.php */