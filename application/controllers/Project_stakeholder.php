<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_stakeholder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('project_model');
		$this->load->model('stakeholder_model');
		$this->load->model('project_stakeholder_model');
		$this->load->library('form_validation');

	}
	
	public function index()
	{
		$project_stakeholder = $this->project_stakeholder_model->listing();
		$total = $this->project_stakeholder_model->total();

		if(isset($_SESSION['berhasil'])){
			unset($_SESSION['berhasil']);
		}else if(isset($_SESSION['add'])){
			unset($_SESSION['add']);
		}else if(isset($_SESSION['hapus'])){
			unset($_SESSION['hapus']);
		}else if(isset($_SESSION['gagal'])){
			unset($_SESSION['gagal']);
		}else if(isset($_SESSION['warning'])){
			unset($_SESSION['warning']);
		}

		$data = array( 'title' => 'Data Proyek Stakeholder('.$total->total.')',
						'project_stakeholder' => $project_stakeholder,
						'content' => 'project_stakeholder/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// tambah
	public function tambah($project_id='', $stakeholder_id='') 
	{
		//ambil data project
		$project = $this->project_model->listing();
		$stakeholder = $this->stakeholder_model->listing();

		//validasi project
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

				
		$data = array( 'title' => 'Tambah Data Project Stakeholder',
						'project' =>$project,
						'stakeholder' => $stakeholder,
						'content' => 'project_stakeholder/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'			=> $this->session->userdata('id_user'),
							'project_id'		=> $inp->post('project_id'),
							'Stakeholder_id'	=> $inp->post('stakeholder_id'),
							'Stakeholder_role'	=> $inp->post('stakeholder_role'),
							'post_date'			=> date('Y-m-d H:i:s')
						);
			// Proses oleh model
			$this->project_stakeholder_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('add', 'Data telah ditambah');
			redirect(site_url('project_stakeholder'),'refresh');
		}
		// end masuk database
	}

	// Edit Project_stakeholder
	public function edit($id)
	{
		// panggil data project_stakeholder yang akan diedit
		$project_stakeholder = $this->project_stakeholder_model->detail($id);

		//ambil data project
		$project = $this->project_model->listing();
		$stakeholder = $this->stakeholder_model->listing();

		//validasi 
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		//jika sudah dicek, dan error
		if($this->form_validation->run() === FALSE) {
		//end validasi

		$data = array( 'title' => 'Edit Data Project Stakeholder',
						'project' =>$project,
						'stakeholder' => $stakeholder,
						'project_stakeholder'	=> $project_stakeholder,
						'content' => 'project_stakeholder/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			
			$data = array( 	'id'				=> $id,
							'id_user'			=> $this->session->userdata('id_user'),
							'project_id'		=> $inp->post('project_id'),
							'Stakeholder_id'	=> $inp->post('stakeholder_id'),
							'Stakeholder_role'	=> $inp->post('stakeholder_role'),
							'post_date'			=> date('Y-m-d H:i:s')
						);
			
			// Proses oleh model
			$this->project_stakeholder_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('berhasil', 'Data telah diedit');
			redirect(site_url('project_stakeholder'),'refresh');
		}
		// end masuk database
	}

	// Data semua stakeholder Project
	public function project($project_id)
	{
		$project     	 = $this->project_model->detail($project_id);
		$project_stakeholder = $this->project_stakeholder_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Stakehorder '.$project->project_name,
						'project_stakeholder' => $project_stakeholder,
						'project' 	=> $project,
						'content' => 'project_stakeholder/daftar_stakeholder'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// daftar stakeholder project
	public function daftar_stakeholder($project_id)
	{
		$project     	 = $this->project_model->detail($project_id);
		$project_stakeholder = $this->project_stakeholder_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Stakehorder '.$project->project_name,
						'project_stakeholder' => $project_stakeholder,
						'project' 	=> $project
					 );
		$this->load->view('project_stakeholder/cetak_daftar_stakeholder', $data, FALSE);
	}
	
	// cetak word
	public function export($project_id)
	{
		$project     	 = $this->project_model->detail($project_id);
		$project_stakeholder = $this->project_stakeholder_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Stakehorder '.$project->project_name,
						'project_stakeholder' => $project_stakeholder,
						'project' 	=> $project
					 );
		$this->load->view('project_stakeholder/word', $data, FALSE);
	}

	// Detail project_stakeholder
	public function detail($id)
	{
		$project_stakeholder= $this->project_stakeholder_model->detail($id);
		$data = array( 'title' => $project_stakeholder->project_name,
						'project_stakeholder' => $project_stakeholder,
						'content' => 'project_stakeholder/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// cetak
	public function cetak($id)
	{
		$project_stakeholder= $this->project_stakeholder_model->detail($id);
		if(!empty($project_stakeholder)){
			$data = array( 'title' => $project_stakeholder->project_name,
						'project_stakeholder' => $project_stakeholder,
					 );
			$this->load->view('project_stakeholder/cetak', $data, FALSE);
		}else{
			$this->session->set_flashdata('cetak', 'Tidak ada Data untuk di cetak');
			redirect(site_url('project_stakeholder'), 'refresh');
		}
	}

	// cetak seluruh
	public function cetak_seluruh()
	{
		$project_stakeholder = $this->project_stakeholder_model->listing2();
		if(!empty($project_stakeholder)){
			$data = array ( 'title' => 'Cetak Seluruh Data Project_stakeholder',
			'project_stakeholder' => $project_stakeholder);
			
			$this->load->view('project_stakeholder/cetak_seluruh', $data, FALSE);
		}else{
			$this->session->set_flashdata('cetak', 'Tidak ada Data untuk di cetak');
			redirect(site_url('project_stakeholder'), 'refresh');
		}
		
	}

	// delete project_stakeholder
	public function delete($id)
	{
		$data = array('id' => $id);
		$this->project_stakeholder_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('hapus', 'Data telah dihapus');
		redirect(site_url('project_stakeholder'),'refresh');
	}


}

/* End of file Project_project_stakeholder.php */
/* Location: ./application/controllers/Project_project_stakeholder.php */