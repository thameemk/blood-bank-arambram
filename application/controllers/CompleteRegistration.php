<?php
class CompleteRegistration extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        if (!$this->session->userdata('sess_logged_in') == 1) {
            $this->session->set_flashdata('fail', 'You are not logged in. please login and try again! ');
            redirect(base_url('logout'));
        }
    }

    function register()
    {
        if ($this->user_model->is_user_registred($this->session->email) == TRUE) {
            redirect(base_url('user/complete'));
        } else {
            $data = array(
                'oauth_provider' => $this->session->oauth_provider,
                'oauth_user_name' => $this->session->oauth_user_name,
                'email' => $this->session->email,
                'profile_pic' => $this->session->profile_pic,
            );
            if ($this->user_model->register_user($data) == TRUE) {
                redirect(base_url('user/complete'));
            } else {
                $this->session->set_flashdata('fail', 'Some error has been occurred. Please login and try again! ');
                redirect(base_url('auth/logout'));
            }
        }
    }

    function complete()
    {
        if ($this->user_model->is_profile_complete($this->session->email) == TRUE) {
            $this->session->set_flashdata('success', 'Login successful !');
            redirect(base_url('user/profile'));
        } else {
            $data['page_title'] = 'Complete profile';
            $this->load->view('dashboard/template/sidebar', $data);
            $this->load->view('dashboard/template/header', $data);
            $this->load->view('dashboard/user/complete', $data);
            $this->load->view('dashboard/template/footer');
        }
    }

    function complete_profile()
    {
        $status = $this->user_model->complete_profile();
        if ($status == true) {
            $this->session->set_flashdata('success', 'Successfully completed your profile !');
            redirect(base_url('user/profile'));
        } else {
            $this->session->set_flashdata('fail', 'Please fill all required fields !');
            redirect(base_url('user/complete'));
        }
    }
}
