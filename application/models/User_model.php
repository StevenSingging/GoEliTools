<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	// ambil data user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// ambil detail data user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('users');
		// where
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// fungsi untuk login
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
		// where
		$this->db->where(array( 'username' => $username, 
						  		'password' => SHA1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// hitung total user
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('users',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('users',$data);
	}
	//Fungsi tambah user
	public function tambah($data)
	{
		$this->db->insert('users', $data);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */