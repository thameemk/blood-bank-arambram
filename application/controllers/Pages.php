<?php
/*
 * Author : thame
 * License: The MIT License (MIT)
 * Project : Blood Bank Arambram
 * Filename : Pages.php
 * Current modification time : Sat, 25 Sep 2021 at 7:36 PM India Standard Time
 * Last modified time : Sat, 25 Sep 2021 at 7:09 PM India Standard Time
 */

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
			$this->load->view('static/login');
		}
	}
}
