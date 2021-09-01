<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function login()
	{
		if ($this->session->userdata('sess_logged_in') == 1) {
			redirect(base_url('admin/home'));
		} else {
			$this->load->view('static/login', $data);
		}
	}
}
