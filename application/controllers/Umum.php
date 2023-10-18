<?php

class Umum extends CI_Controller
{
    function __construct()
    {
        date_default_timezone_set('Asia/Makassar');
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_user_umum');
        $this->load->model('pts_model');
    }
    function create_captcha()
    {
        $options = array(
            'img_path' => 'captcha/',
            'img_url' => base_url('captcha'),
            'img_width' => '100',
            'img_height' => '40',
            'img_id'       => 'Imageid',
            'expiration' => 7200,
            'word_length'   => 4,
            'font_size'     => 50,
            'pool' => '0123456789',
            'expiration' => 100,
            'colors' => array(
                'background' => array(0, 0, 0),
                'border' => array(255, 255, 255),
                'text' => array(255, 255, 255),
                'grid' => array(255, 40, 40)
            )
        );
        $cap = create_captcha($options);
        $image = $cap['image'];
        $this->session->set_userdata('captchaword', $cap['word']);
        return $image;
    }
    function check_captcha()
    {
        if ($this->input->post('captcha') == $this->session->userdata('captchaword')) {

            return true;
        } else {

            $this->form_validation->set_message('check_captcha', 'Captcha tidak sama');

            return false;
        }
    }
    function index()
    {

        $data = array(
            'judul' => 'Selamat Datang !',
            'dt_sp' => $this->m_user_umum->get_sp(),
            'captcha' => $this->create_captcha(),
         
        );
        $this->template->load('umum/template_umum', 'umum/buat_tiket1', $data);
    }
    function input_tiket()
    {

        $data = array(
            'judul' => 'Selamat Datang !',
           
        );
        $this->template->load('umum/template_umum', 'umum/input_tiket', $data);
    }



