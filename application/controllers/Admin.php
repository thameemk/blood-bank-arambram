<?php
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        // Load facebook oauth library 
        $this->load->library('facebook');
        if (!$this->session->userdata('sess_logged_in') == 1 || $this->session->user_type != 'admin') {
            $this->session->set_flashdata('fail', 'You are not authorized. please login and try again! ');
            redirect(base_url('auth/logout'));
            exit();
        }
        if (!$this->user_model->is_profile_complete($this->session->email) == TRUE) {
            $this->session->set_flashdata('fail', 'Please complete your profile! ');
            redirect(base_url('user/complete'));
            exit();
        }
    }

    public function admin_pages($page)
    {
        if (!file_exists(APPPATH . 'views/dashboard/admin/' . $page . '.php')) {
            show_404();
        }
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['page'] = $page;
        $data['authURL'] =  $this->facebook->login_url();
        $data['allDonors'] = $this->admin_model->get_all_donors();
        $data['profile_status'] = $this->user_model->is_profile_verified();
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/admin/' . $page, $data);
        $this->load->view('dashboard/template/footer');
    }

    function verify_user()
    {
        $response = $this->admin_model->verify_user();
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('admin/view-all-donors'));
    }

    function change_status()
    {
        $email = $this->security->xss_clean($this->input->post('email'));
        $response = $this->user_model->update_availability($email);
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('admin/view-all-donors'));
    }
}
