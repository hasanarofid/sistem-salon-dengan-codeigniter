<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $role = $this->session->userdata('role');
        if ($role <> 1) {
              $notif = "Anda belum login";
        $this->session->set_flashdata('delete', $notif);
            redirect(site_url('site'));
        }
    }

 
  
}
