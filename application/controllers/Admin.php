<?php

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_admin');
        $this->load->model('m_pokja');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi <> 1) {
            redirect(site_url('login'));
        }
    }

 public function kritiksaran()
    {
        $data = array(
            'judul' => 'Kritik,Saran dan Masukan',
            'dt_pengaduan' => $this->m_pokja->get_pengaduan(),
        );
        $this->template->load('admin/template', 'admin/pengaduan', $data);
    }
    function index()
    {
        $tahunbulan = date('Y-m');
        $d = strtotime("-1 Month");
        $tahunbulan1 =  date('Y-m', $d);
        $d = strtotime("-2 Month");
        $tahunbulan2 = date('Y-m', $d);
        $d = strtotime("-3 Month");
        $tahunbulan3 = date('Y-m', $d);
        $datamasuk = $this->m_pokja->get_dtgrafiklayanan('3h7g4h7', $tahunbulan)->row_array();
        $datamasuk1 = $this->m_pokja->get_dtgrafiklayanan('3h7g4h7', $tahunbulan1)->row_array();
        $datamasuk2 = $this->m_pokja->get_dtgrafiklayanan('3h7g4h7', $tahunbulan2)->row_array();
        $datamasuk3 = $this->m_pokja->get_dtgrafiklayanan('3h7g4h7', $tahunbulan3)->row_array();
        $datamasukttl = "[" . $datamasuk3['total'] . "," . $datamasuk2['total'] . "," . $datamasuk1['total'] . "," . $datamasuk['total'] . "]";
        $dataselesai = $this->m_pokja->get_dtgrafiklayanan('9f5s9ef', $tahunbulan)->row_array();
        $dataselesai1 = $this->m_pokja->get_dtgrafiklayanan('9f5s9ef', $tahunbulan1)->row_array();
        $dataselesai2 = $this->m_pokja->get_dtgrafiklayanan('9f5s9ef', $tahunbulan2)->row_array();
        $dataselesai3 = $this->m_pokja->get_dtgrafiklayanan('9f5s9ef', $tahunbulan3)->row_array();
        $dataselesaittl = "[" . $dataselesai3['total'] . "," . $dataselesai2['total'] . "," . $dataselesai1['total'] . "," . $dataselesai['total'] . "]";
        $datatolak = $this->m_pokja->get_dtgrafiklayanan('6d5e4s5', $tahunbulan)->row_array();
        $datatolak1 = $this->m_pokja->get_dtgrafiklayanan('6d5e4s5', $tahunbulan1)->row_array();
        $datatolak2 = $this->m_pokja->get_dtgrafiklayanan('6d5e4s5', $tahunbulan2)->row_array();
        $datatolak3 = $this->m_pokja->get_dtgrafiklayanan('6d5e4s5', $tahunbulan3)->row_array();
        $datatolakttl = "[" . $datatolak3['total'] . "," . $datatolak2['total'] . "," . $datatolak1['total'] . "," . $datatolak['total'] . "]";
        $data = array(
            'judul' => 'Dashboard Pinandu',
            'datajumlahlayanan' => $this->m_pokja->get_datalayananstatus_db(),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,
        );
        $this->template->load('admin/template', 'admin/home', $data);
    }
    public function uploadTemplate($inisial)
    {
        $nama_file = $inisial . "-" . "template";
        $config['file_name'] = $nama_file;
        $config['upload_path'] = 'assets/dokumen/template';
        $config['allowed_types'] = 'pdf|xls|doc|docx|xlsx';
        $config['overwrite'] = false;
        $config['max_size'] = 3000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('template')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;

    }
    function pts()
    {

        $data = array(
            'judul' => 'PTS',
            'dt_pts' => $this->m_admin->get_pt(),
        );
        $this->template->load('admin/template', 'admin/pts', $data);
    }
    function layanan_baru()
    {

        $data = array(
            'judul' => 'Layanan baru',
            'dt_layanan_baru' => $this->m_admin->get_layanan_baru(),
        );
        $this->template->load('admin/template', 'admin/layanan_baru', $data);
    }

    function riwayat_layanan()
    {
        $data = array(
            'judul' => 'Layanan PTS',
            'dt_riwayat_layanan' => $this->m_admin->get_riwayat_layanan(),
        );
        $this->template->load('admin/template', 'admin/riwayat_layanan', $data);
    }
   
      function view_layanan($id_layanan = FALSE)
    {
        $detail_layanan = $this->m_pokja->get_row_detail_layanan($id_layanan);
        $bagian = $this->session->userdata('id_bagian_pegawai');
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_bagian' => $this->m_pokja->get_detail_bagian($bagian),
            'get_row_detail_layanan' => $this->m_pokja->get_row_detail_layanan($id_layanan),
            'get_all_syarat_layanan' => $this->m_pokja->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->m_pokja->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->m_pokja->get_all_dokumen_respon($detail_layanan->id_layanan),
            'get_status_proses_ajuan' => $this->m_pokja->get_status_proses_ajuan(),
            'get_pegawai_per_bagian' => $this->m_pokja->get_pegawai_per_bagian($detail_layanan->id_bagian),
            'action_teruskan_ajuan' => "pokja/action_teruskan_ajuan",
        );
        $this->template->load('admin/template', 'admin/view_layanan', $data);
    }
    function pegawai()
    {
        $data = array(
            'judul' => 'Pegawai',
            'dt_pegawai' => $this->m_admin->get_pegawai(),
        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }
    function bagian()
    {

        $data = array(
            'judul' => 'Bagian',
            'dt_bagian' => $this->m_admin->get_bagian(),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/bagian', $data);
    }
    function simpan_bagian()
    {

        $this->db->set('id_bagian', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {

            $this->m_umum->set_data("bagian");
            $notif = "Tambah bagian Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bagian');
        }
    }
    function update_bagian()
    {

        $this->form_validation->set_rules('id_bagian', 'id_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {
            $this->m_umum->update_data("bagian");
            $notif = " Update Bagian Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bagian');
        }
    }
    function delete_bagian($id)
    {

        $this->m_umum->hapus('bagian', 'id_bagian', $id);
        $notif = " Bagian berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bagian');
    }
    function sp()
    {

        $data = array(
            'judul' => 'Standar Pelayanan',
            'dt_sp' => $this->m_admin->get_sp(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),
        );
        $this->template->load('admin/template', 'admin/sp', $data);
    }
    function simpan_sp()
    {

        $this->db->set('id_sp', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_sp', 'nama_sp', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/sp');
        else {

            $this->m_umum->set_data("sp");
            $notif = "Tambah SP Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/sp');
        }
    }
    function update_sp()
    {

        $this->form_validation->set_rules('id_sp', 'id_sp', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/sp');
        else {
            $this->m_umum->update_data("sp");
            $notif = " Update Standar Pelayanan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/sp');
        }
    }
    function delete_sp($id)
    {

        $this->m_umum->hapus('sp', 'id_sp', $id);
        $notif = " SP berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/sp');
    }
    function detail_sp()
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'dt_detail_sp' => $this->m_admin->get_sp(),
        );
        $this->template->load('admin/template', 'admin/detail_sp', $data);
    }
    function add_detail_sp($id_sp = FALSE)
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'id_sp' => $id_sp,
            'd' => $this->m_admin->update_sp($id_sp),
            'dt_detail_sp' => $this->m_admin->get_detail_sp($id_sp),
            'dt_syarat' => $this->m_umum->get_data('syarat'),
        );
        $this->template->load('admin/template', 'admin/add_detail_sp', $data);
    }
    function simpan_detail_sp()
    {

        $this->db->set('id_detail_sp', 'UUID()', FALSE);
        $id_sp = $this->input->post('id_sp');
        $this->form_validation->set_rules('id_syarat', 'id_syarat', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
        else {

            $this->m_umum->set_data("detail_sp");
            $notif = "Tambah Syarat SP Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
        }
    }
    function delete_detail_sp($id, $id_sp)
    {

        $this->m_umum->hapus('detail_sp', 'id_detail_sp', $id);
        $notif = " Detail SP berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
    }
    function syarat()
    {

        $data = array(
            'judul' => 'Syarat',
            'dt_syarat' => $this->m_admin->get_syarat(),
        );
        $this->template->load('admin/template', 'admin/syarat', $data);
    }
    
     function simpan_syarat()
    {
        $this->db->set('id_syarat', 'UUID()', FALSE);
        $nama_syarat = $this->input->post('nama_syarat');
        $size = $this->input->post('size');
        $inisial = $this->input->post('inisial');
          if (!empty($_FILES["template"]["name"])) {
                  $template = $this->uploadTemplate($inisial);
                } else {
                    $template = 'NULL';
                }
        $data = array(
            
            'nama_syarat' => $nama_syarat,
            'inisial' => $inisial,
            'size' => $size,
            'template' => $template
        );

        $this->m_umum->input_data($data, 'syarat');
            $notif = "Tambah Syarat Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/syarat');

    }

           
   function update_syarat()
    {
        $id_syarat = $this->input->post('id_syarat');
        $nama_syarat = $this->input->post('nama_syarat');
        $size = $this->input->post('size');
        $inisial = $this->input->post('inisial');
             $old_template = $this->input->post('old_template');
        
            if (!empty($_FILES["template"]["name"])) {
                  $template = $this->uploadTemplate($inisial);
                  unlink("./assets/dokumen/template/$old_template");
                } else {
                    $template = $old_template;
                }
        $data_update = array(
            'nama_syarat' => $nama_syarat,
            'inisial' => $inisial,
            'size' => $size,
            'template' => $template
        );
        $where = array('id_syarat' => $id_syarat);
        $res = $this->m_umum->UpdateData('syarat', $data_update, $where);
            $notif = "Update Syarat Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/syarat');

    }
    function delete_syarat($id,$template)
    {

        $this->m_umum->hapus('syarat', 'id_syarat', $id);
          unlink("./assets/dokumen/template/$template");
        $notif = " Syarat berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/syarat');
    }


    function status_dokumen()
    {

        $data = array(
            'judul' => 'Status Dokumen',
            'dt_status_dokumen' => $this->m_umum->get_data('status_dokumen'),
        );
        $this->template->load('admin/template', 'admin/status_dokumen', $data);
    }
    function simpan_status_dokumen()
    {

        $this->db->set('id_status_dokumen', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_status_dokumen', 'nama_status_dokumen', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_dokumen');
        else {

            $this->m_umum->set_data("status_dokumen");
            $notif = "Tambah Status Dokumen Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/status_dokumen');
        }
    }
    function update_status_dokumen()
    {

        $this->form_validation->set_rules('id_status_dokumen', 'id_status_dokumen', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_dokumen');
        else {
            $this->m_umum->update_data("status_dokumen");
            $notif = " Update Status Dokumen Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/status_dokumen');
        }
    }
    function delete_status_dokumen($id)
    {

        $this->m_umum->hapus('status_dokumen', 'id_status_dokumen', $id);
        $notif = " Status Dokumen Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/status_dokumen');
    }
    function hari_libur()
    {

        $data = array(
            'judul' => 'Hari Libur',
            'dt_hari_libur' => $this->m_umum->get_data('hari_libur'),
        );
        $this->template->load('admin/template', 'admin/hari_libur', $data);
    }
    function simpan_hari_libur()
    {

        $this->db->set('id_hari_libur', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_hari_libur', 'nama_hari_libur', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/hari_libur');
        else {

            $this->m_umum->set_data("hari_libur");
            $notif = "Tambah Hari Libur Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/hari_libur');
        }
    }
    function update_hari_libur()
    {

        $this->form_validation->set_rules('id_hari_libur', 'id_hari_libur', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/hari_libur');
        else {
            $this->m_umum->update_data("hari_libur");
            $notif = " Update Hari Libur Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/hari_libur');
        }
    }
    function delete_hari_libur($id)
    {

        $this->m_umum->hapus('hari_libur', 'id_hari_libur', $id);
        $notif = "Hari Libur Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/hari_libur');
    }

    function status_layanan()
    {

        $data = array(
            'judul' => 'Status Layanan',
            'dt_status_layanan' => $this->m_umum->get_data('status_layanan'),
        );
        $this->template->load('admin/template', 'admin/status_layanan', $data);
    }
    function simpan_status_layanan()
    {

        $this->db->set('id_status_layanan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_status_layanan', 'nama_status_layanan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_layanan');
        else {
            $this->m_umum->set_data("status_layanan");
            $notif = "Tambah Status Layanan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/status_layanan');
        }
    }
    function update_status_layanan()
    {

        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_layanan');
        else {
            $this->m_umum->update_data("status_layanan");
            $notif = " Update Status Layanan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/status_layanan');
        }
    }
    function delete_status_layanan($id)
    {

        $this->m_umum->hapus('status_layanan', 'id_status_layanan', $id);
        $notif = " Status Layanan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/status_layanan');
    }

     function verifikasi()
    {
       
        $status = $this->input->post('status');
        $id_pengguna_pt = $this->input->post('id_pengguna_pt');
        $username = $this->input->post('username');
        $password_temporary = $this->input->post('password_temporary');
        $email = $this->input->post('email');
        $catatan = $this->input->post('catatan');
        $data = array(
            'status' => $status,
            'password_temporary' => '',
        );

         ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $from = "admin@pinandu.lldikti11.or.id";
            $to = $email;
            $subject = "Verifikasi Akun";
                if ($status==1) {
            $message = "Akun Anda telah aktif, Username anda: $username dan Password  anda: $password_temporary silahkan login pada laman https://pinandu.lldikti11.or.id/login/auth_pts";
        }else {
             $message = "Pendaftaran akun anda tidak valid $catatan";
        }
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
        $this->db->where('id_pengguna_pt', $id_pengguna_pt);
        $update = $this->db->update('pengguna_pt', $data);
        $notif = "Verifikasi Akun PT Berhasil";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/pendaftar');
    }

     function pendaftar()
    {

        $data = array(
            'judul' => 'Pendaftaran Akun PT',
            'dt_pendaftar' => $this->m_admin->get_pendaftar(),
        );
        $this->template->load('admin/template', 'admin/pendaftar', $data);
    }
function delete_pendaftar($id)
    {

        $this->m_umum->hapus('pengguna_pt', 'id_pengguna_pt', $id);
        $notif = "Pendaftar Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/Pendaftar');
    }
 function pengguna_pt()
    {

        $data = array(
            'judul' => 'Akun Perguruan Tinggi',
            'dt_pengguna_pt' => $this->m_admin->get_pengguna_pt(),
        );
        $this->template->load('admin/template', 'admin/pengguna_pt', $data);
    }
    function pengguna()
    {

        $data = array(
            'judul' => 'Akun Pegawai',
            'dt_pengguna' => $this->m_admin->get_pengguna(),
            'dt_aplikasi' => $this->m_umum->get_data('aplikasi'),
            'dt_role' => $this->m_umum->get_data('role'),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/pengguna', $data);
    }
    function simpan_pengguna()
    {

        $this->db->set('id_pengguna', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/pengguna');
        else {
            $this->m_umum->set_data("pengguna");
            $notif = "Tambah Pengguna Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/pengguna');
        }
    }
    function update_pengguna()
    {

        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/pengguna');
        else {
            $this->m_umum->update_data("pengguna");
            $notif = " Update Pengguna Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/pengguna');
        }
    }
    function delete_pengguna($id)
    {

        $this->m_umum->hapus('pengguna', 'id_pengguna', $id);
        $notif = " Pengguna Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pengguna');
    }

    function aplikasi()
    {

        $data = array(
            'judul' => 'Aplikasi',
            'dt_aplikasi' => $this->m_umum->get_data('aplikasi'),
        );
        $this->template->load('admin/template', 'admin/aplikasi', $data);
    }
    function simpan_aplikasi()
    {

       
        $this->form_validation->set_rules('nama_aplikasi', 'nama_aplikasi', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/aplikasi');
        else {

            $this->m_umum->set_data("aplikasi");
            $notif = "Tambah Aplikasi Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/aplikasi');
        }
    }

    function delete_aplikasi($id)
    {

        $this->m_umum->hapus('aplikasi', 'id_aplikasi', $id);
        $notif = " Aplikasi Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/aplikasi');
    }

    function role()
    {

        $data = array(
            'judul' => 'Role',
            'dt_role' => $this->m_umum->get_data('role'),
        );
        $this->template->load('admin/template', 'admin/role', $data);
    }
    function simpan_role()
    {

     
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/role');
        else {

            $this->m_umum->set_data("role");
            $notif = "Tambah Role Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/role');
        }
    }
    function delete_role($id)
    {

        $this->m_umum->hapus('role', 'id_role', $id);
        $notif = " Role Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/role');
    }
    function delete_layanan($id)
    {

        $this->m_umum->hapus('layanan', 'id_layanan', $id);
        $this->m_umum->hapus('riwayat_tiket', 'id_layanan', $id);
        $this->m_umum->hapus('dokumen', 'id_layanan', $id);
        $notif = " Layanan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/layanan_baru');
    }
     function view_dokumen_syarat($id_dokumen)
    {

        $data = array(
            'judul' => 'Dokumen Syarat',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_dokumen' => $this->m_pokja->get_row_view_dokumen($id_dokumen),
        );
        $this->load->view('admin/view_dokumen_syarat', $data);
    }

  
}
