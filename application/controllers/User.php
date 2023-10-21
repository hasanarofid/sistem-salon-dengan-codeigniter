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

    public function index()
    {
  $data = array(
           'judul' => 'Welcome',
            'dt_gallery' => $this->m_umum->get_gallery(),
            'dt_service' => $this->m_umum->get_service_site(),
          'dt_kategori' => $this->m_umum->get_kategori(),
          'dt_testimoni' => $this->m_umum->get_testimoni()
         
          
           
        );
        $this->template->load('user/template2', 'user/home', $data);
    }
     public function about()
    {
  $data = array(
           'judul' => 'Tentang Kami',
         
          
           
        );
        $this->template->load('user/template', 'user/about', $data);
    }
     public function service()
    {
  $data = array(
           'judul' => 'Layanan Kami',
         'dt_service' => $this->m_umum->get_service(),
          
           
        );
        $this->template->load('user/template', 'user/service', $data);
    }
     public function gallery()
    {
  $data = array(
           'judul' => 'Gallery Kami',
          'dt_gallery' => $this->m_umum->get_gallery_all(),
          
           
        );
        $this->template->load('user/template', 'user/gallery', $data);
    }
     public function pesanan()
    {
  $data = array(
           'judul' => 'Pesanan Saya',
          'dt_pesanan' => $this->m_umum->get_pesanan_saya(),
        );
        $this->template->load('user/template', 'user/pesanan', $data);
    }
     function delete_transaksi($id)
    {

        $this->m_umum->hapus('transaksi', 'id_transaksi', $id);
        $notif = " Data Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('user/pesanan');
    }
     public function uploadFile()
    {
        $config['encrypt_name'] = TRUE;
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 3000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('bukti')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;

    }
    function bayar()
    {
        $id_transaksi = $this->input->post('id_transaksi');
       
                  $file = $this->uploadFile();
               
        $data_update = array(
            'bukti' => $file
        );
        $where = array('id_transaksi' => $id_transaksi);
        $res = $this->m_umum->UpdateData('transaksi', $data_update, $where);
            $notif = "Bukti Pembayaran berhasil di upload";
            $this->session->set_flashdata('success', $notif);
            redirect('user/pesanan');

    }

 function booking()
    {
 $kode_unik = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
           $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        $jam = date('h');
        $hariini = date('Y-m-d');
        $menitdetik = date('is');

   $no_transaksi = 'BS'.$tgl.$jam.$kode_unik.$thn.$menitdetik.$bln;
   $id_pelanggan=$this->session->userdata('id_pelanggan'); 
        $this->db->set('id_transaksi', 'UUID()', FALSE);
        $this->db->set('no_transaksi',$no_transaksi);
        $this->db->set('id_pelanggan',$id_pelanggan);
        $this->db->set('tgl_transaksi',$hariini);
        $this->form_validation->set_rules('tgl_booking', 'tgl_booking', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('user/service');
        else {

            $this->m_umum->set_data("transaksi");
            $notif = "Booking berhasil silahkan tunggu konfirmasi dari admin";
            $this->session->set_flashdata('success', $notif);
            redirect('user/pesanan');
        }
    }
  
}
