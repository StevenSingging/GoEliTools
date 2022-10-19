<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	// Update profile
	public function index()
	{
		// panggil data user yang akan diedit
		$id_user = $this->session->userdata('id_user');
		$user = $this->user_model->detail($id_user);

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_user','Nama Lengkap','required',
				array(  'required' => '%s harus diisi'));
		// check email
		$valid->set_rules('email','Email','required|valid_email',
				array(  'required' => '%s harus diisi',
						'valid_email' => '%s tidak valid. Masukkan email yang benar'));
	
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Edit Profil : ' .$user->nama_user,
						'user' => $user,
						'content' => 'profil/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			// check panjang password, jika password lebih dari 6 karakter, maka password diganti
			// jika password kurang dari 32, password diganti
			if(strlen($inp->post('password')) >= 6 || strlen($inp->post('password')) <=32) {
				// password ganti
				$data = array(  'id_user'	=>$id_user,
							'nama_user'	=> $inp->post('nama_user'),
							'email'	=> $inp->post('email'),
							'password'	=> SHA1($inp->post('password')),
							'akses_level'	=> $inp->post('akses_level'),
						);
			}else {
				//kalau kurang dari 6 password tidak diganti
				$data = array(  'id_user'	=>$id_user,
								'nama_user'	=> $inp->post('nama_user'),
								'email'	=> $inp->post('email'),
								'akses_level'	=> $inp->post('akses_level'),
						);
			}
			// Proses oleh model
			$this->user_model->edit($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('profil'),'refresh');
		}
		// end masuk database
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */