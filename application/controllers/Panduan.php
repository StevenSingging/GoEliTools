<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {

	public function index()
	{
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
		
		$data = array( 'title'	=>'Panduan Penggunaan Sistem Informasi',
						'content'	=>'panduan/index'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Panduan.php */
/* Location: ./application/controllers/Panduan.php */