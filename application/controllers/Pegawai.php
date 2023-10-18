<?php

class Pegawai extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Asia/Makassar');
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('pegawai_model');
        $this->load->model('m_pokja');
        $this->load->model('m_admin');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi <> 5) {
            redirect(site_url('login'));
        }
    }

    function ganti_password()
    {
        $nip = $this->session->userdata('nip');
        $password = $this->input->post('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            'password' => $hash,
        );
        $this->db->where('nip', $nip);
        $update = $this->db->update('pegawai', $data);
        $notif = "Berhasil ganti password, silahkan logout lalu login kembali";
        $this->session->set_flashdata('success', $notif);
        redirect('pegawai');
    }

    function index()
    {
        $nip = $this->session->userdata('nip');
        $tahunbulan = date('Y-m');
        $d = strtotime("-1 Month");
        $tahunbulan1 =  date('Y-m', $d);
        $d = strtotime("-2 Month");
        $tahunbulan2 = date('Y-m', $d);
        $d = strtotime("-3 Month");
        $tahunbulan3 = date('Y-m', $d);
        $datamasuk = $this->pegawai_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan, $nip)->row_array();
        $datamasuk1 = $this->pegawai_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan1, $nip)->row_array();
        $datamasuk2 = $this->pegawai_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan2, $nip)->row_array();
        $datamasuk3 = $this->pegawai_model->get_dtgrafiklayanan('3h7g4h7', $tahunbulan3, $nip)->row_array();
        $datamasukttl = "[" . $datamasuk3['total'] . "," . $datamasuk2['total'] . "," . $datamasuk1['total'] . "," . $datamasuk['total'] . "]";
        $dataselesai = $this->pegawai_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan, $nip)->row_array();
        $dataselesai1 = $this->pegawai_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan1, $nip)->row_array();
        $dataselesai2 = $this->pegawai_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan2, $nip)->row_array();
        $dataselesai3 = $this->pegawai_model->get_dtgrafiklayanan('9f5s9ef', $tahunbulan3, $nip)->row_array();
        $dataselesaittl = "[" . $dataselesai3['total'] . "," . $dataselesai2['total'] . "," . $dataselesai1['total'] . "," . $dataselesai['total'] . "]";
        $datatolak = $this->pegawai_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan, $nip)->row_array();
        $datatolak1 = $this->pegawai_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan1, $nip)->row_array();
        $datatolak2 = $this->pegawai_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan2, $nip)->row_array();
        $datatolak3 = $this->pegawai_model->get_dtgrafiklayanan('6d5e4s5', $tahunbulan3, $nip)->row_array();
        $datatolakttl = "[" . $datatolak3['total'] . "," . $datatolak2['total'] . "," . $datatolak1['total'] . "," . $datatolak['total'] . "]";
        $data = array(
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'sub_menu' => '',
            'datajumlahlayanan' => $this->pegawai_model->get_datalayananstatus_db($nip),
            'databagian' => $this->m_pokja->get_bagian(),
            'datamasukttl' => $datamasukttl,
            'dataselesaittl' => $dataselesaittl,
            'datatolakttl' => $datatolakttl,
        );
        $this->template->load('pegawai/template', 'pegawai/home', $data);
    }

    function pengajuan_layanan()
    {
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_all_pengajuan_layanan' => $this->pegawai_model->get_all_pengajuan_layanan($nip),
            'action_tambah' => 'pts/action_tambah_pengajuan_layanan',

        );
        $this->template->load('pegawai/template', 'pegawai/pengajuan_layanan', $data);
    }



    function detail_pengajuan_layanan($no_tiket)
    {
        $detail_layanan = $this->pegawai_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_detail_layanan' => $this->pegawai_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pegawai_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pegawai_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pegawai_model->get_all_dokumen_respon($detail_layanan->id_layanan),
            'get_status_proses_ajuan_diperiksa' => $this->pegawai_model->get_status_proses_ajuan_diperiksa(),
            'get_status_proses_ajuan_diproses' => $this->pegawai_model->get_status_proses_ajuan_diproses(),
            'get_status_proses_ajuan_diproses_yudisium' => $this->pegawai_model->get_status_proses_ajuan_diproses_yudisium(),
            'action_proses_ajuan' => 'pegawai/action_proses_ajuan',
            'action_tambah_dokumen_respon' => 'pegawai/action_tambah_dokumen_respon',
        );
        $this->template->load('pegawai/template', 'pegawai/detail_pengajuan_layanan', $data);
    }

    function action_proses_ajuan()
    {
        $this->load->library('uuid');
        $id_riwayat = $this->uuid->v4();
        $no_tiket = $this->input->post('no_tiket');
   $id_layanan = $this->input->post('id_layanan');
   $id_status_layanan = $this->input->post('id_status_layanan');
 $detail = $this->pegawai_model->get_berkas_respon($id_layanan);
        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');
   if ($detail->num_rows() == 0 && $id_status_layanan=='9f5s9ef' ) {
            $notif = "Berkas Respon Harus di Upload Baru Bisa Klik Selesai";
            $this->session->set_flashdata('delete', $notif);
           redirect(base_url() . "pegawai/detail_pengajuan_layanan/" . $no_tiket);
        }
        else {
        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Proses Ajuan";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url() . "pegawai/detail_pengajuan_layanan/" . $no_tiket);
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
                redirect(base_url() . "pegawai/detail_pengajuan_layanan/" . $no_tiket);
            } else {
                $notif = "Gagal Proses Ajuan";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url() . "pegawai/detail_pengajuan_layanan/" . $no_tiket);
            }
        }
        }
    }

    function action_tambah_dokumen_respon()
    {
        $id_layanan = $this->input->post('id_layanan');
        $detail_layanan = $this->pegawai_model->get_row_layanan($id_layanan);
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('id_status_dokumen', 'id_status_dokumen', 'required');
        $this->form_validation->set_rules('nama_dokumen_respon', 'nama_dokumen_respon', 'required');
        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('pegawai/detail_pengajuan_layanan/' . $detail_layanan->no_tiket);
        } else {
            $tgl = date('dmy');
            $jam = date('his');

            $this->db->set('id_dokumen', 'UUID()', FALSE);
            $nama_file = $detail_layanan->no_tiket . "-" . strtoupper($this->input->post('nama_dokumen_respon', TRUE));
            $config['file_name'] = $nama_file;
            $config['upload_path'] = './assets/dokumen/berkas';
            $config['upload_url'] = base_url('/assets/dokumen/berkas');
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = false;
            $config['max_size'] = 5024;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {

                $file = $this->upload->data('file_name');
                $data = array(
                    'id_layanan' => $this->input->post('id_layanan', TRUE),
                    'id_status_dokumen' => $this->input->post('id_status_dokumen', TRUE),
                    'nama_dokumen_respon' => $this->input->post('nama_dokumen_respon', TRUE),
                    'file' => $file,
                );
                $this->db->insert('dokumen', $data);
                $notif = "Dokumen Berhasil di Upload";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url('pegawai/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
            } else {
                $notif = "Dokumen Gagal Upload Size melebihi";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url('pegawai/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
            }
        }
    }

    function hapus_dokumen_respon($id_dokumen, $no_tiket, $file)
    {
        $this->m_umum->hapus('dokumen', 'id_dokumen', $id_dokumen);
        unlink("./assets/dokumen/berkas/$file");
        $notif = "Berkas berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url('pegawai/detail_pengajuan_layanan/' . $no_tiket));
    }

    function view_dokumen_syarat($id_dokumen)
    {

        $data = array(
            'judul' => 'Dokumen Syarat',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_view_dokumen' => $this->pegawai_model->get_row_view_dokumen($id_dokumen),
        );
        $this->load->view('pegawai/view_dokumen_syarat', $data);
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
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Riwayat Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'riwayat_layanan',
            'get_all_riwayat_layanan' => $this->pegawai_model->get_all_riwayat_layanan($nip),

        );
        $this->template->load('pegawai/template', 'pegawai/riwayat_layanan', $data);
    }

    function detail_riwayat_layanan($no_tiket)
    {
        $detail_layanan = $this->pegawai_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Riwayat Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'riwayat_layanan',
            'get_row_detail_layanan' => $this->pegawai_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pegawai_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pegawai_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pegawai_model->get_all_dokumen_respon($detail_layanan->id_layanan),

        );
        $this->template->load('pegawai/template', 'pegawai/detail_riwayat_layanan', $data);
    }

    function pengajuan_layanan_konsultasi()
    {
        $nip = $this->session->userdata('nip');
        $data = array(
            'judul' => 'Pengajuan Layanan Konsultasi',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan_konsultasi',
            'get_all_pengajuan_konsultasi' => $this->pegawai_model->get_all_pengajuan_konsultasi($nip),

        );
        $this->template->load('pegawai/template', 'pegawai/pengajuan_layanan_konsultasi', $data);
    }

    function detail_pengajuan_layanan_konsultasi($no_tiket)
    {
        $detail_layanan = $this->pegawai_model->get_row_detail_layanan($no_tiket);
        $data = array(
            'judul' => 'Pengajuan Layanan',
            'menu' => 'layanan',
            'sub_menu' => 'pengajuan_layanan',
            'get_row_detail_layanan' => $this->pegawai_model->get_row_detail_layanan($no_tiket),
            'get_all_syarat_layanan' => $this->pegawai_model->get_all_syarat_layanan($detail_layanan->id_sp),
            'get_all_riwayat_tiket' => $this->pegawai_model->get_all_riwayat_tiket($detail_layanan->id_layanan),
            'get_all_dokumen_respon' => $this->pegawai_model->get_all_dokumen_respon($detail_layanan->id_layanan),
            'get_status_proses_ajuan_diperiksa' => $this->pegawai_model->get_status_proses_ajuan_diperiksa(),
            'get_status_proses_ajuan_diproses' => $this->pegawai_model->get_status_proses_ajuan_diproses(),
            'action_proses_ajuan' => 'pegawai/action_proses_ajuan_konsultasi',
            'action_tambah_dokumen_respon' => 'pegawai/action_tambah_dokumen_respon_konsultasi',
        );
        $this->template->load('pegawai/template', 'pegawai/detail_pengajuan_layanan_konsultasi', $data);
    }

    function action_proses_ajuan_konsultasi()
    {
        
        $this->load->library('uuid');
        $id_riwayat = $this->uuid->v4();
        $no_tiket = $this->input->post('no_tiket');
     
        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');

        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Proses Ajuan";
            $this->session->set_flashdata('delete', $notif);
            redirect(base_url() . "pegawai/detail_pengajuan_layanan_konsultasi/" . $no_tiket);
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
                redirect(base_url() . "pegawai/detail_pengajuan_layanan_konsultasi/" . $no_tiket);
            } else {
                $notif = "Gagal Proses Ajuan";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url() . "pegawai/detail_pengajuan_layanan_konsultasi/" . $no_tiket);
            }
        }
    }

    function action_tambah_dokumen_respon_konsultasi()
    {
        $id_layanan = $this->input->post('id_layanan');
        $detail_layanan = $this->pegawai_model->get_row_layanan($id_layanan);
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('id_status_dokumen', 'id_status_dokumen', 'required');
        $this->form_validation->set_rules('nama_dokumen_respon', 'nama_dokumen_respon', 'required');
        if ($this->form_validation->run() === FALSE) {
            $notif = "Gagal Memasukan Data";
            $this->session->set_flashdata('delete', $notif);
            redirect('pegawai/detai_pengajuan_layanan/' . $detail_layanan->no_tiket);
        } else {
            $tgl = date('dmy');
            $jam = date('his');

            $this->db->set('id_dokumen', 'UUID()', FALSE);
            $nama_file = $detail_layanan->no_tiket . "-" . strtoupper($this->input->post('nama_dokumen_respon', TRUE));
            $config['file_name'] = $nama_file;
            $config['upload_path'] = './assets/dokumen/berkas';
            $config['upload_url'] = base_url('/assets/dokumen/berkas');
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = false;
            $config['max_size'] = 5024;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {

                $file = $this->upload->data('file_name');
                $data = array(
                    'id_layanan' => $this->input->post('id_layanan', TRUE),
                    'id_status_dokumen' => $this->input->post('id_status_dokumen', TRUE),
                    'nama_dokumen_respon' => $this->input->post('nama_dokumen_respon', TRUE),
                    'file' => $file,
                );
                $this->db->insert('dokumen', $data);
                $notif = "Dokumen Berhasil di Upload";
                $this->session->set_flashdata('success', $notif);
                redirect(base_url('pegawai/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
            } else {
                $notif = "Dokumen Gagal Upload Size melebihi";
                $this->session->set_flashdata('delete', $notif);
                redirect(base_url('pegawai/detail_pengajuan_layanan/' . $detail_layanan->no_tiket));
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
