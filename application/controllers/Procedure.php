<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure extends CI_Controller {

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
		$this->load->model('procedure_model');
		$this->load->model('pengaturan_model');
		$this->load->library('form_validation');
	}

	// Halaman Utama
	public function index()
	{
		$procedure = $this->procedure_model->listing();
		$total = $this->procedure_model->total();

		$data = array( 'title' => 'Data Procedure  ('.$total->total.')',
						'procedure' => $procedure,
						'content' => 'procedure/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// tambah
	// public function tambah($project_id='', $stakeholder_id='', $activities_id='')
	// {
	// 	//ambil data project,stakeholder
	// 	$project = $this->project_model->listing();
	// 	$stakeholder = $this->stakeholder_model->listing();
	// 	$activities=$this->activities_model->listing();
	// 	$procedure=$this->procedure_model->listing2();

	// 	$user_id = $this->session->userdata('id_user');
	// 	$pengaturan = $this->pengaturan_model->detail($user_id);
	// 	//validasi
	// 	$this->form_validation->set_rules('project_id', 'Project', 'required',
	// 		array( 'required' => '%s harus dipilih'));
		
	// 	$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
	// 		array( 'required' => '%s harus dipilih'));

	// 	$this->form_validation->set_rules('activities_id', 'Activities','required',
	// 		array( 'required' => '%s harus dipilih'));

	// 	$this->form_validation->set_rules('procedure_id', 'Procedure');
			

	// 	if($this->form_validation->run() === FALSE) {
	// 	// End validasi

	// 	$data = array( 'title' => 'Tambah Data Procedure',
	// 					'project' => $project,
	// 					'stakeholder'=> $stakeholder,
	// 					'activities'=>$activities,
	// 					'procedure' => $procedure,
	// 					'pengaturan' => $pengaturan,
	// 					'content' => 'procedure/tambah'
	// 				 );
	// 	$this->load->view('layout/wrapper', $data, FALSE);

	// 	// jika validasi oke, maka masuk database
	// 	}else{
	// 		$inp = $this->input;
	// 		$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
	// 						'project_id'	=> $inp->post('project_id'),
	// 						'stakeholder_id'	=> $inp->post('stakeholder_id'),
	// 						'procedure_desc'	=> $inp->post('procedure_desc'),
	// 						'activities_id'		=> $inp->post('activities_id'),
	// 						'actor'				=> $inp->post('actor'),
	// 						'resources'			=> $inp->post('resources'),
	// 						'post_date'			=> date('Y-m-d H:i:s')
	// 					);
	// 		// Proses oleh model
	// 		$this->procedure_model->tambah($data);
	// 		//notifikasi dan redirect
	// 		$this->session->set_flashdata('sukses', 'Data telah ditambah');
	// 		redirect(site_url('procedure/tambah'),'refresh');
	// 	}
	// 	// end masuk database
	// }
	
	public function tambah($project_id='', $stakeholder_id='', $activities_id='')
	{
		//ambil data project,stakeholder
		$project = $this->project_model->listing();
		$stakeholder = $this->stakeholder_model->listing();
		$activities=$this->activities_model->listing();
		$procedure=$this->procedure_model->listing2();
		$user_id = $this->session->userdata('id_user');
		$pengaturan = $this->pengaturan_model->detail($user_id);

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));
		
		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('activities_id', 'Activities','required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('procedure_id', 'Procedure');
			

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Tambah Data Procedure',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'activities'=>$activities,
						'procedure' => $procedure,
						'pengaturan' => $pengaturan,
						'content' => 'procedure/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$prodes = $inp->post('procedure_desc[]');
			$prid = $inp->post('project_id');
			$stkid = $inp->post('stakeholder_id');
			$projid = explode(" - ", $prid);
			$stakeid = explode(" - ", $stkid);
			foreach($prodes as $ps){
				$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
						'project_id'	=> $projid[0],
						'stakeholder_id'=> $stakeid[0],
						'procedure_desc'	=> $ps,
						'activities_id'		=> $inp->post('activities_id'),
						'actor'				=> $inp->post('actor'),
						'resources'			=> $inp->post('resources'),
						'post_date'			=> date('Y-m-d H:i:s')
				);
				// Proses oleh model
				$this->procedure_model->tambah($data);
			}

			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('procedure/tambah'),'refresh');
		}
		// end masuk database
	}

	// Edit data
	public function edit($procedure_id)
	{
		// ambil data suhu tubuh yang akan diedit
		$procedure = $this->procedure_model->detail($procedure_id);

		//ambil data project
		$project = $this->project_model->listing();

		//ambil data stakeholder
		$stakeholder = $this->stakeholder_model->listing();
		$activities=$this->activities_model->listing();
		
		

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('activities_id', 'Activities','required',
			array( 'required' => '%s harus dipilih'));


		$this->form_validation->set_rules('procedure_id', 'Procedure');

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Procedure',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'activities'=>$activities,
						'procedure' => $procedure,
						'content' => 'procedure/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'procedure_id'		=> $procedure_id,
							'id_user'		=> $this->session->userdata('id_user'),
							'project_id'	=> $inp->post('project_id'),
							'stakeholder_id'=> $inp->post('stakeholder_id'),
							'procedure_desc'	=> $inp->post('procedure_desc'),
							'activities_id'		=> $inp->post('activities_id'),
							'actor'				=> $inp->post('actor'),
							'resources'			=> $inp->post('resources')
						);
			// Proses oleh model
			$this->procedure_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('procedure'),'refresh');

		}
		// end masuk database
	}

	// Hapus
	public function delete($procedure_id)
	{
		$data = array('procedure_id' => $procedure_id);
		//proses hapus
		$this->procedure_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('procedure'),'refresh');
	}


	// Daftar procedure project

	public function activities($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$procedure = $this->procedure_model->activities($activities_id);

		

		$data = array( 'title' => 'Daftar Procedure activitas--'.$activities->activities_desc,
						'procedure' => $procedure,
						'activities' 	=> $activities,
						'content' => 'procedure/daftar_procedure_activities'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar procedure project 


	public function daftar_procedure_activities($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$procedure = $this->procedure_model->activities($activities_id);
		

		$data = array( 'title' => 'Daftar Procedure activitas--'.$activities->activities_desc,
						'procedure' => $procedure,
						'activities' 	=> $activities
					 );
		$this->load->view('procedure/cetak_daftar_procedure_activities', $data, FALSE);
	}

	
	// word 

	public function export_activities($activities_id)
	{
		$activities  = $this->activities_model->detail($activities_id);
		$procedure = $this->procedure_model->activities($activities_id);
		

		$data = array( 'title' => 'Daftar Procedure activitas--'.$activities->activities_desc,
						'procedure' => $procedure,
						'activities' 	=> $activities
					 );
		$this->load->view('procedure/word_daftar_procedure_activities', $data, FALSE);
	}

	
	// detail
	public function detail($procedure_id)
	{
		$procedure = $this->procedure_model->detail($procedure_id);
		$project_id	= $procedure->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $procedure->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$activities_id	= $procedure->activities_id;
		$activities     = $this->activities_model->detail($activities_id);

		$data = array( 'title' => 'Data Procedure '.$project->project_name.'  '.$stakeholder->stakeholder_name,
						'procedure' => $procedure,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'activities'=>$activities,
						'content' => 'procedure/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($procedure_id)
	{
		$procedure = $this->procedure_model->detail($procedure_id);
		$project_id	= $procedure->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $procedure->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$activities_id	= $procedure->activities_id;
		$activities     = $this->activities_model->detail($activities_id);

		$data = array( 'title' => 'Data Procedure  '.$project->project_name,
						'procedure' => $procedure,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'activities'=>$activities,
						'content' => 'procedure/detail'
					 );
		$this->load->view('procedure/cetak', $data, FALSE);
	}
	

}

/* End of file Procedure.php */
/* Location: ./application/controllers/Procedure.php */