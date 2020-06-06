<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url','html'));//pendefinisian helper form lebih dari satu
		$this->load->library(array('form_validation','table','simple_login','session'));
    }

    public function index()
    {
        $data['title'] = 'List Buku';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
