<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
		$this->load->model(array('Anggota_Model'));
		$this->load->database();
		//$this->load->library('table');

	}
	
	 public function index()
	{
		
		echo "<h2>Tampilan list Anggota</h2>";

		$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
		);
		$this->table->set_template($template);

		$this->table->set_heading('ID Anggota', 'Nama Anggota','Tanggal Lahir','Nomor Telepon','Alamat');

		$query=$this->Anggota_Model->get_all();
		foreach ($query->result() as $row)
		{
			$this->table->add_row($row->id_anggota,$row->nama_anggota,$row->tgl_lahir,$row->no_telp,$row->alamat);
		}

		$data['tabel']= $this->table->generate();
		$this->template->display('perpustakaan/listanggota',$data);

		
	}
	public function inputanggota()
	{
		
				$this->load->helper('date');

                $this->form_validation->set_rules('id_anggota', 'ID Anggota', 'trim|required');
                $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required');
                $this->form_validation->set_rules('tgl_lahir', 'tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
                				

                if ($this->form_validation->run() == FALSE)//definisi validasi misal email, pass
                {
					$data['error']=' ';
					
					
					//$this->load->view('mahasiswa/myform', $data);
					$this->template->display('perpustakaan/myanggota', $data);
                }
                else
                {
						
								
								$data ['id_anggota']	=$_POST['id_anggota'];
								$data ['nama_anggota']	=$_POST['nama_anggota'];
								$data ['tgl_lahir']		=$_POST['tgl_lahir'];
								$data ['no_telp']		=$_POST['no_telp'];
								$data ['alamat']		=$_POST['alamat'];

		
								$this->Anggota_Model->insert_entry2($data);			
								
								//$this->load->view('mahasiswa/formsuccess', $data2);
								$this->template->display('perpustakaan/formsuccess', $data);
								redirect('/Anggota');
						
                }


    }            
    
}
