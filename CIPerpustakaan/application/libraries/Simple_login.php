<?php if (!defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
error_reporting(1);
class Simple_login
{
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	// Fungsi login
	public function login($username, $password)
	{
		$query = $this->CI->db->get_where('admin', array('username' => $username, 'password' => $password));
		if ($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT username FROM admin where username = "' . $username . '"');
			$admin 	= $row->row();
			$email 	= $admin->email;
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('status', "login");
			redirect('dasbor'); //redirect ke controller
		} else {
			$this->CI->session->set_flashdata('sukses', 'Oops... Username/password salah');
			redirect('login'); //redirect ke controller
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login()
	{
		if ($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('sukses', 'Anda belum login');
			redirect('login');
		}
	}
	// Fungsi logout
	public function logout()
	{
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('status');
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect('login');
	}
}
