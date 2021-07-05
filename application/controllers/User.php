<?php
class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        if (!$this->session->userdata('sess_logged_in') == 1 || $this->session->user_type == false) {
            $this->session->set_flashdata('fail', 'You are not logged in. please login and try again! ');
            redirect(base_url('login'));
            exit();
        }
        if (!$this->user_model->is_profile_complete($this->session->email) == TRUE) {
            $this->session->set_flashdata('fail', 'Please complete your profile! ');
            redirect(base_url('user/complete'));
            exit();
        }
    }

    public function user_pages($page)
    {
        if (!file_exists(APPPATH . 'views/user/' . $page . '.php')) {
            show_404();
        }
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['authURL'] =  $this->facebook->login_url();
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/user/' . $page, $data);
        $this->load->view('dashboard/template/footer');
    }
}
