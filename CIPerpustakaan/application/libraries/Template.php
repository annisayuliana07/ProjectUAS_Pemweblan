<?php
class Template
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function display($template, $data = null)
	{
		$data['_content'] = $this->_ci->load->view($template, $data, true);
		$this->_ci->load->view('template.php', $data);
	}

	function displaylog($template_login, $data = null)
	{
		$data['_content1'] = $this->_ci->load->view($template_login, $data, true);
		$this->_ci->load->view('admin/login.php', $data);
	}
}
