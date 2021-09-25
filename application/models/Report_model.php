<?php
/*
 * Author : thame
 * License: The MIT License (MIT)
 * Project : Blood Bank Arambram
 * Filename : Report_model.php
 * Current modification time : Sat, 25 Sep 2021 at 7:37 PM India Standard Time
 * Last modified time : Sat, 25 Sep 2021 at 7:09 PM India Standard Time
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
        $this->load->helper('form');
    }

    function login()
    {
        $user_email = $this->security->xss_clean($this->input->post('user_email'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('user_email', $user_email);

        $query = $this->db->get('users');

        $num_rows = $query->num_rows();

        if ($num_rows == 1) {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                $data = array(
                    'lid' => $row->id,
                    'user_email' => $row->user_email,
                    'user_name' => $row->user_name,
                    'user_type' => $row->user_type,
                    'sess_logged_in' => true
                );
                $this->session->set_userdata($data);
                return true;
            } else {
                return false;
            }

            return true;
        }
        return false;
    }
}
