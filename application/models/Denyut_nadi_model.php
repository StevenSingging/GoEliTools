<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denyut_nadi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ambil data denyut_nadi
	public function listing()
	{
		$this->db->select('denyut_nadi.*, 
						   users.nama_user,
						   users.username,
						   pasien.nama_pasien,
						   pasien.kode_pasien,
						   pasien.jenis_kelamin
			');
		$this->db->from('denyut_nadi');
		// join
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		//end join

		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// riwayat
	public function pasien($id_pasien)
	{
		$this->db->select('denyut_nadi.*, 
						   users.nama_user,
						   users.username,
						   pasien.nama_pasien,
						   pasien.kode_pasien,
						   pasien.jenis_kelamin
			');
		$this->db->from('denyut_nadi');
		// join
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		//end join
		//where
		$this->db->where('pasien.id_pasien', $id_pasien);
		// End Where

		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// ambil detail data denyut_nadi
	public function detail($id_denyut_nadi)
	{
		$this->db->select('denyut_nadi.*, 
						   users.nama_user,
						   users.username,
						   pasien.nama_pasien,
						   pasien.kode_pasien,
						   pasien.jenis_kelamin
			');
		$this->db->from('denyut_nadi');
		// join
		$this->db->join('users', 'users.id_user = denyut_nadi.id_user', 'left');
		$this->db->join('pasien', 'pasien.id_pasien = denyut_nadi.id_pasien', 'left');
		//end join
		// where
		$this->db->where('id_denyut_nadi', $id_denyut_nadi);
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// hitung total denyut_nadi
	public function total()
	{
		$this->db->select('count(*) as total');
		$this->db->from('denyut_nadi');
		$this->db->order_by('id_denyut_nadi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// fungsi delete
	public function delete($data)
	{
		$this->db->where('id_denyut_nadi', $data['id_denyut_nadi']);
		$this->db->delete('denyut_nadi',$data);
	}

	// fungsi edit
	public function edit($data)
	{
		$this->db->where('id_denyut_nadi', $data['id_denyut_nadi']);
		$this->db->update('denyut_nadi',$data);
	}
	//Fungsi tambah denyut_nadi
	public function tambah($data)
	{
		$this->db->insert('denyut_nadi', $data);
	}

}

/* End of file Denyut_nadi_model.php */
/* Location: ./application/models/Denyut_nadi_model.php */