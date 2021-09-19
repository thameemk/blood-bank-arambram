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
        $this->db->select('id,user_name,blood_group,user_phone,user_email,added_by,is_available,user_type');
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
        $this->db->where('email', $email);
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
        $this->db->select('u.user_name,u.user_email,r.report_id,r.donated_date,r.donated_place,r.is_verified,r.added_by,u.user_phone');
        $this->db->from('users as u, report as r');
        $this->db->where('u.id = r.user_id');
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

    function add_new_donor()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->form_validation->set_rules('phone', 'phone', 'required|is_unique[users.user_phone]');
        $this->form_validation->set_rules('phone_2', 'phone_2', 'is_unique[users.user_phone_2]');
        $this->form_validation->set_rules('phone', 'phone', 'required|is_unique[users.user_phone_2]');
        $this->form_validation->set_rules('phone_2', 'phone_2', 'is_unique[users.user_phone]');
        $this->form_validation->set_rules('email', 'email', 'is_unique[users.email]');
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = false;
            $response['message'] = 'Alredy Registred';
        } else {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('dob', 'dob', 'required');
            $this->form_validation->set_rules('blood_group', 'blood_group', 'required');
            $this->form_validation->set_rules('pin_code', 'pin_code', 'required');
            $this->form_validation->set_rules('home_address', 'home_address', 'required');
            if ($this->form_validation->run() == FALSE) {
                $response['status'] = false;
                $response['message'] = 'Fill all requird fields';
            } else {
                $user = array(
                    'user_name' => $this->input->post('name'),
                    'user_email' => $this->input->post('email'),
                    'gender' => $this->input->post('gender'),
                    'dob' => $this->input->post('dob'),
                    'user_phone' => $this->input->post('phone'),
                    'user_phone_2' => $this->input->post('phone_2'),
                    'blood_group' => $this->input->post('blood_group'),
                    'pincode' => $this->input->post('pin_code'),
                    'address' => $this->input->post('home_address'),
                    'added_by' => $this->session->user_email,
                    'password' => password_hash($this->input->post('phone'), PASSWORD_DEFAULT),
                );
                $this->db->insert('users', $user);
                if ($this->db->affected_rows() == 1) {
                    $response['status'] = true;
                    $response['message'] = 'Successfully Updated';
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Some error has been occurred. Please try again later';
                }
            }
        }
        return $response;
    }

    function check_duplicate_same_day_donation($user_id, $date)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('donated_date', $date);
        $query = $this->db->get('report');
        $data = $query->result_array();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function report_user_blood_donation()
    {
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
        $this->form_validation->set_rules('donated_date', 'donated_date', 'required');
        $this->form_validation->set_rules('donated_place', 'donated_place', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = false;
            $response['message'] = 'Form Validation Error';
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'donated_date' => $this->input->post('donated_date'),
                'donated_place' => $this->input->post('donated_place'),
                'is_verified' => 1,
                'added_by' => $this->session->user_email
            );
            if ($this->check_duplicate_same_day_donation($data['user_id'], $data['donated_date']) == TRUE) {
                $response['status'] = false;
                $response['message'] = 'Duplicate Entry Found';
            } else {
                $this->db->insert('report', $data);
                if ($this->db->affected_rows() == 1) {
                    $response['status'] = true;
                    $response['message'] = 'Successfully Added';
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Error Not Defined';
                }
            }
        }
        return $response;
    }


    

    function check_date($user_id)
    {
        date_default_timezone_set('Asia/Kolkata');
        $today =  date('Y-m-d');
        $this->db->select('user_id,donated_date');
        $this->db->from('report');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('donated_date', 'DESC');
        $last_donation = $this->db->get()->row();
        if ($last_donation != null) {
            $last_date = $last_donation->donated_date;
            $diff = abs(strtotime($today) - strtotime($last_date));
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            if ($days >= 90) {
                return $last_donation;
            }
        } else {
            $last_donation = array(
                'user_id' => $user_id,
                'donted_date' => null
            );
            return $last_donation;
        }
    }

    function get_all_active_donors()
    {
        $this->db->select('id,user_name,blood_group,user_phone,user_email,user_phone_2');
        $this->db->from('users');
        $this->db->where('is_available', 1);
        $query = $this->db->get();
        // foreach ($query->result() as $user) {
        //     $status = $this->check_date($user->user_id);
        //     echo json_encode($status);
        // }
        // exit;
        return $query->result_array();
    }

    function get_user_details($user_phone)
    {
        $this->db->select('user_name,user_email,gender,address,user_phone,user_phone_2,dob,blood_group,pincode,user_type');
        $this->db->from('users');
        $this->db->where('user_phone', $user_phone);
        $query = $this->db->get();
        return $query->row();
    }
}
