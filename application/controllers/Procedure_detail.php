<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_detail extends CI_Controller {

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
		$this->load->model('procedure_detail_model');
		$this->load->library('form_validation');
	}

	// Halaman Utama
	public function index()
	{
		$procedure_detail = $this->procedure_detail_model->listing();
		$total = $this->procedure_detail_model->total();
		$arem = $this->procedure_detail_model->arem();

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
			$data = array( 	'id' => $aremdata['id'],
							'procedure_detail_id' => $aremdata['procedure_detail_id'],
							'id_user'		=> $aremdata['id_user'],
							'procedure_id'	=> $aremdata['procedure_id'],
							'procedure_detail_no'	=> $aremdata['procedure_detail_no'],
							'procedure_detail_desc'	=> $aremdata['procedure_detail_desc'],
							'pre_condition'		=> $aremdata['pre_condition'],
							'post_condition'	=> $aremdata['post_condition'],
							'formula'=> $aremdata['formula'],
							'actor'=> $aremdata['actor'],
							'resources'=> $aremdata['resources'],
							'post_date'		=> $aremdata['post_date']
						);
			// // Proses oleh model
			$this->procedure_detail_model->tambahArem($data);
		}

		$data = array( 'title' => 'Data Detail Prosedur  ('.$total->total.')',
						'procedure_detail' => $procedure_detail,
						'arem'	=> $arem,
						'content' => 'procedure_detail/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// tambah
	// public function tambah($project_id='', $stakeholder_id='', $activities_id='')
	// {
	// 	//ambil data project,stakeholder
	// 	$procedure=$this->procedure_model->listing2();
	// 	$procedure_detail=$this->procedure_detail_model->listing2();

	// 	//validasi
	// 	$this->form_validation->set_rules('procedure_id', 'Procedure', 'required',
	// 		array( 'required' => '%s harus dipilih'));
			

	// 	if($this->form_validation->run() === FALSE) {
	// 	// End validasi

	// 	$data = array( 'title' => 'Tambah Data Procedure_detail',
	// 					'procedure' => $procedure,
	// 					'procedure_detail' => $procedure_detail,
	// 					'content' => 'procedure_detail/tambah'
	// 				 );
	// 	$this->load->view('layout/wrapper', $data, FALSE);

	// 	// jika validasi oke, maka masuk database
	// 	}else{
	// 		$inp = $this->input;
	// 		$data = array( 	'procedure_detail_id' =>$inp->post('procedure_id').'-'.$inp->post('procedure_detail_no'),
	// 						'id_user'		=> $this->session->userdata('id_user'),
	// 						'procedure_id'	=> $inp->post('procedure_id'),
	// 						'procedure_detail_no'	=> $inp->post('procedure_detail_no'),
	// 						'procedure_detail_desc'		=> $inp->post('procedure_detail_desc'),
	// 						'pre_condition'		=> $inp->post('pre_condition'),
	// 						'post_condition'	=> $inp->post('post_condition'),
	// 						'formula'=> $inp->post('formula'),
	// 						'actor'=> $inp->post('actor'),
	// 						'resources'=> $inp->post('resources'),
	// 						'post_date'		=> date('Y-m-d H:i:s')
	// 					);
	// 		// Proses oleh model
	// 		$this->procedure_detail_model->tambah($data);
	// 		//notifikasi dan redirect
	// 		$this->session->set_flashdata('sukses', 'Data telah ditambah');
	// 		redirect(site_url('procedure_detail/tambah'),'refresh');
	// 	}
	// 	// end masuk database
	// }
	public function tambah($project_id='', $stakeholder_id='', $activities_id='')
	{
		//ambil data project,stakeholder
		$procedure=$this->procedure_model->listing2();
		$procedure_detail=$this->procedure_detail_model->listing2();

		//validasi
		$this->form_validation->set_rules('procedure_id', 'Procedure', 'required',
			array( 'required' => '%s harus dipilih'));
			

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Tambah Data Procedure_detail',
						'procedure' => $procedure,
						'procedure_detail' => $procedure_detail,
						'content' => 'procedure_detail/tambah'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$i = 0;
			$pid = $this->procedure_detail_model->getNumid($inp->post('procedure_id')) + 1;
			$prodes = $inp->post('procedure_detail_desc[]');
			$predes = $inp->post('pre_condition[]');
			$postdes = $inp->post('post_condition[]');
			$res 	= $inp->post('resources[]');
			$propre = array_combine($prodes, $predes);
			foreach ($propre as $p => $key){
				$data = array( 	'procedure_detail_id' => $inp->post('procedure_id').'-'.$pid,
							'id_user'		=> $this->session->userdata('id_user'),
							'procedure_id'	=> $inp->post('procedure_id'),
							'procedure_detail_no'	=> $pid,
							'procedure_detail_desc'	=> $p,
							'pre_condition'		=> $key,
							'post_condition'	=> $postdes[$i],
							'formula'=> $inp->post('formula'),
							'actor'=> $inp->post('actor'),
							'resources'=> $res[$i],
							'post_date'		=> date('Y-m-d H:i:s')
						);
				$i++;
				$pid++;
				// Proses oleh model
				$this->procedure_detail_model->tambah($data);
			}
			//$this->load->view('procedure_detail/coba');
			
			// notifikasi dan redirect
			$this->session->set_flashdata('add', 'Data telah ditambah');
			redirect(site_url('procedure_detail/tambah'),'refresh');
		}
		// end masuk database
	}

	// Edit data
	public function edit($procedure_detail_id)
	{
		// ambil data suhu tubuh yang akan diedit
		$procedure=$this->procedure_model->listing2();
		$procedure_detail = $this->procedure_detail_model->detail($procedure_detail_id);
		
		//validasi
		$this->form_validation->set_rules('procedure_id', 'Procedure', 'required',
			array( 'required' => '%s harus dipilih'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array( 'title' => 'Edit Data Procedure_detail',
						'procedure' => $procedure,
						'procedure_detail' => $procedure_detail,
						'content' => 'procedure_detail/edit'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);

		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 	'procedure_detail_id'	=> $procedure_detail_id,
							'id_user'		=> $this->session->userdata('id_user'),
							'procedure_detail_desc'		=> $inp->post('procedure_detail_desc'),
							'pre_condition'		=> $inp->post('pre_condition'),
							'post_condition'	=> $inp->post('post_condition'),
							'formula'=> $inp->post('formula'),
							'actor'=> $inp->post('actor'),
							'resources'=> $inp->post('resources')
						);
			// Proses oleh model
			$this->procedure_detail_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('berhasil', 'Data telah diedit');
			redirect(site_url('procedure_detail'),'refresh');

		}
		// end masuk database
	}

	// Hapus
	public function delete($procedure_detail_id)
	{
		$data = array('procedure_detail_id' => $procedure_detail_id);
		//proses hapus
		$this->procedure_detail_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('hapus', 'Data telah dihapus');
		redirect(site_url('procedure_detail'),'refresh');
	}


	// Daftar procedure_detail project

	public function procedure($procedure_id)
	{
		$procedure  = $this->procedure_model->detail($procedure_id);
		$procedure_detail = $this->procedure_detail_model->procedure($procedure_id);

		$data = array( 'title' => 'Daftar Procedure detail '.$procedure->procedure_desc,
						'procedure' => $procedure,
						'procedure_detail' => $procedure_detail,
						'content' => 'procedure_detail/daftar_procedure'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// end daftar procedure_detail project 


	public function daftar_procedure($procedure_id)
	{
		$procedure  = $this->procedure_model->detail($procedure_id);
		$procedure_detail = $this->procedure_detail_model->procedure($procedure_id);
		

		$data = array( 'title' => 'Daftar Procedure--'.$procedure->procedure_desc,
						'procedure_detail' => $procedure_detail,
						'procedure' 	=> $procedure
					 );
		$this->load->view('procedure_detail/cetak_daftar_procedure', $data, FALSE);
	}

	
	// word 

	public function export_procedure($procedure_id)
	{
		$procedure  = $this->procedure_model->detail($procedure_id);
		$procedure_detail = $this->procedure_detail_model->procedure($procedure_id);
		

		$data = array( 'title' => 'Daftar Procedure_detail --'.$procedure->procedure_desc,
						'procedure_detail' => $procedure_detail,
						'procedure' 	=> $procedure
					 );
		$this->load->view('procedure_detail/word_daftar_procedure', $data, FALSE);
	}

	
	// detail
	public function detail($procedure_detail_id)
	{
		$procedure_detail = $this->procedure_detail_model->detail($procedure_detail_id);
		$procedure_id	= $procedure_detail->procedure_id;
		$procedure=$this->procedure_model->detail($procedure_id);
		

		$data = array( 'title' => 'Data Procedure_detail '.$procedure->procedure_desc,
						'procedure' => $procedure,
						'procedure_detail' => $procedure_detail,
						'content' => 'procedure_detail/detail'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// cetak
	public function cetak($procedure_detail_id)
	{
		$procedure_detail = $this->procedure_detail_model->detail($procedure_detail_id);
		$procedure_id	= $procedure_detail->procedure_id;
		$procedure=$this->procedure_model->detail($procedure_id);

		$data = array( 'title' => 'Data Procedure_detail  '.$procedure->procedure_desc,
						'procedure' => $procedure,
						'procedure_detail' => $procedure_detail,
						'content' => 'procedure_detail/detail'
					 );
		$this->load->view('procedure_detail/cetak', $data, FALSE);
	}
	

}

/* End of file Procedure_detail.php */
/* Location: ./application/controllers/Procedure_detail.php */