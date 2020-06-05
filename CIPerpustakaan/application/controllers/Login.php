<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html')); //pendefinisian helper form lebih dari satu
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Admin_Model');
        $this->load->database();
    }

    public function index()
    {
        $this->load->view('perpustakaan/login_view');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('perpustakaan/login_view');
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
                if ($sess_data['id_admin'] == $id_admin) { //apabila id_admin sama dengan yang di database maka redirect ke menu tampilan
                    redirect('menu_tampilan');
                } else { //apabila pass tidak cocok di redirect ulang ke form login
                    $this->session->set_flashdata('pesan', 'Maaf Username dan Password Salah');
                    redirect('Login');
                }
            } else { //apabila pass dan username yang dimasukkan tidak cocok maka redirect ulang ke login
                $this->session->set_flashdata('pesan', 'Maaf Username dan Password Salah');
                redirect('Login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
