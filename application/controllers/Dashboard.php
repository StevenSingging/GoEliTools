<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// load all table model
	public function __construct()
	{
		parent::__construct();
		// Panggil fungsi check login
		$this->my_login->check_login();

		 $this->load->model('project_model');
		 $this->load->model('stakeholder_model');
		 $this->load->model('project_stakeholder_model');
		 $this->load->model('goal_model');
		 $this->load->model('activities_model');
		 $this->load->model('procedure_model');
		 $this->load->model('procedure_detail_model');

	}

	// load model, library dll
	//public function __construct()
	//{
	//	parent::__construct();
		// Panggil fungsi check login
	//	$this->my_login->check_login();
	//}

	// main page dashboard
	public function index()
	{
		// Data total per tabel
		$project 		= $this->project_model->total();
		$stakeholder	= $this->stakeholder_model->total();
		$project_stakeholder = $this->project_stakeholder_model->total();
		$user 			= $this->user_model->total();
		$goal 			= $this->goal_model->total();
		$activities		= $this->activities_model->total();
		$procedure		= $this->procedure_model->total();
		$procdet		= $this->procedure_detail_model->total();

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
		// End data total
		$data = array ('title'			 => 'Halaman Dashboard',
						'project'		=>$project,
						'stakeholder'	=>$stakeholder,
						'project_stakeholder' =>$project_stakeholder,
						'user'			=>$user,
						'goal'			=>$goal,
						'activities'	=>$activities,
						'procedure'		=>$procedure,
						'procdet'		=>$procdet,
						'content'		=> 'dashboard/index'
					   );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */