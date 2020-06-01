<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(1);
class Login extends CI_Controller
{

    // Index login

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation', 'table', 'simple_login', 'session')); //ini hanya untuk satu library, kalo mau dua dibikin kayak helper
        $this->load->model('Admin_Model');
        $this->load->database(); //library
    }

    public function index()
    {
        // Fungsi Login
        $valid = $this->form_validation;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $valid->set_rules('username', 'Username');
        $valid->set_rules('password', 'Password');
        if ($valid->run()) {
            $this->simple_login->login($username, $password);
        }
        // End fungsi login
        $data = array('title'    => 'Halaman Login Administrator');
        //$this->load->view('login_view',$data);
        $this->load->view('perpustakaan/login_view');
    }

    // Logout di sini
    public function logout()
    {
        $this->simple_login->logout();
    }
}
