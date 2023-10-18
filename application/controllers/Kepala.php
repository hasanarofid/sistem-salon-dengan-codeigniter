<?php

class Kepala extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_pokja');
        $this->load->model('m_admin');
        $this->load->model('pts_model');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi <> 3) {
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
            'judul' => 'Dashboard Pinandu',
            'datajumlahlayanan' => $this->m_pokja->get_datalayananstatus_db(),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,
        );
        $this->template->load('kepala/template', 'kepala/home', $data);
    }

    function layanan()
    {
        $data = array(
            'judul' => 'Layanan',
            'data_layanan' => $this->m_pokja->get_layanan(),
        );
        $this->template->load('kepala/template', 'kepala/daftar_layanan', $data);
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
        $this->template->load('kepala/template', 'kepala/detail_layanan2', $data);
    }

    function detail2($id_layanan = FALSE)
    {
        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_layanan' => $this->m_pokja->get_detail_layanan($id_layanan),
            'data_syarat' => $this->m_pokja->get_syarat_sp_ajuan($id_layanan),
            'data_riwayat' => $this->m_pokja->get_riwayat_layanan($id_layanan),
            'data_dok'  => $this->m_pokja->get_dok($id_layanan),
            'data_dok_respon' => $this->m_pokja->get_dokrespon($id_layanan)->result(),
        );
        $this->template->load('kepala/template', 'kepala/detail_layanan2', $data);
    }

    public function sp()
    {

        $data = array(
            'judul' => 'Standar Pelayanan',
            'dt_sp' => $this->m_admin->get_sp(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),
        );
        $this->template->load('kepala/template', 'kepala/sp', $data);
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
        $this->template->load('kepala/template', 'kepala/detail_sp', $data);
    }
}
