<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
        $this->load->helper(array('form', 'url','html'));//pendefinisian helper form lebih dari satu
		$this->load->library(array('form_validation','table','simple_login','session'));
		$this->load->model(array('Buku_Model','Kategori_Model'));
		$this->load->database();


	}
	
	 public function index()
	{

		$data['buku'] = $this->db->get('buku')->result_array();
		$data['title'] = 'List Buku';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('buku/index', $data);
		$this->load->view('templates/footer');
	}
	public function inputbuku()
	{


		$this->form_validation->set_rules('id_buku', 'ID Buku', 'trim|required');
		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required');


		if ($this->form_validation->run() == FALSE) //definisi validasi misal email, pass
		{
			$data['error'] = ' ';
			$data['query'] = $this->Kategori_Model->get_kategori();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('perpustakaan/mybook', $data);
			$this->load->view('templates/footer');
		} else {


			$data['id_buku']		= $_POST['id_buku'];
			$data['judul_buku']	    = $_POST['judul_buku'];
			$data['penerbit']		= $_POST['penerbit'];
			$data['pengarang']		= $_POST['pengarang'];
			$data['id_kategori']	= $_POST['id_kategori'];


			$this->Buku_Model->insert_entry2($data);

			//$this->load->view('mahasiswa/formsuccess', $data2);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('perpustakaan/formsuccessbuku', $data);
			$this->load->view('templates/footer');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New buku added!</div>');

			redirect('/Buku');
		}
	}

	public function delete($id_buku)
	{
		$where = array('id_buku' => $id_buku);
		$this->Buku_Model->DeleteData($where, 'buku');
		redirect('buku/index');
	}

	public function detail($id_buku)
	{
		$data['title'] = 'Detail Buku';
		$this->load->model('Buku_Model');
		$detail = $this->Buku_Model->detail_data($id_buku);
		$data['detail'] = $detail;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perpustakaan/detailbuku', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id_buku)
	{
		$data['title'] = 'Edit Buku';
		$where = array('id_buku' => $id_buku);
		$data['Buku'] = $this->Buku_Model->edit_data($where, 'buku')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('perpustakaan/editbuku', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_buku = $this->input->post('id_buku');
		$judul_buku = $this->input->post('judul_buku');
		$penerbit = $this->input->post('penerbit');
		$pengarang = $this->input->post('pengarang');
		$id_kategori = $this->input->post('id_kategori');

		$data = array(
			'judul_buku' => $judul_buku,
			'penerbit' => $penerbit,
			'pengarang' => $pengarang
		);

		$where = array(
			'id_buku' => $id_buku
		);

		$this->Buku_Model->update_data($where, $data, 'buku');
		redirect('buku/index');
	}
}
