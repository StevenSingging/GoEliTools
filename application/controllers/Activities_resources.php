<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_resources extends CI_Controller {

	// load data model
	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('project_model');
		$this->load->model('stakeholder_model');
		$this->load->model('project_stakeholder_model');
		$this->load->model('goal_model');
		$this->load->model('activities_model');
		$this->load->model('activities_resources_model');
		$this->load->library('form_validation');
	}

	// Halaman Utama
	public function index()
	{
		$activities_resources = $this->activities_resources_model->listing();
		$total = $this->activities_resources_model->total();
		$arem = $this->activities_resources_model->arem();
		
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

		foreach($arem as $ar){
			$aremdata = json_decode(json_encode($ar), true);
			$data = array( 	'id'			=> $aremdata['id'],
							'id_user'		=> $aremdata['id_user'],
							'activities_id'	=> $aremdata['activities_id'],
							'actor'			=> $aremdata['actor'],
							'resources'		=> $aremdata['resources'],
							'post_date'		=> $aremdata['post_date']
						);
			// // Proses oleh model
			$this->activities_resources_model->tambahArem($data);
		}

		$data = array( 'title' => 'Data Sumber Daya Aktifitas ('.$total->total.')',
						'activities_resources' => $activities_resources,
						'arem'	=> $arem,
						'content' => 'activities_resources/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// tambah
	public function tambah($activities_id='')
	{
		//ambil data project,stakeholder
		$activities=$this->activities_model->listing();
		$activities_resources=$this->activities_resources_model->listing();

		//validasi
		$this->form_validation->set_rules('activities_id', 'Activities', 'required',
			array( 'required' => '%s harus dipilih'));
				

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Tambah Data Activities Resources',
						'activities' => $activities,
						'content' => 'activities_resources/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
							'activities_id'		=> $inp->post('activities_id'),
							'actor'			=> $inp->post('actor'),
							'resources'=> $inp->post('resources'),
							'post_date'		=> date('Y-m-d H:i:s')
						);
			// Proses oleh model
			$this->activities_resources_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('activities_resources/tambah'),'refresh');
		}
		// end masuk database
	}

	// Edit data
	public function edit($id)
	{
		// ambil data yang akan diedit
		$activities_resources = $this->activities_resources_model->detail($id);

		//ambil data activities
		$activities = $this->activities_model->listing();

		
		//validasi

		$this->form_validation->set_rules('activities_id', 'Activities', 'required',
			array( 'required' => '%s harus dipilih'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Activities Resources',
						'activities' => $activities,
						'activities_resources'=>$activities_resources,
						'content' => 'activities_resources/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'id'		=> $id,
							'id_user'		=> $this->session->userdata('id_user'),
							'activities_id'	=> $inp->post('activities_id'),
							'actor'			=> $inp->post('actor'),
							'resources'		=> $inp->post('resources')
						);
			// Proses oleh model
			$this->activities_resources_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('activities_resources'),'refresh');

		}
		// end masuk database
	}

	// Hapus
	public function delete($id)
	{
		$data = array('id' => $id);
		//proses hapus
		$this->activities_resources_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('activities_resources'),'refresh');
	}


	// Daftar activities project

	public function activities($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$activities_resources = $this->activities_resources_model->activities($activities_id);

		

		$data = array( 'title' => 'Daftar Sumber Data Aktifitas--',
						'activities_resources' => $activities_resources,
						'activities' 	=> $activities,
						'content' => 'activities_resources/daftar_activities_resources'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar activities project 

	
	public function daftar_activities_resources($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$activities_resources = $this->activities_resources_model->activities($activities_id);
		

		$data = array( 'title' => 'Daftar Sumber Data Aktifitas--',
						'activities_resources' => $activities_resources,
						'activities' 	=> $activities
					 );
		$this->load->view('activities_resources/cetak_daftar_activities_resources', $data, FALSE);
	}

	
	// word 

	public function export_activities_resources($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$activities_resources = $this->activities_resources_model->activities($activities_id);
		

		$data = array( 'title' => 'Daftar Sumber Data Aktifitas--',
						'activities_resources' => $activities_resources,
						'activities' 	=> $activities,
						'content' => 'activities_resources/daftar_activities_resources'
					 );
		$this->load->view('activities_resources/word_daftar_activities_resources', $data, FALSE);
	}

	

	// detail
	public function detail($id)
	{
		$activities_resources = $this->activities_resources_model->detail($id);
		$activities_id	= $activities_resources->activities_id;
		$activities = $this->activities_model->detail($activities_id);
		

		$data = array( 'title' => 'Data Activities Resources',
						'activities_resources'=>$activities_resources,
						'activities' => $activities,
						'content' => 'activities_resources/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($id)
	{
		$activities_resources = $this->activities_resources_model->detail($id);
		$activities_id	= $activities_resources->activities_id;
		$activities = $this->activities_model->detail($activities_id);
		

		$data = array( 'title' => 'Data Activities Resources',
						'activities_resources'=>$activities_resources,
						'activities' => $activities,
						'content' => 'activities_resources/detail'
					 );
		$this->load->view('activities_resources/cetak', $data, FALSE);
	}
	

}

/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */