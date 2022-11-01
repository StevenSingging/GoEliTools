<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goal extends CI_Controller {

	// load data model
	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('project_model');
		$this->load->model('stakeholder_model');
		$this->load->model('project_stakeholder_model');
		$this->load->model('goal_model');
		$this->load->model('pengaturan_model');
		$this->load->library('form_validation');
	}

	// Halaman Utama
	public function index()
	{
		$goal = $this->goal_model->listing();
		$total = $this->goal_model->total();
		$listParent = $this->goal_model->listParent();

		$data = array( 'title' => 'Data Goal  ('.$total->total.')',
						'goal' => $goal,
						'plist' => $listParent,
						'content' => 'goal/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// Daftar goal project

	public function project($project_id)
	{
		$project  = $this->project_model->detail($project_id);
		$goal = $this->goal_model->project($project_id);

		

		$data = array( 'title' => 'Daftar Goal Project--'.$project->project_name,
						'goal' => $goal,
						'project' 	=> $project,
						'content' => 'goal/daftar_goal_project'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar goal project 

	// Daftar goal stakeholder

	public function stakeholder($stakeholder_id)
	{
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);
		$goal = $this->goal_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Goal stakeholder'.$stakeholder->stakeholder_name,
						'goal' => $goal,
						'stakeholder' 	=> $stakeholder,
						'content' => 'goal/daftar_goal_stakeholder'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar goal stakeholder 

	public function daftar_goal_project($project_id)
	{
		$project     = $this->project_model->detail($project_id);
		$goal = $this->goal_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Goal Project '.$project->project_name,
						'goal' => $goal,
						'project' 	=> $project
					 );
		$this->load->view('goal/cetak_daftar_goal_project', $data, FALSE);
	}

	public function daftar_goal_stakeholder($stakeholder_id)
	{
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);
		$goal = $this->goal_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Goal Stakeholder '.$stakeholder->stakeholder_name,
						'goal' => $goal,
						'stakeholder' 	=> $stakeholder
					 );
		$this->load->view('goal/cetak_daftar_goal_stakeholder', $data, FALSE);
	}
	// word 

	public function export_project($project_id)
	{
		$project     = $this->project_model->detail($project_id);
		$goal = $this->goal_model->project($project_id);
		

		$data = array( 'title' => 'Daftar Goal Project '.$project->nama_project,
						'goal' => $goal,
						'project' 	=> $project
					 );
		$this->load->view('goal/word_daftar_goal_project', $data, FALSE);
	}

	public function export_stakeholder($stakeholder_id)
	{
		$stakeholder = $this->stakeholder_model->detail($stakeholder_id);
		$goal = $this->goal_model->stakeholder($stakeholder_id);
		

		$data = array( 'title' => 'Daftar Goal Stakeholder '.$stakeholder->stakeholder_name,
						'goal' => $goal,
						'stakeholder' 	=> $stakeholder
					 );
		$this->load->view('goal/word_daftar_goal_stakeholder', $data, FALSE);
	}

	// detail
	public function detail($goal_id)
	{
		$goal = $this->goal_model->detail($goal_id);
		$project_id	= $goal->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $goal->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$data = array( 'title' => 'Data Goal '.$project->project_name.'  '.$stakeholder->stakeholder_name,
						'goal' => $goal,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'content' => 'goal/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($goal_id)
	{
		$goal = $this->goal_model->detail($goal_id);
		$project_id	= $goal->project_id;
		$project     = $this->project_model->detail($project_id);

		$stakeholder_id	= $goal->stakeholder_id;
		$stakeholder     = $this->stakeholder_model->detail($stakeholder_id);

		$data = array( 'title' => 'Data Goal  '.$project->project_name,
						'goal' => $goal,
						'project' 	=> $project,
						'stakeholder'=>$stakeholder,
						'content' => 'goal/detail'
					 );
		$this->load->view('goal/cetak', $data, FALSE);
	}
	// tambah
	// public function tambah($project_id='', $stakeholder_id='')
	// {
	// 	//ambil data project,stakeholder
	// 	$project = $this->project_model->listing();
	// 	$stakeholder = $this->stakeholder_model->listing();
	// 	$goal = $this->goal_model->listing2();
		
	// 	$user_id = $this->session->userdata('id_user');
	// 	$pengaturan = $this->pengaturan_model->detail($user_id);
		
	// 	//validasi
	// 	$this->form_validation->set_rules('project_id', 'Project', 'required',
	// 		array( 'required' => '%s harus dipilih'));
		
	// 	$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
	// 		array( 'required' => '%s harus dipilih'));

	// 	$this->form_validation->set_rules('goal_id', 'Goal');
			

	// 	if($this->form_validation->run() === FALSE) {
	// 	// End validasi
		
	// 	$data = array( 'title' => 'Tambah Data Goal',
	// 					'project' => $project,
	// 					'stakeholder'=> $stakeholder,
	// 					'goal' => $goal,
	// 					'pengaturan' => $pengaturan,
	// 					'project' => $project,
	// 					'content' => 'goal/tambah'
	// 				 );
					
					
	// 	$this->load->view('layout/wrapper', $data, FALSE);
	// 	// jika validasi oke, maka masuk database
	// 	}else{
	// 		$inp = $this->input;
	// 		$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
	// 						'project_id'	=> $inp->post('project_id'),
	// 						'stakeholder_id'	=> $inp->post('stakeholder_id'),
	// 						'goal_desc'		=> $inp->post('goal_desc'),
	// 						'parent_goal_id'=> $inp->post('goal_id'),
	// 						'goal_type'		=> $inp->post('goal_type'),
	// 						'post_date'		=> date('Y-m-d H:i:s')
	// 					);
	// 		// Proses oleh model
	// 		$this->goal_model->tambah($data);
	// 		//notifikasi dan redirect
	// 		$this->session->set_flashdata('sukses', 'Data telah ditambah');
	// 		redirect(site_url('goal/tambah'),'refresh');
			
	// 	}
	// 	// end masuk database
		
	// }
	public function tambah($project_id='', $stakeholder_id='')
	{
		//ambil data project,stakeholder
		$project = $this->project_model->listing();
		$stakeholder = $this->stakeholder_model->listing();
		$goal=$this->goal_model->listing2();
		$goal2 = $this->goal_model->listing();
		$user_id = $this->session->userdata('id_user');
		$pengaturan = $this->pengaturan_model->detail($user_id);

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));
		
		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('goal_id', 'Goal');
			

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Tambah Data Goal',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'goal' => $goal,
						'pengaturan' => $pengaturan,
						'content' => 'goal/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$prid = $inp->post('project_id');
			$stkid = $inp->post('stakeholder_id');
			$projid = explode(" - ", $prid);
			$stakeid = explode(" - ", $stkid);
			if($inp->post('goal_id')!="pilihan"){
				$sub = $inp->post('subgoal[]');
				$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
								'project_id'	=> $projid[0],
								'stakeholder_id'=> $stakeid[0],
								'goal_desc'		=> $inp->post('goal_desc'),
								'parent_goal_id'=> $inp->post('goal_id'),
								'goal_type'		=> $inp->post('goal_type'),
								'post_date'		=> date('Y-m-d H:i:s')
							);
							$this->goal_model->tambah($data);
				foreach( $sub as $s ){
					$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
								'project_id'	=> $projid[0],
								'stakeholder_id'=> $stakeid[0],
								'goal_desc'		=> $s,
								'parent_goal_id'=> $inp->post('goal_id'),
								'goal_type'		=> $inp->post('goal_type'),
								'post_date'		=> date('Y-m-d H:i:s')
							);
							//print_r($data);
					$this->goal_model->tambah($data);
				}
			}else{
				$data = array('id_user'=> $this->session->userdata('id_user'),
					'project_id'	=> $projid[0],
					'stakeholder_id'=> $stakeid[0],
					'parent_goal_id'=> 0,
					'goal_desc'		=> $inp->post('goal_desc'),
					'goal_type'		=> $inp->post('goal_type'),
					'post_date'		=> date('Y-m-d H:i:s')
				);
				$this->goal_model->tambah($data);
				//print_r($data);
				$pgid = $this->goal_model->getId();
				$sub = $inp->post('subgoal[]');
				foreach( $sub as $s ){
					$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
								'project_id'	=> $projid[0],
								'stakeholder_id'=> $stakeid[0],
								'goal_desc'		=> $s,
								'parent_goal_id'=> $pgid,
								'goal_type'		=> $inp->post('goal_type'),
								'post_date'		=> date('Y-m-d H:i:s')
							);
					//print_r($data);
					$this->goal_model->tambah($data);
				}
				
			}
			//$this->goal_model->tambah($data);
			
			//$this->load->view('goal/tambah');
			// Proses oleh model
			
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('goal/tambah'),'refresh');
			//$this->load->view('goal/coba');
		}
		// end masuk database
	}

	// Edit data
	public function edit($goal_id)
	{
		// ambil data suhu tubuh yang akan diedit
		$goal = $this->goal_model->detail($goal_id);

		//ambil data project
		$project = $this->project_model->listing();

		//ambil data stakeholder
		$stakeholder = $this->stakeholder_model->listing();

		$goal2=$this->goal_model->listing2();

		//validasi
		$this->form_validation->set_rules('project_id', 'Project', 'required',
			array( 'required' => '%s harus dipilih'));

		$this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
			array( 'required' => '%s harus dipilih'));


		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Goal',
						'project' => $project,
						'stakeholder'=> $stakeholder,
						'goal' => $goal,
						'goal2'=>$goal2,
						'content' => 'goal/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'goal_id'		=> $goal_id,
							'id_user'		=> $this->session->userdata('id_user'),
							'project_id'	=> $inp->post('project_id'),
							'stakeholder_id'=> $inp->post('stakeholder_id'),
							'goal_desc'		=> $inp->post('goal_desc'),
							'parent_goal_id'=> $inp->post('p_goal_id'),
							'goal_type'		=> $inp->post('goal_type'),
						);
			// Proses oleh model
			$this->goal_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('goal'),'refresh');

		}
		// end masuk database
	}

	// Hapus
	public function delete($goal_id)
	{
		$data = array('goal_id' => $goal_id);
		$listParent = $this->goal_model->listParent();
		$listActgoal = $this->goal_model->listActgoal();
		
		foreach($listParent as $lp => $value ){
			foreach($listActgoal as $la => $hasil){
				$hsl = json_decode(json_encode($hasil), true);
				$val = json_decode(json_encode($value), true);
				if($data['goal_id']==$val['parent_goal_id'] OR $data['goal_id']==$hsl['goal_id'] ){
					$this->session->set_flashdata('alert', 'Data Masih Digunakan');
					return redirect(site_url('goal'), 'refresh');
				}else{
					//proses hapus
					$this->goal_model ->delete($data);
					//notifikasi dan redirect
					$this->session->set_flashdata('hapus', 'Data telah dihapus');
					redirect(site_url('goal'),'refresh');
				}
			}
		}
		//$this->load->view('goal/coba');
	}


}

/* End of file Goal.php */
/* Location: ./application/controllers/Goal.php */