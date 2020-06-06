<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('Admin_Model'));
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('template_administrator/header');
        $this->load->view('admin/login');
        $this->load->view('template_administrator/footer');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) { //jika form validation salah, load ulang ke login
            $this->load->view('template_administrator/header');
            $this->load->view('admin/login');
            $this->load->view('template_administrator/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = $password;

            $cek = $this->Admin_Model->cek_login($user, $pass);

            if ($cek->num_rows > 0) {

                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['id_admin'] = $ck->id_admin;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['id_admin'] == $id_admin) {
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf Username dan Password Anda Salah!</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('login');
                }
            } else { //apabila pass dan username yang dimasukkan tidak cocok maka redirect ulang ke login
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf Username dan Password Anda Salah!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
