<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function is_user_registred($email)
    {
        $email = $this->security->xss_clean($email);
        $query = $this->db->get_where('users', "email='$email'");
        if ($query->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function register_user($data)
    {
        $data = $this->security->xss_clean($data);
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function is_profile_complete($email)
    {
        $email = $this->security->xss_clean($email);
        $this->db->where('email', $email);
        $this->db->where('is_profile_complete', 1);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function complete_profile()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'required');
        $this->form_validation->set_rules('blood_group', 'blood_group', 'required');
        $this->form_validation->set_rules('pin_code', 'pin_code', 'required');
        $this->form_validation->set_rules('home_address', 'home_address', 'required');
        $this->form_validation->set_rules('terms_conditions', 'terms_conditions', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            $user = array(
                'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'phone' => $this->input->post('phone'),
                'phone' => $this->input->post('phone'),
                'blood_group' => $this->input->post('blood_group'),
                'pin_code' => $this->input->post('pin_code'),
                'home_address' => $this->input->post('home_address'),
                'is_profile_complete' => 1
            );
            $this->db->where('email', $this->session->email);
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() == 1) {
                return true;
            }
            return false;
        }
    }

    function report_blood_donation()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->form_validation->set_rules('donated_date', 'donated_date', 'required');
        $this->form_validation->set_rules('donated_place', 'donated_place', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            $user_id = $this->get_user_id($this->session->email);
            $data = array(
                'user_id' => $user_id,
                'donated_date' => $this->input->post('donated_date'),
                'donated_place' => $this->input->post('donated_place'),
            );
            $this->db->insert('report', $data);
            if ($this->db->affected_rows() == 1) {
                return true;
            }
            return false;
        }
    }

    function get_user_id($email)
    {
        $email = $this->security->xss_clean($email);
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $data = $query->result_array();
        if ($query->num_rows() == 1) {
            $user_id = $data[0]['user_id'];
            return $user_id;
        } else {
            return false;
        }
    }
}
