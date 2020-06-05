<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['anggota'] = $this->db->get('anggota')->result_array();
		$data['title'] = 'List Anggota';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('anggota/index', $data);
		$this->load->view('templates/footer');
	}

	public function inputanggota()
	{
		$data['title'] = 'Input Anggota';

		$this->load->helper('date');

		$this->form_validation->set_rules('id_anggota', 'ID Anggota', 'trim|required');
		$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


		if ($this->form_validation->run() == FALSE) //definisi validasi misal email, pass
		{
			$data['error'] = ' ';


			//$this->load->view('mahasiswa/myform', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('perpustakaan/myanggota', $data);
			$this->load->view('templates/footer');
		} else {


			$data['id_anggota']	= $_POST['id_anggota'];
			$data['nama_anggota']	= $_POST['nama_anggota'];
			$data['tgl_lahir']		= $_POST['tgl_lahir'];
			$data['no_telp']		= $_POST['no_telp'];
			$data['alamat']		= $_POST['alamat'];


			$this->Anggota_Model->insert_entry2($data);
			redirect('/Anggota');
		}
	}

	public function delete($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
		$this->Anggota_Model->DeleteData($where, 'anggota');
		redirect('anggota');
	}
	public function edit($id_anggota)
	{
		$data['title'] = 'Edit Anggota';
		$where = array('id_anggota' => $id_anggota);
		$data['Anggota'] = $this->Anggota_Model->edit_data($where, 'anggota')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perpustakaan/editanggota', $data);
		$this->load->view('templates/footer');


		//$this->template->display('perpustakaan/editanggota', $data);
	}

	public function detail($id_anggota)
	{

		$this->load->model('Anggota_Model');
		$detail = $this->Anggota_Model->detail_data($id_anggota);
		$data['detail'] = $detail;
		$data['title'] = 'Detail Anggota';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perpustakaan/detailanggota', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama_anggota' => $nama_anggota,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat
		);

		$where = array(
			'id_anggota' => $id_anggota
		);

		$this->Anggota_Model->update_data($where, $data, 'anggota');
		redirect('anggota/');
	}
}
