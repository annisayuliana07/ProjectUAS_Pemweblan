<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

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
		$this->load->library('template');
		$this->load->helper(array('form', 'url','html'));//pendefinisian helper form lebih dari satu
		$this->load->library(array('form_validation','table'));
		$this->load->model(array('Buku_Model','Anggota_Model','Admin_Model','Peminjaman_Model'));
		$this->load->database();
		//$this->load->library('table');

	}
	
	 public function index()
	{
		
		echo "<h2>Tampilan list Peminjaman</h2>";

		$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
		);
		$this->table->set_template($template);

		$this->table->set_heading('ID Pinjam', 'Tanggal Pinjam','Tanggal Kembali','Nama Peminjam','Nama Buku','Nama Admin', 'Detail', 'Edit', 'Delete');

		$query=$this->Peminjaman_Model->get_join();
		foreach ($query->result() as $row)
		{
			$this->table->add_row($row->id_pinjam,$row->tgl_pinjam,$row->tgl_kembali,$row->nama_anggota,$row->judul_buku,$row->username, anchor('peminjaman/detail/'. $row->id_pinjam, 'Detail'), anchor('peminjaman/edit/'. $row->id_pinjam, 'Edit'), anchor('peminjaman/delete/'. $row->id_pinjam, 'Delete'));
		}

		$data['tabel']= $this->table->generate();
		$this->template->display('perpustakaan/listpeminjaman',$data);

		
	}
	public function inputpeminjaman()
	{
		
				$this->load->helper('date');

                $this->form_validation->set_rules('id_pinjam', 'ID Pinjam', 'trim|required');
                $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'trim|required');
                $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'trim|required');
                $this->form_validation->set_rules('id_anggota', 'ID Anggota', 'trim|required');
				$this->form_validation->set_rules('id_buku', 'ID Buku', 'trim|required');
				$this->form_validation->set_rules('id_admin', 'ID Admin', 'trim|required');
                				

                if ($this->form_validation->run() == FALSE)//definisi validasi misal email, pass
                {
					$data['error']=' ';
					$data['query']=$this->Buku_Model->get_buku();
					$data['query2']=$this->Admin_Model->get_admin();
					$data['query3']=$this->Anggota_Model->get_anggota();
					
					//$this->load->view('mahasiswa/myform', $data);
					$this->template->display('perpustakaan/mypeminjaman', $data);
                }
                else
                {
						
								
								$data ['id_pinjam']		=$_POST['id_pinjam'];
								$data ['tgl_pinjam']	=$_POST['tgl_pinjam'];
								$data ['tgl_kembali']	=$_POST['tgl_kembali'];
								$data ['id_anggota']	=$_POST['id_anggota'];
								$data ['id_buku']		=$_POST['id_buku'];
								$data ['id_admin']		=$_POST['id_admin'];

		
								$this->Peminjaman_Model->insert_entry2($data);			
								
								//$this->load->view('mahasiswa/formsuccess', $data2);
								$this->template->display('perpustakaan/formsuccess', $data);
								redirect('/peminjaman');
						
                }


    }

	public function delete($id_pinjam)
	{
		$where = array('id_pinjam' => $id_pinjam);
		$this->Peminjaman_Model->DeleteData($where, 'peminjaman');
		redirect('peminjaman/index');
	}
	
		public function detail($id_pinjam)
	{
		$this->load->model('Peminjaman_Model');
		$detail=$this->Peminjaman_Model->detail_data($id_pinjam);
		$data['detail']=$detail;
		
		$this->template->display('perpustakaan/detailpeminjaman', $data);
	}
    
}
