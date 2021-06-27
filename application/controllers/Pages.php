<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load facebook oauth library 
		$this->load->library('facebook');
	}

	function login()
	{
		$data['page_title'] = 'Login';
		$data['authURL'] =  $this->facebook->login_url();
		$this->load->view('template/header', $data);
		$this->load->view('static/login', $data);
		$this->load->view('template/footer');
	}

	function view($page)
	{
		if (!file_exists(APPPATH . 'views/static/' . $page . '.php')) {
			show_404();
		}
		$temp = str_replace("-", " ", $page);
		$temp1 = ucfirst($temp);
		$data['page_title'] = $temp1;
		$data['authURL'] =  $this->facebook->login_url();
		$this->load->view('template/header', $data);
		$this->load->view('static/' . $page, $data);
		$this->load->view('template/footer');
	}
}
