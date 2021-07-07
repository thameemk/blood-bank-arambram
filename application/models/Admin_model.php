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
        $this->db->select('user_id,name,blood_group,phone,is_verified,email');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }

    function verify_user()
    {
        $email = $this->security->xss_clean($this->input->post('email'));
        $data = array(
            'is_verified' => 1
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
}
