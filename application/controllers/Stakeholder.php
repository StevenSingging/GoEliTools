<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('stakeholder_model');
		$this->load->library('form_validation');
		$this->load->model('project_model');
	}
	public function index()
	{
		$stakeholder = $this->stakeholder_model->listing();
		$total = $this->stakeholder_model->total();
		$project = $this->project_model->listing();

		if(isset($_SESSION['berhasil'])){
			unset($_SESSION['berhasil']);
		}else if(isset($_SESSION['hapus'])){
			unset($_SESSION['hapus']);
		}else if(isset($_SESSION['gagal'])){
			unset($_SESSION['gagal']);
		}else if(isset($_SESSION['warning'])){
			unset($_SESSION['warning']);
		}

		// validasi input
		$valid = $this->form_validation;
		// check stakeholder_name
		$valid->set_rules('stakeholder_name','Nama Stakeholder','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Data Stakeholder ('.$total->total.')',
						'stakeholder' => $stakeholder,
						'project' => $project,
						'content' => 'stakeholder/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'					=> $this->session->userdata('id_user'),
							'stakeholder_name'			=> $inp->post('stakeholder_name'),
							'stakeholder_type'			=> $inp->post('stakeholder_type'),
							'stakeholder_competence'	=> $inp->post('stakeholder_competence'),
							'project_id'				=> $inp->post('project_id'),
							'post_date'					=> date('Y-m-d H:i:s')
						);
			// Proses oleh model
			$this->stakeholder_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('add', 'Data telah ditambah');
			redirect(site_url('stakeholder'),'refresh');
		}
		// end masuk database
	}

	// Edit Stakeholder
	public function edit($stakeholder_id)
	{
		// panggil data stakeholder yang akan diedit
		$stakeholder = $this->stakeholder_model->detail($stakeholder_id);

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('stakeholder_name','Nama Stakeholder','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Edit Data Stakeholder : ' .$stakeholder->stakeholder_name,
						'stakeholder' => $stakeholder,
						'content' => 'stakeholder/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			
			$data = array( 	'stakeholder_id'			=> $stakeholder_id,
							'stakeholder_name'			=> $inp->post('stakeholder_name'),
							'stakeholder_type'			=> $inp->post('stakeholder_type'),
							'stakeholder_competence'	=> $inp->post('stakeholder_competence'),
							'id_user'					=> $this->session->userdata('id_user'),
							'post_date'					=> date('Y-m-d H:i:s')
						);
			
			// Proses oleh model
			$this->stakeholder_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('berhasil', 'Data telah diedit');
			redirect(site_url('stakeholder'),'refresh');
		}
		// end masuk database
	}

	// Detail stakeholder
	public function detail($stakeholder_id)
	{
		$stakeholder= $this->stakeholder_model->detail($stakeholder_id);
		$data = array( 'title' => $stakeholder->stakeholder_name,
						'stakeholder' => $stakeholder,
						'content' => 'stakeholder/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// cetak
	public function cetak($stakeholder_id)
	{
		$stakeholder= $this->stakeholder_model->detail($stakeholder_id);
		$data = array( 'title' => $stakeholder->stakeholder_name,
						'stakeholder' => $stakeholder
					 );
		$this->load->view('stakeholder/cetak', $data, FALSE);
	}

	// cetak seluruh
	public function cetak_seluruh()
	{
		$stakeholder = $this->stakeholder_model->listing();
		$data = array ( 'title' => 'Cetak Seluruh Data Stakeholder',
						'stakeholder' => $stakeholder);
		$this->load->view('stakeholder/cetak_seluruh', $data, FALSE);
	}

	// delete stakeholder
	public function delete($stakeholder_id)
	{
		$data = array('stakeholder_id' => $stakeholder_id);
		//proses hapus
		$this->stakeholder_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('hapus', 'Data telah dihapus');
		redirect(site_url('stakeholder'),'refresh');
	}

}

/* End of file Stakeholder.php */
/* Location: ./application/controllers/Stakeholder.php */