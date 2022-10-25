<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load model user
        $this->CI->load->model('user_model');
	}

	// Fungi untuk Login
	public function login($username,$password)
	{
		// check username dan password
		$check = $this->CI->user_model->login($username,$password);
		
		//jika ada data check, maka login berhasil
		if($check)
		{
			$id_user		= $check->id_user;
			$nama			= $check->nama_user;
			$akses_level	= $check->akses_level;
			$email			= $check->email;
			$username		= $check->username;
			$password		= $check->password;

			//proses create session untuk login
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('password',$password);

			// End proses create session untuk login
			//redirect ke halaman dashboard
			redirect(site_url('dashboard'));
			

		}else{
			// jika tidak ada, maka suruh login lagi. Login gagal
			$this->CI->session->set_flashdata('warning', 'Username atau password salah ' .$password);
			redirect(site_url('login'));
			
		}
	}

	// Fungi check Login : untuk mengecek login user
	public function check_login()
	{
		// check status login username, jika tidak ada atau kosong, maka redirect ke login
		if($this->CI->session->userdata('username')=="" &&
			$this->CI->session->userdata('akses_level')=="")
		{
			// kalau username dan akses level kosong, suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Anda belum login ');
			redirect(site_url('login'));
		}
	}

	// Fungi untuk Logout
	public function logout()
	{
		//proses UNSET session untuk login
			$this->CI->session->unset_userdata('id-user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('akses_level');
			$this->CI->session->unset_userdata('email');
			$this->CI->session->unset_userdata('username');

			// End proses UNSET session untuk login
			//redirect ke halaman dashboard
			$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
			redirect(site_url('login'));
			
	}

}

/* End of file My_login.php */
/* Location: ./application/libraries/My_login.php */
