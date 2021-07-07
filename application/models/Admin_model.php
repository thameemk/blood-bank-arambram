<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function get_all_donors()
    {
        $this->db->select('user_id,status,name,blood_group,phone,is_verified,email,verified_admin');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    function verify_user()
    {
        $email = $this->security->xss_clean($this->input->post('email'));
        $data = array(
            'is_verified' => 1,
            'verified_admin' => $this->session->email
        );
        $this->db->where('email', $this->session->email);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() == 1) {
            $response['status'] = true;
            $response['message'] = 'Successfully Updated';
        } else {
            $response['status'] = false;
            $response['message'] = 'Some error has been occurred';
        }
        return $response;
    }

    function get_all_donations()
    {
        $this->db->select('u.name,u.email,r.report_id,r.donated_date,r.donated_place,r.is_verified,r.verified_admin');
        $this->db->from('users as u, report as r');
        $this->db->where('u.user_id = r.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function verify_user_donation()
    {
        $report_id = $this->security->xss_clean($this->input->post('report_id'));
        $data = array(
            'is_verified' => 1,
            'verified_admin' => $this->session->email,
        );
        $this->db->where('report_id', $report_id);
        $this->db->update('report', $data);
        if ($this->db->affected_rows() == 1) {
            $response['status'] = true;
            $response['message'] = 'Successfully Updated';
        } else {
            $response['status'] = false;
            $response['message'] = 'Some error has been occurred';
        }
        return $response;
    }
}
