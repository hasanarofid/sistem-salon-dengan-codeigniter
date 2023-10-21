<?php

class Site extends CI_Controller{
  function __construct()
    {
        parent::__construct();
      
        $this->load->model('m_umum');
    }

 
    public function index()
    {
  $data = array(
           'judul' => 'Booking Salon Online',
          'dt_gallery' => $this->m_umum->get_gallery(),
          'dt_service' => $this->m_umum->get_service_site(),
          'dt_kategori' => $this->m_umum->get_kategori(),
          'dt_testimoni' => $this->m_umum->get_testimoni()
          
           
        );
        $this->template->load('site/template', 'site/home', $data);
    }
    function simpan_kontak()
    {

        $this->db->set('id_kontak', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/kontak');
        else {

            $this->m_umum->set_data("kontak");
            $notif = "Data Berhasil dikirim";
            $this->session->set_flashdata('success', $notif);
            redirect('site');
        }
    }
       function register()
    {
  $username = $this->input->post('username');
   $detail = $this->m_umum->get_pelanggan($username);
         

        $this->db->set('id_pelanggan', 'UUID()', FALSE);
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
      
        $password = $this->input->post('password');
              
      
        $data = array(
            
            'nama_pelanggan' => $nama_pelanggan,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'username' => $username,
            'role' => 1,
            'password' => md5($username),
        );
 if ($detail->num_rows() > 0) {
            $notif = "Username sudah ada";
            $this->session->set_flashdata('delete', $notif);
            redirect('site');
        }
        else {
        $this->m_umum->input_data($data, 'pelanggan');
            $notif = "Register Berhasil Silahkan Login";
            $this->session->set_flashdata('success', $notif);
            redirect('site');
          }

    }
     public function about()
    {
  $data = array(
           'judul' => 'Tentang Kami',
         
          
           
        );
        $this->template->load('site/template2', 'site/about', $data);
    }
     public function service()
    {
  $data = array(
           'judul' => 'Layanan Kami',
         'dt_service' => $this->m_umum->get_service(),
          
           
        );
        $this->template->load('site/template2', 'site/service', $data);
    }
     public function gallery()
    {
  $data = array(
           'judul' => 'Gallery Kami',
          'dt_gallery' => $this->m_umum->get_gallery_all(),
          
           
        );
        $this->template->load('site/template2', 'site/gallery', $data);
    }

}

 