
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu_tampilan extends CI_Controller
{

	// Index login

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library(array('form_validation', 'table', 'template', 'simple_login', 'session'));
		$this->load->model('Admin_Model');
		$this->load->database(); //library
	}

	public function index()
	{
		$data = array(
			'title'	=> 'Halaman Dasbor',
			'isi'	=> 'perpustakaan/menutampilan_view'
		);
		//$this->load->view('layout/wrapper',$data);
		$this->template->display('layout/wrapper', $data);
	}

	// Fungsi lain

}