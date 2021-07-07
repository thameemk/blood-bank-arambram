<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }
}
