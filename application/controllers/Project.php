<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('project_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$project = $this->project_model->listing();
		$total = $this->project_model->total();
		$user_id = $this->session->userdata('id_user');
		$project1 = $this->project_model->detail2($user_id);
		$arem = $this->project_model->arem();

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

		// validasi input
		$valid = $this->form_validation;
		// // check project_name
		$valid->set_rules('project_name[]','Nama Project','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi
		foreach($arem as $ar){
			$aremdata = json_decode(json_encode($ar), true);
			$data = array( 	'id_user'		=> $aremdata['id_user'],
								'project_id'	=> $aremdata['project_id'],
								'project_name'	=> $aremdata['project_name'],
								'project_desc'	=> $aremdata['project_desc'],
								'post_date'		=> $aremdata['post_date']
							);
			// // Proses oleh model
			$this->project_model->tambahArem($data);
		}
		$data = array( 'title' => 'Data Proyek ('.$total->total.')',
						'project' => $project,
						'project1' => $project1,
						'arem' => $arem,
						'content' => 'project/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$id = $this->session->userdata('id_user');
			$pname = $inp->post('project_name[]');
			$pdesc = $inp->post('project_desc[]');
			$pdate = date('Y-m-d H:i:s');
			
			foreach ($pname as $key => $value){
				$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
									'project_name'	=> $pname[$key],
									'project_desc'	=> $pdesc[$key],
									'post_date'		=> date('Y-m-d H:i:s')
								);
					// // Proses oleh model
					$this->project_model->tambah($data);
			}
			// //notifikasi dan redirect
			$this->session->set_flashdata('add', 'Data telah ditambah');
			redirect(site_url('project'),'refresh');
		}
		//end masuk database
		
	}

	// Edit Project
	public function edit($project_id)
	{
		// panggil data project yang akan diedit
		$project = $this->project_model->detail($project_id);

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('project_name','Nama Project','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Edit Data Project : ' .$project->project_name,
						'project' => $project,
						'content' => 'project/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			
			$data = array( 	'project_id'	=> $project_id,
							'id_user'		=> $this->session->userdata('id_user'),
							'project_name'	=> $inp->post('project_name'),
							'project_desc'	=> $inp->post('project_desc'),
							'post_date'		=> date('Y-m-d H:i:s'),
						);
			
			// Proses oleh model
			$this->project_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('berhasil', 'Data telah diedit');
			redirect(site_url('project'),'refresh');
		}
		// end masuk database
	}

	// Detail project
	public function detail($project_id)
	{
		$project= $this->project_model->detail($project_id);
		$data = array( 'title' => $project->project_name,
						'project' => $project,
						'content' => 'project/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// cetak
	public function cetak($project_id)
	{
		$project= $this->project_model->detail($project_id);
		$data = array( 'title' => $project->project_name,
						'project' => $project
					 );
		$this->load->view('project/cetak', $data, FALSE);
	}

	// cetak seluruh
	public function cetak_seluruh()
	{
		$project = $this->project_model->listing();
		$data = array ( 'title' => 'Cetak Seluruh Data Project',
						'project' => $project);
		$this->load->view('project/cetak_seluruh', $data, FALSE);
	}

	// delete project
	public function delete($project_id)
	{
		$data = array('project_id' => $project_id);
		//proses hapus
		$this->project_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('hapus', 'Data telah dihapus');
		redirect(site_url('project'),'refresh');
	}

}


/* End of file Project.php */
/* Location: ./application/controllers/Project.php */
