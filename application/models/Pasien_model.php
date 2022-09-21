<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	// ambil data pasien
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->order_by('id_pasien', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// ambil detail data pasien
	public function detail($id_pasien)
	{
		$this->db->select('*');
		$this->db->from('pasien');
		// where
		$this->db->where('id_pasien', $id_pasien);
		$this->db->order_by('id_pasien', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// fungsi untuk login
	public function login($pasienname,$password)
	{
		$this->db->select('*');
		$this->db->from('pasien');
		// where
		$this->db->where(array( 'pasienname' => $pasienname, 
						  		'password' => SHA1($password)));
		$this->db->order_by('id_pasien', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// hitung total pasien
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('pasien');
		$this->db->order_by('id_pasien', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id_pasien', $data['id_pasien']);
		$this->db->delete('pasien',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('id_pasien', $data['id_pasien']);
		$this->db->update('pasien',$data);
	}
	//Fungsi tambah pasien
	public function tambah($data)
	{
		$this->db->insert('pasien', $data);
	}
}

/* End of file Pasien_model.php */
/* Location: ./application/models/Pasien_model.php */