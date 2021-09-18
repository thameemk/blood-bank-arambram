<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load user model 
        $this->load->model('report_model');
    }

    function process()
    {
        $result = $this->report_model->login();

        if(! $result){
            // If user did not validate, then show them login page again
            $this->session->set_flashdata('fail', 'Email or Password is incorrect');
            redirect(base_url());
        }
        else {
            $this->session->set_flashdata('success', 'Login success');      
            redirect(base_url().'admin/home');

        }
    }

    function getusertype($email)
    {
        $email = $this->security->xss_clean($email);
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $data = $query->result_array();
        if ($query->num_rows() == 1) {
            $user_type = $data[0]['user_type'];
            return $user_type;
        } else {
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
		$session_data = array(
			'sess_logged_in' => 0
		);
		$this->session->set_userdata($session_data);
		redirect('');
    }
}
