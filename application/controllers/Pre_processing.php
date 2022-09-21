<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_processing extends CI_Controller {

	// load data model
	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('pre_processing_model');
	}

	// Halaman Utama
	public function index()
	{
		$data = array( 'title' => 'Pre-Processing',
						'content' => 'pre_processing/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function ver_objek()
	{
 		
		$verifikasi = $this->pre_processing_model->verifikasi_objek();
	}

	public function proses()
	{
 		
		$goal = $this->pre_processing_model->goal_pre();
 		$activities = $this->pre_processing_model->activities_pre();
 		$procedure = $this->pre_processing_model->procedure_pre();
 		$procedure_detail = $this->pre_processing_model->procedure_detail_pre();
	}
	
	public function ekstraksi_objek()
	{
 		
		$goal = $this->pre_processing_model->goal_object();
 		$activities = $this->pre_processing_model->activities_object();
 		$procedure = $this->pre_processing_model->procedure_object();
 		$procedure_detail=$this->pre_processing_model->procedure_detail_object();
 		$aktor = $this->pre_processing_model->actor_object();
 		$resources = $this->pre_processing_model->resources_object();
 		$semilarity = $this->pre_processing_model->sem_object();
		$semcosine = $this->pre_processing_model->sem_cosine();
	}
	
	public function ekstraksi_relasi_objek()
	{
 		
		$relation = $this->pre_processing_model->object_relation();
	}

	public function hasil_objek()
	{
		$object = $this->pre_processing_model->object_data();
		$data = array( 'title' => 'OBJECT LIST ',
						'object' => $object,
						'content' => 'pre_processing/data_object'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function cetak_objek()
	{
		$object = $this->pre_processing_model->object_data();
		$data = array( 'title' => 'OBJECT LIST ',
						'object' => $object
					 );
		$this->load->view('pre_processing/print_object_data', $data, FALSE);
	}

	public function export_data_objek()
	{
		$object = $this->pre_processing_model->object_data();
		$data = array( 'title' => 'OBJECT LIST ',
						'object' => $object
					 );
		$this->load->view('pre_processing/word_object_data', $data, FALSE);
	}

	public function hasil_relasi_objek()
	{
		$object_relation = $this->pre_processing_model->object_relation_data();
		$data = array( 'title' => 'OBJECT RELATION LIST ',
						'object_relation' => $object_relation,
						'content' => 'pre_processing/data_object_relation'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	public function cetak_relasi_objek()
	{
		$object_relation = $this->pre_processing_model->object_relation_data();
		$data = array( 'title' => 'OBJECT RELATION LIST ',
						'object_relation' => $object_relation
					 );
		$this->load->view('pre_processing/print_object_relation_data', $data, FALSE);
	}

	public function export_data_relasi_objek()
	{
		$object_relation = $this->pre_processing_model->object_relation_data();
		$data = array( 'title' => 'OBJECT RELATION LIST ',
						'object_relation' => $object_relation
					 );
		$this->load->view('pre_processing/word_object_relation_data', $data, FALSE);
	}

	
	public function data_kebutuhan()
	{
		//$object_relation = $this->pre_processing_model->pre_object_relation();
		$object_relation = $this->pre_processing_model->requirements_data();
	}

}
 ?>