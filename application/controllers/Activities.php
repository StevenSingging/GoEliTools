<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

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
		$this->load->model('pengaturan_model');
		$this->load->library('form_validation');
	}

	// Halaman Utama
	public function index()
	{
		$activities = $this->activities_model->listing();
		$total = $this->activities_model->total();

		$data = array( 'title' => 'Data Activities  ('.$total->total.')',
						'activities' => $activities,
						'content' => 'activities/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// // tambah
	// public function tambah($project_id='', $stakeholder_id='', $goal_id='')
	// {
	// 	//ambil data project,stakeholder
	// 	$project = $this->project_model->listing();
	// 	$stakeholder = $this->stakeholder_model->listing();
	// 	$goal=$this->goal_model->listing();
	// 	$activities=$this->activities_model->listing2();

	// 	$user_id = $this->session->userdata('id_user');
	// 	$pengaturan = $this->pengaturan_model->detail($user_id);
	// 	//validasi
	// 	$this->form_validation->set_rules('project_id', 'Project', 'required',
	// 		array( 'required' => '%s harus dipilih'));
		
	// 	$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
	// 		array( 'required' => '%s harus dipilih'));

	// 	$this->form_validation->set_rules('goal_id', 'Goal');

	// 	$this->form_validation->set_rules('activities_id', 'Activities');
			

	// 	if($this->form_validation->run() === FALSE) {
	// 	// End validasi

	// 	$data = array( 'title' => 'Tambah Data Activities',
	// 					'project' => $project,
	// 					'stakeholder'=> $stakeholder,
	// 					'goal'=>$goal,
	// 					'pengaturan'=>$pengaturan,
	// 					'activities' => $activities,
	// 					'content' => 'activities/tambah'
	// 				 );
	// 	$this->load->view('layout/wrapper', $data, FALSE);

	// 	// jika validasi oke, maka masuk database
	// 	}else{
	// 		$inp = $this->input;
	// 		$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
	// 						'project_id'	=> $inp->post('project_id'),
	// 						'stakeholder_id'	=> $inp->post('stakeholder_id'),
	// 						'activities_desc'		=> $inp->post('activities_desc'),
	// 						'parent_activities_id'=> $inp->post('activities_id'),
	// 						'goal_id'		=> $inp->post('goal_id'),
	// 						'post_date'		=> date('Y-m-d H:i:s')
	// 					);
	// 		// Proses oleh model
	// 		$this->activities_model->tambah($data);
	// 		//notifikasi dan redirect
	// 		$this->session->set_flashdata('sukses', 'Data telah ditambah');
	// 		redirect(site_url('activities/tambah'),'refresh');
	// 	}
	// 	// end masuk database
	// }
	
	public function tambah($project_id='', $stakeholder_id='', $goal_id='')
	{
		//ambil data project,stakeholder
		$project = $this->project_model->listing();
		$stakeholder = $this->stakeholder_model->listing();
		$goal=$this->goal_model->listing();
		$activities=$this->activities_model->listing2();
		$user_id = $this->session->userdata('id_user');
		$pengaturan = $this->pengaturan_model->detail($user_id);

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));
		
		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('goal_id', 'Goal');

		$this->form_validation->set_rules('activities_id', 'Activities');
			

		if($this->form_validation->run() === FALSE) {
		// End validasi
		$data = array( 'title' => 'Tambah Data Activities',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'goal'=>$goal,
						'pengaturan'=>$pengaturan,
						'activities' => $activities,
						'content' => 'activities/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$actdes = $inp->post('activities_desc[]');
			$prid = $inp->post('project_id');
			$stkid = $inp->post('stakeholder_id');
			$projid = explode(" - ", $prid);
			$stakeid = explode(" - ", $stkid);
			foreach( $actdes as $ad){
				if(empty($inp->post('goal_id'))){
					$data = array( 	'id_user'	=> $this->session->userdata('id_user'),
						'project_id'	=> $projid[0],
						'stakeholder_id'=> $stakeid[0],
						'activities_desc'		=> $ad,
						'parent_activities_id'=> $inp->post('activities_id'),
						'post_date'		=> date('Y-m-d H:i:s')
					);
				}else{
					$data = array( 	'id_user'	=> $this->session->userdata('id_user'),
						'project_id'	=> $projid[0],
						'stakeholder_id'=> $stakeid[0],
						'activities_desc'		=> $ad,
						'goal_id'=> $inp->post('goal_id'),
						'parent_activities_id'=> 0,
						'post_date'		=> date('Y-m-d H:i:s')
					);
				}
				
				// Proses oleh model
				$this->activities_model->tambah($data);
			}
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('activities/tambah'),'refresh');
		}
		// end masuk database
	}

	// Edit data
	public function edit($activities_id)
	{
		// ambil data suhu tubuh yang akan diedit
		$activities = $this->activities_model->detail($activities_id);

		//ambil data project
		$project = $this->project_model->listing();

		//ambil data stakeholder
		$stakeholder = $this->stakeholder_model->listing();
		$goal=$this->goal_model->listing();
		
		$activities2=$this->activities_model->listing2();

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('goal_id', 'Goal');

		$this->form_validation->set_rules('activities_id', 'Activities');

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Activities',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'goal'=>$goal,
						'activities' => $activities,
						'activities2'=>$activities2,
						'content' => 'activities/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'activities_id'		=> $activities_id,
							'id_user'		=> $this->session->userdata('id_user'),
							'project_id'	=> $inp->post('project_id'),
							'stakeholder_id'=> $inp->post('stakeholder_id'),
							'activities_desc'		=> $inp->post('activities_desc'),
							'parent_activities_id'=> $inp->post('activities_id'),
							'goal_id'		=> $inp->post('goal_id'),
						);
			// Proses oleh model
			$this->activities_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('activities'),'refresh');

		}
		// end masuk database
	}

	// Hapus
	public function delete($activities_id)
	{
		$data = array('activities_id' => $activities_id);
		//proses hapus
		$this->activities_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('activities'),'refresh');
	}


	// Daftar activities project

	public function project($project_id)
	{
		$project  = $this->project_model->detail($project_id);
		$activities = $this->activities_model->project($project_id);

		

		$data = array( 'title' => 'Daftar Activities Project--'.$project->project_name,
						'activities' => $activities,
						'project' 	=> $project,
						'content' => 'activities/daftar_activities_project'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar activities project 

	// Daftar activities stakeholder

	public function stakeholder($stakeholder_id)
	{
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);
		$activities = $this->activities_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Activities stakeholder'.$stakeholder->stakeholder_name,
						'activities' => $activities,
						'stakeholder' 	=> $stakeholder,
						'content' => 'activities/daftar_activities_stakeholder'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar activities stakeholder 

	public function daftar_activities_project($project_id)
	{
		$project     = $this->project_model->detail($project_id);
		$activities = $this->activities_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Activities Project '.$project->project_name,
						'activities' => $activities,
						'project' 	=> $project
					 );
		$this->load->view('activities/cetak_daftar_activities_project', $data, FALSE);
	}

	public function daftar_activities_stakeholder($stakeholder_id)
	{
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);
		$activities = $this->activities_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Activities Stakeholder '.$stakeholder->stakeholder_name,
						'activities' => $activities,
						'stakeholder' 	=> $stakeholder
					 );
		$this->load->view('activities/cetak_daftar_activities_stakeholder', $data, FALSE);
	}
	// word 

	public function export_project($project_id)
	{
		$project     = $this->project_model->detail($project_id);
		$activities = $this->activities_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Activities Project '.$project->nama_project,
						'activities' => $activities,
						'project' 	=> $project
					 );
		$this->load->view('activities/word_daftar_activities_project', $data, FALSE);
	}

	public function export_stakeholder($stakeholder_id)
	{
		$stakeholder = $this->stakeholder_model->detail($stakeholder_id);
		$activities = $this->activities_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Activities Stakeholder '.$stakeholder->stakeholder_name,
						'activities' => $activities,
						'stakeholder' 	=> $stakeholder
					 );
		$this->load->view('activities/word_daftar_activities_stakeholder', $data, FALSE);
	}

	// detail
	public function detail($activities_id)
	{
		$activities = $this->activities_model->detail($activities_id);
		$project_id	= $activities->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $activities->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$goal_id	= $activities->goal_id;
		$goal     = $this->goal_model->detail($goal_id);

		$data = array( 'title' => 'Data Activities '.$project->project_name.'  '.$stakeholder->stakeholder_name,
						'activities' => $activities,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'goal'=>$goal,
						'content' => 'activities/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($activities_id)
	{
		$activities = $this->activities_model->detail($activities_id);
		$project_id	= $activities->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $activities->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$goal_id	= $activities->goal_id;
		$goal     = $this->goal_model->detail($goal_id);

		$data = array( 'title' => 'Data Activities  '.$project->project_name,
						'activities' => $activities,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'goal'=>$goal,
						'content' => 'activities/detail'
					 );
		$this->load->view('activities/cetak', $data, FALSE);
	}
	

}

/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */