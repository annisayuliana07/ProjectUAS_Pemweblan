<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
		$this->load->model(array('Buku_Model','Kategori_Model'));
		$this->load->database();
		//$this->load->library('table');

	}
	
	 public function index()
	{
		
		echo "<h2>Tampilan list Buku</h2>";

		$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
		);
		$this->table->set_template($template);

		$this->table->set_heading('ID Buku', 'Judul Buku','Penerbit','Pengarang','Kategori');

		$query=$this->Buku_Model->get_join();
		foreach ($query->result() as $row)
		{
			$this->table->add_row($row->id_buku,$row->judul_buku,$row->penerbit,$row->pengarang,$row->jenis);
		}

		$data['tabel']= $this->table->generate();
		$this->template->display('perpustakaan/listbuku',$data);

		
	}
	public function inputbuku()
	{
		
				$this->load->helper('date');

                $this->form_validation->set_rules('id_buku', 'ID Buku', 'trim|required');
                $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
                $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
                $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
                $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'trim|required');
                				

                if ($this->form_validation->run() == FALSE)//definisi validasi misal email, pass
                {
					$data['error']=' ';
					$data['query']=$this->Kategori_Model->get_kategori();
					
					//$this->load->view('mahasiswa/myform', $data);
					$this->template->display('perpustakaan/mybook', $data);
                }
                else
                {
						
								
								$data ['id_buku']		=$_POST['id_buku'];
								$data ['judul_buku']	=$_POST['judul_buku'];
								$data ['penerbit']		=$_POST['penerbit'];
								$data ['pengarang']		=$_POST['pengarang'];
								$data ['id_kategori']	=$_POST['id_kategori'];

		
								$this->Buku_Model->insert_entry2($data);			
								
								//$this->load->view('mahasiswa/formsuccess', $data2);
								$this->template->display('perpustakaan/formsuccess', $data);
								redirect('/Buku');
						
                }


    }            
    
}