    function info_sp()
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'dt_info_sp' => $this->m_user_umum->get_sp(),
        );
        $this->template->load('umum/template', 'umum/info_sp', $data);
    }
    function view_detail_sp($id_sp)
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'id_sp' => $id_sp,
            'd' => $this->m_user_umum->update_sp($id_sp),
            'dt_detail_sp' => $this->m_user_umum->get_detail_sp($id_sp),
        );
        $this->template->load('umum/template', 'umum/view_detail_sp', $data);
    }

   
    function buat_tiket()
    {
                $this->load->library('uuid');
          $kode_unik = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
           $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        $jam = date('h');
        $menitdetik = date('is');

   $no_tiket = 'TK-'.$tgl.$jam.$kode_unik.$thn.$menitdetik.$bln;
        $id_layanan = $this->uuid->v4();
        $id_riwayat = $this->uuid->v4();

   $this->form_validation->set_rules('id_sp', 'id_sp', 'required');
        $this->form_validation->set_rules('nama_pengusul', 'nama_pengusul', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        $this->form_validation->set_rules('asal_institusi', 'asal_institusi', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|callback_check_captcha|required');
        $email = $this->input->post('email');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('umum');
        } else {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $from = "admin@pinandu.lldikti11.or.id";
            $to = $email;
            $subject = "Tiket Mail";
            $message = "Terima kasih sudah menggunakan Pinandu LLDIKTI Wilayah XI. Beserta dengan email ini dikirimkan kode tiket berikut $no_tiket yang bisa digunakan untuk memantau perkembanan pengajuan layanan pada halaman berikut https://pinandu.lldikti11.or.id/umum/input_tiket";
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
            $data_layanan = array(
                'id_layanan' => $id_layanan,
                'no_tiket' => $no_tiket,
                'id_sp' => $this->input->post('id_sp'),
                'nama_pengusul' => $this->input->post('nama_pengusul'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $email,
                'pekerjaan' => $this->input->post('pekerjaan'),
                  'asal_institusi' => $this->input->post('asal_institusi'),
                  'alamat' => $this->input->post('alamat'),
                  'ket' => $this->input->post('ket'),
                'id_status_layanan' => '1f7e6gj'
            );

            if ($this->db->insert('layanan', $data_layanan)) {
                $data_riwayat = array(
                    'id_riwayat' => $id_riwayat,
                    'id_layanan' => $id_layanan,
                    'id_status_layanan' => '1f7e6gj',
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Tiket Layanan Berhasil di Buat";
                $this->session->set_flashdata('success', $notif);
               redirect(base_url() . "umum/hasil_tiket/" . $no_tiket);
            } else {
                $notif = "Gagal Memasukan Data";
                $this->session->set_flashdata('delete', $notif);
                redirect('umum');
            }
        }
    }
    function hasil_tiket($kodeunik)
    {

        $data = array(
            'judul' => 'Kode Tiket ',
            'kode_tiket' => $kodeunik,
        );
        $this->template->load('umum/template_umum', 'umum/hasil_tiket', $data);
    }
    function cek_tiket()
    {
        $nomor_tiket = $this->input->post('nomor_tiket');
        $this->form_validation->set_rules('nomor_tiket', 'nomor_tiket', 'required');
        if ($this->form_validation->run() === FALSE) {
            $notif = "No Tiket Wajib di isi";
            $this->session->set_flashdata('delete', $notif);
            redirect('umum/input_tiket');
        } else {
            redirect(base_url() . "umum/show_tiket/" . $nomor_tiket);
        }
    }
   function show_tiket($nomor_tiket = FALSE)
    {
        $detail = $this->m_user_umum->get_tiket($nomor_tiket);
        if ($detail->num_rows() == 0) {
            $notif = "No Tiket tidak ada, harap periksa kembali";
            $this->session->set_flashdata('delete', $notif);
            redirect('umum/input_tiket');
        } else {

         
             $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            
            'get_row_detail_layanan' => $this->pts_model->get_row_detail_layanan($nomor_tiket),
            'get_all_syarat_layanan' => $this->pts_model->get_all_syarat_layanan($detail->row()->id_sp),
            'get_all_riwayat_tiket' => $this->pts_model->get_all_riwayat_tiket($detail->row()->id_layanan),
            'get_all_dokumen_respon' => $this->pts_model->get_all_dokumen_respon($detail->row()->id_layanan),
            'action_tambah_dokumen' => 'umum/action_tambah_dokumen',
            'action_kirim_ajuan' => 'umum/kirim_tiket',
        );
            $this->template->load('umum/template_show_tiket', 'umum/show_tiket', $data);
        }
    }
    
    function view_dokumen_syarat($id_dokumen)
    {

        $data = array(
            'judul' => 'Dokumen Syarat',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_dokumen' => $this->pts_model->get_row_view_dokumen($id_dokumen),
        );
        $this->load->view('pts/view_dokumen_syarat', $data);
    }

    function action_tambah_dokumen()
    {
           $jam = date('his');
        $id_layanan = $this->input->post('id_layanan');
        $id_syarat = $this->input->post('id_syarat');
        $detail_layanan = $this->pts_model->get_row_layanan($id_layanan);
        $syarat = $this->m_umum->ambil_data('syarat', 'id_syarat', $id_syarat);
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('id_syarat', 'id_syarat', 'required');
        $this->form_validation->set_rules('id_status_dokumen', 'id_status_dokumen', 'required');
        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('pts/detai_pengajuan_layanan/' . $detail_layanan->no_tiket);
        } else {
            $cek_dokumen = $this->pts_model->get_row_dokumen($id_layanan, $id_syarat);
            $cek_dokumen2 = $this->pts_model->get_row_dokumen_cek($id_layanan, $id_syarat);
            $inisial = $this->pts_model->get_row_syarat($id_syarat);
            if ($cek_dokumen2->num_rows() > 0) {
                unlink("./assets/dokumen/berkas/$cek_dokumen->file");
            
                  $nama_file = $detail_layanan->no_tiket . "-" . $inisial->inisial ."-" .$jam;
                $config['file_name'] = $nama_file;
                $config['upload_path'] = './assets/dokumen/berkas';
                $config['upload_url'] = base_url('/assets/dokumen/berkas');
                $config['allowed_types'] = 'pdf';
                $config['overwrite'] = false;
                $config['max_size'] = $syarat->size;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {

                    $file = $this->upload->data('file_name');
                    $data = array(
                        'id_dokumen' => $cek_dokumen->id_dokumen,
                        'id_layanan' => $this->input->post('id_layanan', TRUE),
                        'id_syarat' => $this->input->post('id_syarat', TRUE),
                        'id_status_dokumen' => $this->input->post('id_status_dokumen', TRUE),
                        'file' => $file,
                    );
                    $this->db->where('id_dokumen', $cek_dokumen->id_dokumen);
                    $this->db->update('dokumen', $data);
                    $notif = "Dokumen Berhasil di Update ";
                    $this->session->set_flashdata('success', $notif);
                    redirect(base_url('umum/show_tiket/' . $detail_layanan->no_tiket));
                } else {
                    $notif = "Dokumen Gagal di Update";
                    $this->session->set_flashdata('delete', $notif);
                    redirect(base_url('umum/show_tiket/' . $detail_layanan->no_tiket));
                }
            } else {
                $this->db->set('id_dokumen', 'UUID()', FALSE);
                $nama_file = $detail_layanan->no_tiket."-".$inisial->inisial;
                $config['file_name'] = $nama_file;
                $config['upload_path'] = './assets/dokumen/berkas';
                $config['upload_url'] = base_url('/assets/dokumen/berkas');
                $config['allowed_types'] = 'pdf';
                $config['overwrite'] = false;
                $config['max_size'] = $syarat->size;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {

                    $file = $this->upload->data('file_name');
                    $data = array(
                        'id_layanan' => $this->input->post('id_layanan', TRUE),
                        'id_syarat' => $this->input->post('id_syarat', TRUE),
                        'id_status_dokumen' => $this->input->post('id_status_dokumen', TRUE),
                        'file' => $file,
                    );
                    $this->db->insert('dokumen', $data);
                    $notif = "Dokumen Berhasil di Upload";
                    $this->session->set_flashdata('success', $notif);
                    redirect(base_url('umum/show_tiket/' . $detail_layanan->no_tiket));
                } else {
                    $notif = "Dokumen Gagal Upload Size melebihi";
                    $this->session->set_flashdata('delete', $notif);
                    redirect(base_url('umum/show_tiket/' . $detail_layanan->no_tiket));
                }
            }
        }
    }
    function kirim_tiket()
    {
         $this->load->library('uuid');
         $id_riwayat = $this->uuid->v4();
         
        $id_layanan = $this->input->post('id_layanan');
        $no_tiket = $this->input->post('no_tiket');
        $id_status_layanan = $this->input->post('id_status_layanan');

        $data = array(
            'id_riwayat' => $id_riwayat,
            'id_layanan' => $id_layanan,
            'id_status_layanan' => $id_status_layanan,
            'tgl_riwayat' => date("Y-m-d H:i:s"),
        );
        $datalayanan = array(
            'id_status_layanan' => $id_status_layanan
        );
        $where = array('id_layanan' => $id_layanan);
        $res = $this->m_umum->UpdateData('layanan', $datalayanan, $where);
        $this->m_umum->input_data($data, 'riwayat_tiket');
        $notif = "Tiket anda berhasil dikirim";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url() . "umum/show_tiket/" . $no_tiket);
    }
    public function uploadBerkas($size, $no_tiket)
    {
        $config['upload_path']          = 'berkas';
        $config['allowed_types']        = 'pdf';
        $config['overwrite']            = false;
        $config['max_size']             = $size;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        $notif = "Gagal Upload";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "umum/show_tiket/" . $no_tiket);
    }

    function delete_berkas($id, $no_tiket, $file)
    {

        $this->m_umum->hapus('dokumen', 'id_dokumen', $id);
        unlink("./berkas/$file");
        $notif = "Berkas berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "umum/show_tiket/" . $no_tiket);
    }
    function view_dokumen_template($id_syarat)
    {

        $data = array(
            'judul' => 'Dokumen Template',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_template' => $this->pts_model->get_row_view_template($id_syarat),
        );
        $this->load->view('umum/view_dokumen_template', $data);
    }
}
