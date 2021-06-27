<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	function login()
	{
		$data['page_title'] = 'Login';
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
		$this->load->view('template/header', $data);
		$this->load->view('static/' . $page, $data);
		$this->load->view('template/footer');
	}
}
