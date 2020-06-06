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

        $username = $this->input->post('username');
		$password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run()) { //jika form validation salah, load ulang ke login
            $this->simple_login->login($username,$password);
            
            
        } else {
            
            $this->load->view('templatelogin');
        }
    }


  

    // Logout di sini
    public function logout()
    {
        $this->simple_login->logout();

    }
}
