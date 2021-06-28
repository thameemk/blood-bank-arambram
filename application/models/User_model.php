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
}
