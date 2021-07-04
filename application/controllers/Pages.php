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
		$this->load->view('static/login', $data);
	}

	function signup()
	{
		$data['page_title'] = 'Sign Up';
		$data['authURL'] =  $this->facebook->login_url();
		$this->load->view('static/signup', $data);
	}

}
