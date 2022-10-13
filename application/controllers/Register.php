<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->load->model('user_model');

	}
	// page register
	public function index()
	{
		$this->load->view('register/index');
	}

    public function regis($user_id='')
    {
        $inp = $this->input;
        $username = $inp->post('username');
        if(strlen($username) >= 5 && strlen($username) <=15){
            $data = array(  'id_user'		=> $inp->post('id_user'),
            'nama_user'		=> $inp->post('nama_user'),
            'email'			=> $inp->post('email'),
            'username'      => $inp->post('username'),
            'password'		=> SHA1($inp->post('password'))
        );
        // Proses oleh model
        $this->user_model->tambah($data);
        //notifikasi dan redirect
        $this->session->set_flashdata('sukses', 'Data telah ditambah');
        redirect(site_url('login'));
            
        }else{
            $this->session->set_flashdata('warning', 'Username harus 5-32 karakter');
            redirect(site_url('register'));
        }
    }

}
