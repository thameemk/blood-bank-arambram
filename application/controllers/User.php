<?php
class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        // Load facebook oauth library 
        $this->load->library('facebook');
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
        if (!file_exists(APPPATH . 'views/dashboard/user/' . $page . '.php')) {
            show_404();
        }
        $temp = str_replace("-", " ", $page);
        $temp1 = ucfirst($temp);
        $data['page_title'] = $temp1;
        $data['page'] = $page;
        $data['authURL'] =  $this->facebook->login_url();
        $data['donationReports'] = $this->user_model->get_all_blood_donations();
        $data['totalDonations'] = $this->user_model->get_total_blood_donations();
        $data['availabilityStatus'] = $this->user_model->get_availability_status($this->session->email);
        $data['userProfile'] = $this->user_model->get_user_details($this->session->email);
        $data['profile_status'] = $this->user_model->is_profile_verified();
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/user/' . $page, $data);
        $this->load->view('dashboard/template/footer');
    }

    public function report_blood_donation()
    {
        $response = $this->user_model->report_blood_donation();
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('user/report-blood-donation'));
    }

    public function update_status()
    {
        $response = $this->user_model->update_availability($this->session->email);
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('user/home'));
    }
}
