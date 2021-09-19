<?php
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        if (!$this->session->userdata('sess_logged_in') == 1 and $this->session->user_type != 'admin') {
            $this->session->set_flashdata('fail', 'You are not authorized. please login and try again! ');
            redirect(base_url('auth/logout'));
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
        $data['allDonors'] = $this->admin_model->get_all_donors();
        $data['allDonations'] = $this->admin_model->get_all_donations();
        $data['allActiveDonors'] = $this->admin_model->get_all_active_donors();
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

    function get_user_data($user_phone)
    {
        $user_phone = $this->security->xss_clean($user_phone);
        $response = $this->admin_model->get_user_details($user_phone);
        echo json_encode($response);
    }

    function verify_donation()
    {
        $response = $this->admin_model->verify_user_donation();
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('admin/view-all-donations'));
    }

    function add_donor()
    {
        $response = $this->admin_model->add_new_donor();
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('admin/add-donor'));
    }

    function report_user_blood_donation()
    {
        $response = $this->admin_model->report_user_blood_donation();
        if ($response['status'] == true) {
            $this->session->set_flashdata('success', $response['message']);
        } else {
            $this->session->set_flashdata('fail', $response['message']);
        }
        redirect(base_url('admin/add-donation'));
    }
}
