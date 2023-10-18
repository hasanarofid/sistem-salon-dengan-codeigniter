<?php

class Pts extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Makassar');
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('pts_model');
        $this->load->model('m_pokja');
        $kode_pt = $this->session->userdata('kode_pt');
        if ($kode_pt == NULL) {
            redirect(site_url('login/auth_pts'));
        }
    }
     function kirim_saran()
    {
$kode_pt = $this->session->userdata('kode_pt');
        $this->db->set('id_pengaduan', 'UUID()', FALSE);
          $this->db->set('kode_pt',$kode_pt);
        $this->form_validation->set_rules('pengaduan', 'pengaduan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('pts');
        else {

            $this->m_umum->set_data("pengaduan");
            $notif = "Data berhasil dikirim";
            $this->session->set_flashdata('success', $notif);
            redirect('pts');
        }
    }
    function ganti_password()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        $password = $this->input->post('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('kode_pt', $kode_pt);
        $update = $this->db->update('pengguna_pt', $data);
        $notif = "Berhasil ganti password, silahkan logout lalu login kembali";
        $this->session->set_flashdata('success', $notif);
        redirect('pts');
    }

    function index()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        $tahunbulan = date('Y-m');
        $d = strtotime("-1 Month");
        $tahunbulan1 =  date('Y-m', $d);
        $d = strtotime("-2 Month");
        $tahunbulan2 = date('Y-m', $d);
        $d = strtotime("-3 Month");
        $tahunbulan3 = date('Y-m', $d);
        $datamasuk = $this->pts_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan, $kode_pt)->row_array();
        $datamasuk1 = $this->pts_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan1, $kode_pt)->row_array();
        $datamasuk2 = $this->pts_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan2, $kode_pt)->row_array();
        $datamasuk3 = $this->pts_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan3, $kode_pt)->row_array();
        $datamasukttl = "[" . $datamasuk3['total'] . "," . $datamasuk2['total'] . "," . $datamasuk1['total'] . "," . $datamasuk['total'] . "]";
        $dataselesai = $this->pts_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan, $kode_pt)->row_array();
        $dataselesai1 = $this->pts_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan1, $kode_pt)->row_array();
        $dataselesai2 = $this->pts_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan2, $kode_pt)->row_array();
        $dataselesai3 = $this->pts_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan3, $kode_pt)->row_array();
        $dataselesaittl = "[" . $dataselesai3['total'] . "," . $dataselesai2['total'] . "," . $dataselesai1['total'] . "," . $dataselesai['total'] . "]";
        $datatolak = $this->pts_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan, $kode_pt)->row_array();
        $datatolak1 = $this->pts_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan1, $kode_pt)->row_array();
        $datatolak2 = $this->pts_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan2, $kode_pt)->row_array();
        $datatolak3 = $this->pts_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan3, $kode_pt)->row_array();
        $datatolakttl = "[" . $datatolak3['total'] . "," . $datatolak2['total'] . "," . $datatolak1['total'] . "," . $datatolak['total'] . "]";

        $data = array(
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'sub_menu' => '',
            'kode_pt' => $kode_pt,
            'datajumlahlayanan' => $this->pts_model->get_datalayananstatus_db($kode_pt),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,
        );
        $this->template->load('pts/template', 'pts/home', $data);
    }

    function pengajuan_layanan()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        $jenis_pt = $this->session->userdata('jenis_pt');
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_all_pengajuan_layanan' => $this->pts_model->get_all_pengajuan_layanan($kode_pt),
            'action_tambah' => 'pts/action_tambah_pengajuan_layanan',
            'get_all_layanan_pts' => $this->pts_model->get_all_layanan_pts($jenis_pt)
        );
        $this->template->load('pts/template', 'pts/pengajuan_layanan', $data);
    }

    function action_tambah_pengajuan_layanan()
    {
        $this->load->library('uuid');
        $kode_unik = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

        $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        $jam = date('h');
        $menitdetik = date('is');
        $id_layanan = $this->uuid->v4();
        $no_tiket = 'TK-' . $tgl . $jam . $kode_unik . $thn . $menitdetik . $bln;
        $id_riwayat = $this->uuid->v4();
        $kode_pt = $this->session->userdata('kode_pt');
       
        $this->form_validation->set_rules('id_sp', 'id_sp', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('pts/pengajuan_layanan');
        } else {
            $data_layanan = array(
                'id_layanan' => $id_layanan,
                'no_tiket' => $no_tiket,
                'id_sp' => $this->input->post('id_sp'),
                'kode_pt' => $kode_pt,
                'id_pengguna_pt' => $this->session->userdata('id_pengguna_pt'),
                'id_status_layanan' => '1f7e6gj',
                'ket' => $this->input->post('ket', TRUE),
            );

            if ($this->db->insert('layanan', $data_layanan)) {
                $data_riwayat = array(
                    'id_riwayat' => $id_riwayat,
                    'id_layanan' => $id_layanan,
                    'id_status_layanan' => '1f7e6gj',
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Layanan Berhasil di Buat";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url() . "pts/detail_pengajuan_layanan/" . $no_tiket);
            } else {
                $notif = "Gagal Memasukan Data";
                $this->session->set_flashdata('delete', $notif);
                redirect('pts/pengajuan_layanan');
            }
        }
    }

    function detail_pengajuan_layanan($no_tiket)
    {
        $detail_layanan = $this->pts_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_detail_layanan' => $this->pts_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pts_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pts_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pts_model->get_all_dokumen_respon($detail_layanan->id_layanan),
            'action_tambah_dokumen' => 'pts/action_tambah_dokumen',
            'action_kirim_ajuan' => 'pts/action_kirim_ajuan',
        );
        $this->template->load('pts/template', 'pts/detail_pengajuan_layanan', $data);
    }

    function action_kirim_ajuan()
    {
        $this->load->library('uuid');
        $id_riwayat = $this->uuid->v4();
        $no_tiket = $this->input->post('no_tiket');

        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url() . "pts/detail_pengajuan_layanan/" . $no_tiket);
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
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Layanan Berhasil di Ajukan";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url() . "pts/detail_pengajuan_layanan/" . $no_tiket);
            } else {
                $notif = "Gagal Kirim Ajuan";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url() . "pts/detail_pengajuan_layanan/" . $no_tiket);
            }
        }
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
                $config['allowed_types'] = 'pdf|xls|xlsx';
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
                    redirect(base_url('pts/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
                } else {
                    $notif = "Dokumen Gagal di Update";
                    $this->session->set_flashdata('delete', $notif);
                    redirect(base_url('pts/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
                }
            } else {
                $this->db->set('id_dokumen', 'UUID()', FALSE);
                $nama_file = $detail_layanan->no_tiket . "-" . $inisial->inisial;
                $config['file_name'] = $nama_file;
                $config['upload_path'] = './assets/dokumen/berkas';
                $config['upload_url'] = base_url('/assets/dokumen/berkas');
                $config['allowed_types'] = 'pdf|xls|xlsx';
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
                    redirect(base_url('pts/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
                } else {
                    $notif = "Dokumen Gagal Upload Size melebihi";
                    $this->session->set_flashdata('delete', $notif);
                    redirect(base_url('pts/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
                }
            }
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



    public function hapus_pengajuan_layanan($id_layanan)
    {
        if ($this->m_umum->hapus_data('layanan', 'id_layanan', $id_layanan)) {
            $notif = "Pengajuan Berhasil di hapus";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url('pts/pengajuan_layanan'));
        } else {
            $notif = "Pengajuan Gagal dihapus";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url('pts/pengajuan_layanan'));
        }
    }

    function riwayat_layanan()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        $data = array(
            'judul' => 'Riwayat Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'riwayat_layanan',
            'get_all_riwayat_layanan' => $this->pts_model->get_all_riwayat_layanan($kode_pt),

        );
        $this->template->load('pts/template', 'pts/riwayat_layanan', $data);
    }

    function detail_riwayat_layanan($no_tiket)
    {
        $detail_layanan = $this->pts_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Riwayat Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'riwayat_layanan',
            'get_row_detail_layanan' => $this->pts_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pts_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pts_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pts_model->get_all_dokumen_respon($detail_layanan->id_layanan),
            'action_tambah_dokumen' => 'pts/action_tambah_dokumen',
            'action_kirim_ajuan' => 'pts/action_kirim_ajuan',
        );
        $this->template->load('pts/template', 'pts/detail_riwayat_layanan', $data);
    }

    function pengajuan_layanan_konsultasi()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        $data = array(
            'judul' => 'Pengajuan Layanan Konsultasi',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan_konsultasi',
            'get_all_pengajuan_layanan_konsultasi' => $this->pts_model->get_all_pengajuan_layanan_konsultasi($kode_pt),
            'action_tambah' => 'pts/action_tambah_pengajuan_layanan_konsultasi',

        );
        $this->template->load('pts/template', 'pts/pengajuan_layanan_konsultasi', $data);
    }

    function action_tambah_pengajuan_layanan_konsultasi()
    {
        $this->load->library('uuid');
        $kode_unik = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

        $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        $jam = date('h');
        $menitdetik = date('is');
        $id_layanan = $this->uuid->v4();
        $no_tiket = 'TK-' . $tgl . $jam . $kode_unik . $thn . $menitdetik . $bln;
        $id_riwayat = $this->uuid->v4();
        $kode_pt = $this->session->userdata('kode_pt');
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('pts/pengajuan_layanan_konsultasi');
        } else {
            $data_layanan = array(
                'id_layanan' => $id_layanan,
                'no_tiket' => $no_tiket,
                'id_sp' => '9f73eab8-21e1-11ee-8d5f-c0185002a09f',
                'kode_pt' => $kode_pt,
                'id_pengguna_pt' => $this->session->userdata('id_pengguna_pt'),
                'id_status_layanan' => '1f7e6gj',
                'ket' => $this->input->post('ket', TRUE),
            );

            if ($this->db->insert('layanan', $data_layanan)) {
                $data_riwayat = array(
                    'id_riwayat' => $id_riwayat,
                    'id_layanan' => $id_layanan,
                    'id_status_layanan' => '1f7e6gj',
                    'tgl_riwayat' => date("Y-m-d H:i:s"),
                );

                $this->db->insert('riwayat_tiket', $data_riwayat);
                $notif = "Layanan Berhasil di Buat";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url() . "pts/detail_pengajuan_layanan_konsultasi/" . $no_tiket);
            } else {
                $notif = "Gagal Memasukan Data";
                $this->session->set_flashdata('delete', $notif);
                redirect('pts/pengajuan_layanan_konsultasi');
            }
        }
    }

    function detail_pengajuan_layanan_konsultasi($no_tiket)
    {
        $detail_layanan = $this->pts_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_detail_layanan' => $this->pts_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pts_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pts_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pts_model->get_all_dokumen_respon($detail_layanan->id_layanan),
            'action_tambah_dokumen' => 'pts/action_tambah_dokumen',
            'action_kirim_ajuan' => 'pts/action_kirim_ajuan',
        );
        $this->template->load('pts/template', 'pts/detail_pengajuan_layanan', $data);
    }

    function view_dokumen_template($id_syarat)
    {

        $data = array(
            'judul' => 'Dokumen Template',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_template' => $this->pts_model->get_row_view_template($id_syarat),
        );
        $this->load->view('pts/view_dokumen_template', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login/auth_pts'));
    }
}
