<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suhu_tubuh extends CI_Controller {

	// load data model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pasien_model');
		$this->load->model('suhu_tubuh_model');
		
	}

	// Halaman Utama
	public function index()
	{
		$suhu_tubuh = $this->suhu_tubuh_model->listing();
		$total = $this->suhu_tubuh_model->total();

		$data = array( 'title' => 'Data Suhu Tubuh  ('.$total->total.')',
						'suhu_tubuh' => $suhu_tubuh,
						'content' => 'suhu_tubuh/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// Riwayat data suhu pasien

	public function pasien($id_pasien)
	{
		$pasien     = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh = $this->suhu_tubuh_model->pasien($id_pasien);
		

		$data = array( 'title' => 'Riwayat Suhu Tubuh '.$pasien->nama_pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'pasien' 	=> $pasien,
						'content' => 'suhu_tubuh/riwayat'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Riwayat 

	public function riwayat($id_pasien)
	{
		$pasien     = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh = $this->suhu_tubuh_model->pasien($id_pasien);
		

		$data = array( 'title' => 'Riwayat Suhu Tubuh '.$pasien->nama_pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'pasien' 	=> $pasien
					 );
		$this->load->view('suhu_tubuh/cetak_riwayat', $data, FALSE);
	}

	// word 

	public function export($id_pasien)
	{
		$pasien     = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh = $this->suhu_tubuh_model->pasien($id_pasien);
		

		$data = array( 'title' => 'Riwayat Suhu Tubuh '.$pasien->nama_pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'pasien' 	=> $pasien
					 );
		$this->load->view('suhu_tubuh/word', $data, FALSE);
	}

	// detail
	public function detail($id_suhu_tubuh)
	{
		$suhu_tubuh = $this->suhu_tubuh_model->detail($id_suhu_tubuh);
		$id_pasien	= $suhu_tubuh->id_pasien;
		$pasien     = $this->pasien_model->detail($id_pasien);

		$data = array( 'title' => 'Riwayat Data Suhu Tubuh '.$pasien->nama_pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'pasien' 	=> $pasien,
						'content' => 'suhu_tubuh/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($id_suhu_tubuh)
	{
		$suhu_tubuh = $this->suhu_tubuh_model->detail($id_suhu_tubuh);
		$id_pasien	= $suhu_tubuh->id_pasien;
		$pasien     = $this->pasien_model->detail($id_pasien);

		$data = array( 'title' => 'Riwayat Data Suhu Tubuh '.$pasien->nama_pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'pasien' 	=> $pasien,
					 );
		$this->load->view('suhu_tubuh/cetak', $data, FALSE);
	}
	// tambah
	public function tambah($id_pasien='')
	{
		//ambil data pasien
		$pasien = $this->pasien_model->listing();

		//validasi
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required',
			array( 'required' => '%s harus dipilih'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Tambah Data Suhu Tubuh',
						'pasien' => $pasien,
						'content' => 'suhu_tubuh/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
							'id_pasien'	=> $inp->post('id_pasien'),
							'tanggal_pengukuran'	=> date('Y-m-d', strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'suhu_tubuh'	=> $inp->post('suhu_tubuh'),
							'metode_pengukuran'	=> $inp->post('metode_pengukuran'),
							'keterangan'		=> $inp->post('keterangan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			// Proses oleh model
			$this->suhu_tubuh_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('suhu_tubuh'),'refresh');
		}
		// end masuk database
	}

	// Edit data
	public function edit($id_suhu_tubuh)
	{
		// ambil data suhu tubuh yang akan diedit
		$suhu_tubuh = $this->suhu_tubuh_model->detail($id_suhu_tubuh);

		//ambil data pasien
		$pasien = $this->pasien_model->listing();

		//validasi
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required',
			array( 'required' => '%s harus dipilih'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Suhu Tubuh',
						'pasien' => $pasien,
						'suhu_tubuh' => $suhu_tubuh,
						'content' => 'suhu_tubuh/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_suhu_tubuh'	=> $id_suhu_tubuh,
							'id_user'		=> $this->session->userdata('id_user'),
							'id_pasien'	=> $inp->post('id_pasien'),
							'tanggal_pengukuran'	=> date('Y-m-d', strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'suhu_tubuh'	=> $inp->post('suhu_tubuh'),
							'metode_pengukuran'	=> $inp->post('metode_pengukuran'),
							'keterangan'		=> $inp->post('keterangan')
						);
			// Proses oleh model
			$this->suhu_tubuh_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('suhu_tubuh'),'refresh');
		}
		// end masuk database
	}

	// Hapus
	public function delete($id_suhu_tubuh)
	{
		$data = array('id_suhu_tubuh' => $id_suhu_tubuh);
		//proses hapus
		$this->suhu_tubuh_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('suhu_tubuh'),'refresh');
	}

}

/* End of file Suhu_tubuh.php */
/* Location: ./application/controllers/Suhu_tubuh.php */