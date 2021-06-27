<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load facebook oauth library 
        $this->load->library('facebook');

        // Load user model 
        $this->load->model('user');
    }

    function oauth2callback()
    {
        $userData = array();
        if ($this->facebook->is_authenticated()) {
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,picture');
            $userData['oauth_provider'] = 'facebook'; 
            
        } else {
            echo "2";
        }
    }

    public function logout()
    {
        // Remove local Facebook session 
        $this->facebook->destroy_session();
        // Remove user data from session 
        $this->session->unset_userdata('userData');
        // Redirect to login page 
        redirect('login');
    }
}
