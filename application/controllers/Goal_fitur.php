<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goal_fitur extends CI_Controller{
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
		$user_id = $this->session->userdata('id_user');
		$goal1 = $this->goal_model->detail2($user_id);	
		$total = $this->goal_model->total();
		$goal = $this->goal_model->listing();
		$listParent = $this->goal_model->listParent();

		$data = array( 'title' => 'Data Goal  ('.$total->total.')',
						'goal' => $goal,
						'goal1' => $goal1,
						'plist' => $listParent,
						'content' => 'goal/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
