<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->my_login->check_login();
        $this->load->model('project_model');
        $this->load->model('stakeholder_model');
        $this->load->model('pengaturan_model');
	}

    public function index(){

    $project = $this->project_model->listing();
    $stakeholder = $this->stakeholder_model->listing();

    $user_id = $this->session->userdata('id_user');
	$pengaturan = $this->pengaturan_model->detail($user_id);
    $pengaturan1 = $this->pengaturan_model->listing($user_id);
    
    //validasi
	$this->form_validation->set_rules('project_id', 'Project', 'required',
        array( 'required' => '%s harus dipilih'));
    
    $this->form_validation->set_rules('stakeholder_id', 'Stakeholder', 'required',
        array( 'required' => '%s harus dipilih'));

        if($this->form_validation->run() === FALSE ) {
                $data = array( 'title' => 'Pengaturan ',
                'stakeholder' => $stakeholder,
                'project'=> $project,
                'pengaturan1' => $pengaturan1,
                'pengaturan' => $pengaturan,
                'content' => 'pengaturan/index'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }elseif (empty($pengaturan)){
            $inp = $this->input;
			$data = array( 	'id_user'		=> $this->session->userdata('id_user'),
							'project_id'	=> $inp->post('project_id'),
							'stakeholder_id'	=> $inp->post('stakeholder_id'),
							'post_date'		=> date('Y-m-d H:i:s')
						);
            // print_r($data);
            $this->pengaturan_model->tambah($data);
            $this->session->set_flashdata('add', 'Data telah diatur ');
			redirect(site_url('pengaturan'),'refresh');
        }else{
            $this->session->set_flashdata('gagal', 'Data gagal diatur ');
			redirect(site_url('pengaturan'),'refresh');
        }
	}
    
    // Hapus
    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        //proses hapus
        $this->pengaturan_model ->delete($data);
        //notifikasi dan redirect
        
        $this->session->set_flashdata('hapus', 'Data telah dihapus');
        redirect(site_url('pengaturan'),'refresh');
    }
    
}