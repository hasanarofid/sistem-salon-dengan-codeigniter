<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 1) {
            redirect(site_url('user'));
        }
        if ($role == 2) {
            redirect(site_url('admin'));
        } else {
         redirect('site');
        }
    }

    public function auth_action()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_login = $this->m_login->auth($username, $password);
        $cek_user = $this->m_login->auth_pelanggan($username, $password);
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
     
            if ($data->role == 2) {
                $this->session->set_userdata('role', $data->role);
              
                
                redirect('admin');
            }
            
             else {
                $notif = "Gagal";
                $this->session->set_flashdata('delete', $notif);
                redirect('site');
            }

        } 

      if ($cek_user->num_rows() > 0) {
            $data_user = $cek_user->row();
     
            if ($data_user->role == 1) {
                $this->session->set_userdata('role', $data_user->role);
                $this->session->set_userdata('id_pelanggan', $data_user->id_pelanggan);
                $this->session->set_userdata('nama', $data_user->nama_pelanggan);
              
                
                redirect('user');
            }
            
             else {
                $notif = "Gagal";
                $this->session->set_flashdata('delete', $notif);
                redirect('site');
            }

        } 
        else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);

            redirect('site');
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('site'));
    }
}