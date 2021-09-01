<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load user model 
        $this->load->model('user_model');
    }

    function oauth2callback()
    {
        $userData = array();
        if ($this->facebook->is_authenticated()) {
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');
            $userData['oauth_provider'] = 'facebook';
            $first_name   = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
            $last_name    = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
            $userData['oauth_user_name'] = $first_name . " " . $last_name;
            $userData['email']        = !empty($fbUser['email']) ? $fbUser['email'] : '';
            $userData['profile_pic']    = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
            $user_type = $this->getusertype($userData['email']);
            if ($userData['email'] != null) {
                $userData['sess_logged_in'] = 1;
                $userData['user_type'] = $user_type;
                $this->session->set_userdata($userData);
                redirect(base_url() . 'user/register');
            } else {
                $this->session->set_flashdata('fail', 'Some error has been occurred. Please login and try again! ');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('fail', 'Some error has been occurred. Please login and try again! ');
            redirect(base_url('login'));
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
		$this->googleplus->revokeToken();
		$session_data = array(
			'sess_logged_in' => 0
		);
		$this->session->set_userdata($session_data);
		redirect('');
    }
}
