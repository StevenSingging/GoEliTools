<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
	public function index()
	{
        $lapGoal = $this->goal_model->laporanGoal();
        $lapAct = $this->goal_model->laporanAct();
        $lapProc = $this->goal_model->laporanProc();
        $goal = $this->goal_model->laporan();

        if(isset($_SESSION['sukses'])){
			unset($_SESSION['sukses']);
		}else if(isset($_SESSION['add'])){
			unset($_SESSION['add']);
		}else if(isset($_SESSION['hapus'])){
			unset($_SESSION['hapus']);
		}else if(isset($_SESSION['gagal'])){
			unset($_SESSION['gagal']);
		}else if(isset($_SESSION['warning'])){
			unset($_SESSION['warning']);
		}
        
		$data = array( 'title'	=>'Laporan',
                       'goal'   => $lapGoal,
                       'activities' => $lapAct,
                       'procedure' => $lapProc,
						'content'	=>'laporan/index'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}