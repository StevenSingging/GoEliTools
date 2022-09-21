<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Similarity_test_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function jumlah_sim()
    {
        $this->db->select("count('sim_id') as jumlah");
        $this->db->from('sim_object_test');
        $this->db->where('label_sim =',-1);

        $query = $this->db->get();
        return $query->row();
    }

    public function ambil_data()
    {
        $this->db->select('*');
        $this->db->from('sim_object_test');
        $this->db->where('label_sim =',-1);
        $this->db->order_by('sim_id');

        $query = $this->db->get();
        $row=$query->first_row();
        return $row;
    }

    public function sim_object($sim_id)
    {
        $this->db->select('*');
        $this->db->from('sim_object_test');
        $this->db->where('sim_id =',$sim_id);

        $query = $this->db->get();
        return $query->row(); 
        
    }
    public function tambah_label($data)
    {
        $this->db->where('sim_id', $data['sim_id']);
        $this->db->update('sim_object_test', $data);
    }
 // end model   
}
