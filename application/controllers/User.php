<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	// load model
	public function __construct()
	{
		parent::__construct();
		// Proteksi halaman dengan library My_login
		$this->my_login->check_login();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		//$this->load->helper(array('form', 'url'));
		// Proteksi hanya admin
		if($this->session->userdata('akses_level') !='Admin')
		{
			//kalau bukan admin, lempar lagi ke halaman login
			$this->my_login->logout();
			$this->session->set_flashdata('warning','Anda Tidak Punya Hak Akses ke Menu User');
			redirect(site_url('login'),'refresh');
		}
	}

	// data user
	public function index()
	{
		$user = $this->user_model->listing();
		$total = $this->user_model->total();

		// validasi input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_user','Nama Lengkap','required',
				array(  'required' => '%s harus diisi'));
		// check email
		$valid->set_rules('email','Email','required|valid_email',
				array(  'required' => '%s harus diisi',
						'valid_email' => '%s tidak valid. Masukkan email yang benar'));
		// check Username
		$valid->set_rules('username','Username','required|is_unique[users.username]',
				array(  'required' => '%s harus diisi',
						'is_unique' => '%s sudah ada. Buat username baru'));
		// check Password
		$valid->set_rules('password','Password','required|min_length[6]|max_length[32]',
				array(  'required' => '%s harus diisi',
						'min_length' => '%s minimal 6 karakter',
						'max_length' => '%s maksimal 32 karakter'));
		//jika sudah dicek, dan error
		if($valid->run()===FALSE) {
		//end validasi

		$data = array( 'title' => 'Data User Administrator ('.$total->total.')',
						'user' => $user,
						'content' => 'user/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke, maka masuk database
		}else{
			$inp = $this->input;
			$data = array( 'nama_user'	=> $inp->post('nama_user'),
							'email'	=> $inp->post('email'),
							'username'	=> $inp->post('username'),
							'password'	=> SHA1($inp->post('password')),
							'akses_level'	=> $inp->post('akses_level'),
						);
			// Proses oleh model
			$this->user_model->tambah($data);
			//notifikasi dan redirect
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(site_url('user'),'refresh');
		}
		// end masuk database
	}

	// Edit User
	public function edit($id_user)
	{
		// panggil data user yang akan diedit
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

		$data = array( 'title' => 'Edit Data User : ' .$user->nama_user,
						'user' => $user,
						'content' => 'user/edit'
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
			redirect(site_url('user'),'refresh');
		}
		// end masuk database
	}

	// delete user
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		//proses hapus
		$this->user_model ->delete($data);
		//notifikasi dan redirect
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(site_url('user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */