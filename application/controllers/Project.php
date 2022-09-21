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

		// validasi input
		$valid = $this->form_validation;
		// // check project_name
		$valid->set_rules('project_name[]','Nama Project','required',
				array(  'required' => '%s harus diisi'));
		
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Data Project ('.$total->total.')',
						'project' => $project,
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
				
				//print_r($data);
					
					// // Proses oleh model
					$this->project_model->tambah($data);
					
	
				}
			// //notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
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
			$this->session->set_flashdata('sukses', 'Data telah diedit');
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
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('project'),'refresh');
	}

}


/* End of file Project.php */
/* Location: ./application/controllers/Project.php */