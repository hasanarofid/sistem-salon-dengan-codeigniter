<?php

class Kabagum extends CI_Controller
{

    function __construct()
    {
         date_default_timezone_set('Asia/Makassar');
        parent::__construct();
        $this->load->database();
        $this->load->model('m_pokja');
        $this->load->model('m_admin');
        $this->load->model('pts_model');
        $id_aplikasi = $this->session->userdata('id_aplikasi');

        if ($id_aplikasi <> 4) {
            redirect(site_url('login'));
        }
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
            'judul' => 'Dashboard Pinandu LLDIKTI XI',
            'datajumlahlayanan' => $this->m_pokja->get_datalayananstatus_db(),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,
        );
        $this->template->load('kabagum/template', 'kabagum/home', $data);
    }
    function dashboard()
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
            'judul' => 'Dashboard Pinandu Kabag Umum',
            'datajumlahlayananhkt' => $this->m_pokja->get_datalayananstatusbagian_db('5ydretwe'),
            'datajumlahlayanantu' => $this->m_pokja->get_datalayananstatusbagian_db('lowsr3Z4'),
            'datajumlahlayanankeu' => $this->m_pokja->get_datalayananstatusbagian_db('6ujrtfh5'),
            'datajumlahlayanan' => $this->m_pokja->get_datalayananstatus_db(),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,

        );
        $this->template->load('kabagum/template', 'kabagum/homekabagum', $data);
    }

    function layanan()
    {

        $data = array(
            'judul' => 'Layanan LLDIKTI XI',
            'data_layanan' => $this->m_pokja->get_layanan(),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_layanan', $data);
    }

    function layanankabagum()
    {
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Layanan Pokja Kabag Umum',
            'data_layanan' => $this->m_pokja->get_layanankabagum($nip),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_layanankabagum', $data);
    }

    function ajuan()
    {
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Layanan Ajuan Baru',
            'nip' => $nip,
            'data_layanan' => $this->m_pokja->get_layanan_kabagumum($nip),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_ajuanlayanan', $data);
    }

    function kembali()
    {
        $nip = $this->session->userdata('nip');
        $status = "7d9aj39";
        $data = array(
            'nip' => $nip,
            'judul' => 'Layanan Dikembalikan',
            'data_layanan' => $this->m_pokja->get_layanan_daftar($nip, $status),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_ajuanlayanan', $data);
    }

    function periksa()
    {
        $nip = $this->session->userdata('nip');
        $status = "3f9j9h7s";
        $data = array(
            'nip' => $nip,
            'judul' => 'Layanan Diperiksa',
            'data_layanan' => $this->m_pokja->get_layanan_daftar($nip, $status),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_ajuanlayanan', $data);
    }

    function proses()
    {
        $nip = $this->session->userdata('nip');
        $status = "4f4s8rs";
        $data = array(
            'nip' => $nip,
            'judul' => 'Layanan Diproses',
            'data_layanan' => $this->m_pokja->get_layanan_daftar($nip, $status),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_ajuanlayanan', $data);
    }

    function selesai()
    {
        $nip = $this->session->userdata('nip');
        $status = "9f5s9ef";
        $data = array(
            'nip' => $nip,
            'judul' => 'Layanan Selesai',
            'data_layanan' => $this->m_pokja->get_layanan_daftar($nip, $status),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_ajuanlayanan', $data);
    }

    function tolak()
    {
        $nip = $this->session->userdata('nip');
        $status = "6d5e4s5";
        $data = array(
            'nip' => $nip,
            'judul' => 'Layanan Ditolak',
            'data_layanan' => $this->m_pokja->get_layanan_daftar($nip, $status),
        );
        $this->template->load('kabagum/template', 'kabagum/daftar_layanan', $data);
    }

    function detail($id_layanan = FALSE)
    {
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_layanan' => $this->m_pokja->get_detail_layanan($id_layanan),
            'data_syarat' => $this->m_pokja->get_syarat_sp_ajuan($id_layanan),
            'data_riwayat' => $this->m_pokja->get_riwayat_layanan($id_layanan),
            'data_dok'  => $this->m_pokja->get_dok($id_layanan),
            'data_dok_respon' => $this->m_pokja->get_dokrespon($id_layanan)->result(),
        );
        $this->template->load('kabagum/template', 'kabagum/detail_layanan2', $data);
    }

    function detailajuan($id_layanan = FALSE)
    {
        $detail_layanan = $this->m_pokja->get_row_detail_layanan($id_layanan);
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'get_row_detail_layanan' => $this->m_pokja->get_row_detail_layanan($id_layanan),
            'get_all_syarat_layanan' => $this->m_pokja->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->m_pokja->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->m_pokja->get_all_dokumen_respon($detail_layanan->id_layanan),
            'get_status_proses_ajuan' => $this->m_pokja->get_status_proses_ajuan(),
            'get_pegawai_per_bagian' => $this->m_pokja->get_pegawai_per_bagian($detail_layanan->id_bagian),
            'action_teruskan_ajuan' => "kabagum/action_teruskan_ajuan",
        );
        $this->template->load('kabagum/template', 'kabagum/detail_ajuanlayanan2', $data);
    }

    function action_teruskan_ajuan()
    {
        $this->load->library('uuid');
        $id_riwayat = $this->uuid->v4();
        $id_layanan = $this->input->post('id_layanan');

        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Proses Ajuan";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url() . "kabagum/detailajuan/" . $id_layanan);
        } else {
            $data_layanan = array(
                'id_layanan' => $this->input->post('id_layanan'),
                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_status_layanan' => $this->input->post('id_status_layanan', TRUE),
            );
            $this->db->where('id_layanan', $this->input->post('id_layanan'));
            $update = $this->db->update('layanan', $data_layanan);
            if ($update) {
                $data_riwayat = array(
                    'id_riwayat' => $id_riwayat,
                    'id_layanan' => $this->input->post('id_layanan'),
                    'id_status_layanan' => $this->input->post('id_status_layanan', TRUE),
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Layanan Berhasil di Proses";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url() . "kabagum/detailajuan/" . $id_layanan);
            } else {
                $notif = "Gagal Proses Ajuan";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url() . "kabagum/detailajuan/" . $id_layanan);
            }
        }
    }

    function detailajuan2($id_layanan = FALSE)
    {
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_layanan' => $this->m_pokja->get_detail_layanan($id_layanan),
            'data_pegawai' => $this->m_pokja->get_pegawai_bagian($id_layanan),
            'data_syarat' => $this->m_pokja->get_syarat_sp_ajuan($id_layanan),
            'data_riwayat' => $this->m_pokja->get_riwayat_layanan($id_layanan),
            'data_dok'  => $this->m_pokja->get_dok($id_layanan),
            'data_dok_respon' => $this->m_pokja->get_dokrespon($id_layanan)->result(),
        );
        $this->template->load('kabagum/template', 'kabagum/detail_ajuanlayanan2', $data);
    }

    function update_ajuanlayanan()
    {

        $this->load->library('uuid');
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $id_layanan = $this->input->post('id_layanan');
        if ($this->form_validation->run() === FALSE)
            redirect('kabagum/detailajuan/' . $id_layanan);
        else {
            $data = [

                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_status_layanan' => $this->input->post('id_status_layanan'),
            ];
            $where = [
                'id_layanan' => $id_layanan
            ];
            $this->m_pokja->update_data('layanan', $data, $where);
            $id_riwayat = $this->uuid->v4();
            $data1 = [
                'id_riwayat' => $id_riwayat,
                'id_layanan' => $id_layanan,
                'id_status_layanan' => $this->input->post('id_status_layanan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->m_pokja->add_data('riwayat_tiket', $data1);

            redirect('kabagum/detail/' . $id_layanan);
        }
    }

    function update_periksalayanan()
    {

        $tgl = date('dmy');
        $jam = date('his');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $id_layanan = $this->input->post('id_layanan');
        if ($this->form_validation->run() === FALSE)
            redirect('kabagum/detailajuan/' . $id_layanan);
        else {
            $data = [
                'id_status_layanan' => $this->input->post('status_layanan'),
            ];
            $where = [
                'id_layanan' => $id_layanan
            ];
            $this->m_pokja->update_data('layanan', $data, $where);
            $id_riwayat = $id_layanan . $tgl . $jam;
            $data1 = [
                'id_riwayat' => $id_riwayat,
                'id_layanan' => $id_layanan,
                'id_status_layanan' => $this->input->post('status_layanan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->m_pokja->add_data('riwayat_tiket', $data1);
            $status = $this->input->post('status_layanan');
            if ($status == '4f4s8rs') {
                $notif = "Layanan Diproses";
                $this->session->set_flashdata('success', $notif);
            } elseif ($status == '7d9aj39') {
                $notif = "Layanan Dikembalikan";
                $this->session->set_flashdata('warning', $notif);
            } elseif ($status == '6d5e4s5') {
                $notif = "Layanan Ditolak";
                $this->session->set_flashdata('danger', $notif);
            }
            redirect('kabagum/detailajuan/' . $id_layanan);
        }
    }

    function update_responlayanan()
    {

        $tgl = date('dmy');
        $jam = date('his');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $id_layanan = $this->input->post('id_layanan');
        if ($this->form_validation->run() === FALSE)
            redirect('kabagum/detailajuan/' . $id_layanan);
        else {
            $this->db->set('id_dokumen', 'UUID()', false);
            $file = $this->uploadBerkas();
            $datadok = [
                'id_layanan' => $id_layanan,
                'id_syarat' => '-',
                'id_status_dokumen' => 'c2713cfb-f2ee-11ed-9a98-c454445434d3',
                'file' => $file
            ];
            $this->m_pokja->add_data('dokumen', $datadok);

            $data = [
                'id_status_layanan' => $this->input->post('status_layanan'),
            ];
            $where = [
                'id_layanan' => $id_layanan
            ];
            $this->m_pokja->update_data('layanan', $data, $where);

            $id_riwayat = $id_layanan . $tgl . $jam;
            $data1 = [
                'id_riwayat' => $id_riwayat,
                'id_layanan' => $id_layanan,
                'id_status_layanan' => $this->input->post('status_layanan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->m_pokja->add_data('riwayat_tiket', $data1);
            $notif = "Layanan Selesai";
            $this->session->set_flashdata('success', $notif);
            redirect('kabagum/detailajuan/' . $id_layanan);
        }
    }
    public function uploadBerkas()
    {
        $config['upload_path']          = 'berkas';
        $config['allowed_types']        = 'pdf';
        $config['overwrite']            = false;
        $config['max_size']             = 2000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;
    }

    public function sp()
    {
        $data = array(
            'judul' => 'Standar Pelayanan',
            'dt_sp' => $this->m_admin->get_sp(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),
        );
        $this->template->load('kabagum/template', 'kabagum/sp', $data);
    }
      public function kritiksaran()
    {
        $data = array(
            'judul' => 'Kritik,Saran dan Masukan',
            'dt_pengaduan' => $this->m_pokja->get_pengaduan(),
        );
        $this->template->load('kabagum/template', 'kabagum/pengaduan', $data);
    }

    public function detail_sp($id_sp = FALSE)
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'id_sp' => $id_sp,
            'd' => $this->m_admin->update_sp($id_sp),
            'dt_detail_sp' => $this->m_admin->get_detail_sp($id_sp),
            'dt_syarat' => $this->m_umum->get_data('syarat'),
        );
        $this->template->load('kabagum/template', 'kabagum/detail_sp', $data);
    }

    function view_dokumen_syarat($id_dokumen)
    {

        $data = array(
            'judul' => 'Dokumen Syarat',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_dokumen' => $this->m_pokja->get_row_view_dokumen($id_dokumen),
        );
        $this->load->view('kabagum/view_dokumen_syarat', $data);
    }

    function pengajuan_layanan_konsultasi()
    {
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Pengajuan Layanan Konsultasi',
            'nip' => $nip,
            'get_all_pengajuan_layanan_konsultasi' => $this->m_pokja->get_all_pengajuan_layanan_konsultasi()
            
        );
        $this->template->load('kabagum/template', 'kabagum/pengajuan_layanan_konsultasi', $data);
    }

    function detail_pengajuan_layanan_konsultasi($id_layanan = FALSE)
    {
        $detail_layanan = $this->m_pokja->get_row_detail_layanan($id_layanan);
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'get_row_detail_layanan' => $this->m_pokja->get_row_detail_layanan($id_layanan),
            'get_all_syarat_layanan' => $this->m_pokja->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->m_pokja->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->m_pokja->get_all_dokumen_respon($detail_layanan->id_layanan),
            'get_status_proses_ajuan' => $this->m_pokja->get_status_proses_ajuan(),
            'get_pegawai' => $this->m_pokja->get_pegawai(),
            'action_teruskan_ajuan' => "kabagum/action_teruskan_ajuan",
            'action_tolak_ajuan' => 'kabagum/action_tolak_ajuan',
        );
        $this->template->load('kabagum/template', 'kabagum/detail_pengajuan_layanan_konsultasi', $data);
    }

    function action_tolak_ajuan()
    {
        $this->load->library('uuid');
        $id_riwayat = $this->uuid->v4();
        $no_tiket = $this->input->post('no_tiket');
        $id_layanan = $this->input->post('id_layanan');

        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Proses Ajuan";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url() . "kabagum/detail_pengajuan_layanan_konsultasi/" . $id_layanan);
        } else {
            $data_layanan = array(
                'id_layanan' => $this->input->post('id_layanan'),
                'no_tiket' => $this->input->post('no_tiket'),
                'id_status_layanan' => $this->input->post('id_status_layanan', TRUE),
            );
            $this->db->where('id_layanan', $this->input->post('id_layanan'));
            $update = $this->db->update('layanan', $data_layanan);
            if ($update) {
                $data_riwayat = array(
                    'id_riwayat' => $id_riwayat,
                    'id_layanan' => $this->input->post('id_layanan'),
                    'id_status_layanan' => $this->input->post('id_status_layanan', TRUE),
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                    'catatan' => $this->input->post('catatan', TRUE),
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Layanan Berhasil di Proses";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url() . "kabagum/detail_pengajuan_layanan_konsultasi/" . $id_layanan);
            } else {
                $notif = "Gagal Proses Ajuan";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url() . "kabagum/detail_pengajuan_layanan_konsultasi/" . $id_layanan);
            }
        }
    }
}
