<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	// load model
	public function __construct()
	{
		parent::__construct();
		// Proteksi halaman dengan library My_login
		$this->my_login->check_login();
		$this->load->model('pasien_model');
		$this->load->library('form_validation');
		//$this->load->helper(array('form', 'url'));
	}

	// data pasien
	public function index()
	{
		$pasien = $this->pasien_model->listing();
		$total = $this->pasien_model->total();

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien','Nama Lengkap','required',
				array(  'required' => '%s harus diisi'));
		
		// check Pasienname
		$valid->set_rules('kode_pasien','kode_pasien','required|is_unique[pasien.kode_pasien]',
				array(  'required' => '%s harus diisi',
						'is_unique' => '%s sudah ada. Buat kode pasien baru'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Data Pasien Administrator ('.$total->total.')',
						'pasien' => $pasien,
						'content' => 'pasien/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d', strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon'),
						);
			// Proses oleh model
			$this->pasien_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('pasien'),'refresh');
		}
		// end masuk database
	}

	// tambah data pasien
	public function tambah()
	{

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien','Nama Lengkap','required',
				array(  'required' => '%s harus diisi'));
		
		// check Pasienname
		$valid->set_rules('kode_pasien','kode_pasien','required|is_unique[pasien.kode_pasien]',
				array(  'required' => '%s harus diisi',
						'is_unique' => '%s sudah ada. Buat kode pasien baru'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Tambah Data Pasien',
						'content' => 'pasien/tambah_baru'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d', strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon'),
						);
			// Proses oleh model
			$this->pasien_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('pasien'),'refresh');
		}
		// end masuk database
	}


	// Edit Pasien
	public function edit($id_pasien)
	{
		// panggil data pasien yang akan diedit
		$pasien = $this->pasien_model->detail($id_pasien);

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien','Nama Lengkap','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Edit Data Pasien : ' .$pasien->nama_pasien,
						'pasien' => $pasien,
						'content' => 'pasien/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			
			$data = array( 	'id_pasien'		=> $id_pasien,
							'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('Y-m-d', strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon'),
						);
			
			// Proses oleh model
			$this->pasien_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('pasien'),'refresh');
		}
		// end masuk database
	}

	// Detail pasien
	public function detail($id_pasien)
	{
		$pasien= $this->pasien_model->detail($id_pasien);
		$data = array( 'title' => $pasien->nama_pasien,
						'pasien' => $pasien,
						'content' => 'pasien/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// cetak
	public function cetak($id_pasien)
	{
		$pasien= $this->pasien_model->detail($id_pasien);
		$data = array( 'title' => $pasien->nama_pasien,
						'pasien' => $pasien,
					 );
		$this->load->view('pasien/cetak', $data, FALSE);
	}

	// delete pasien
	public function delete($id_pasien)
	{
		$data = array('id_pasien' => $id_pasien);
		//proses hapus
		$this->pasien_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('pasien'),'refresh');
	}
}

/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */