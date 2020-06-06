<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation', 'session','simple_login'));
        $this->load->model(array('Admin_Model'));
        $this->load->database();
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


    public function logout()
    {
        $this->simple_login->logout();	
    }
}
