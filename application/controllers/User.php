<?php
class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        if (!$this->session->userdata('sess_logged_in') == 1) {
            $this->session->set_flashdata('fail', 'You are not logged in. please login and try again! ');
            redirect(base_url('login'));
        }
    }

    function register()
    {
        if ($this->user_model->is_user_registred($this->session->email) == TRUE) {
            $this->complete();
        } else {
            $data = array(
                'oauth_provider' => $this->session->oauth_provider,
                'oauth_user_name' => $this->session->oauth_user_name,
                'email' => $this->session->email,
                'profile_pic' => $this->session->profile_pic,
            );
            if ($this->user_model->register_user($data) == TRUE) {
                $this->complete();
            } else {
                $this->session->set_flashdata('fail', 'Some error has been occurred. Please login and try again! ');
                redirect(base_url('login'));
            }
        }
    }

    function complete()
    {
        echo "complete profile";
    }
}
