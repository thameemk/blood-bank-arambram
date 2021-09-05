<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    function login()
    {
        $user_email = $this->security->xss_clean($this->input->post('user_email'));
        $password = $this->security->xss_clean($this->input->post('password'));
 
        $this->db->where('user_email',$user_email);
 
        $query=$this->db->get('users');
 
        $num_rows=$query->num_rows();
        
        if($num_rows == 1)
        {
              $row = $query->row();
              if (password_verify($password, $row->user_password)) {
                  $data = array(
                      'lid' => $row->lid,
                      'user_email' => $row->user_email,
                      'validated' => true
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
