<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

    public function listing($id)
	{
		$this->db->select('pengaturan.*,
							project.project_name,
							project.project_id,
							stakeholder.stakeholder_name,
							stakeholder.stakeholder_id');
		$this->db->from('pengaturan');
		$this->db->where('pengaturan.id_user', $id);
		// join
		$this->db->join('project', 'project.project_id = pengaturan.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = pengaturan.stakeholder_id', 'left');

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

    // ambil detail data pengaturan
	public function detail($id)
	{
		$this->db->select('pengaturan.*,
							project.project_name,
							project.project_id,
							stakeholder.stakeholder_name,
							stakeholder.stakeholder_id');
		$this->db->from('pengaturan');
		// where
		$this->db->where('pengaturan.id_user', $id);
		// join
		$this->db->join('project', 'project.project_id = pengaturan.project_id', 'left');
		$this->db->join('stakeholder', 'stakeholder.stakeholder_id = pengaturan.stakeholder_id', 'left');

		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function tambah($data)
	{
		$this->db->insert('pengaturan', $data);
	}

	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('pengaturan',$data);
	}
}