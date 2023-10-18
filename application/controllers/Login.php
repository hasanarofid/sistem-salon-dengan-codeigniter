<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('M_umum');
    }
    public function index()
    {
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi == 1) {
            redirect(site_url('admin'));
        }
        if ($id_aplikasi == 2) {
            redirect(site_url('pokja'));
        }
        if ($id_aplikasi == 3) {
            redirect(site_url('kepala'));
        }
        if ($id_aplikasi == 4) {
            redirect(site_url('kabagum'));
        }
        if ($id_aplikasi == 5) {
            redirect(site_url('pegawai'));
        } else {
            $data = array(
                'dt_aplikasi' => $this->Login_model->get_aplikasi(),
                'judul' => 'LOGIN',
                'menu' => 'login',
                'sub_menu' => '',
                'action' => 'login/auth_action',
            );
          $this->template->load('login/template', 'login/login', $data);
        }
    }

    public function auth_action()
    {
        $nip = htmlspecialchars($this->input->post('nip', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $aplikasi = htmlspecialchars($this->input->post('aplikasi', TRUE), ENT_QUOTES);
        $cek_login = $this->Login_model->auth($nip, $aplikasi);
        // print_r($cek_login);
        if ($cek_login) {
            if (password_verify($password, $cek_login->password)) {
                if ($cek_login->id_aplikasi == 1) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    redirect('admin');
                }
                if ($cek_login->id_aplikasi == 2) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('nip', $cek_login->nip);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('pokja');
                }
                if ($cek_login->id_aplikasi == 3) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('nip', $cek_login->nip);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('kepala');
                }
                if ($cek_login->id_aplikasi == 4) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('nip', $cek_login->nip);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('kabagum');
                }
                if ($cek_login->id_aplikasi == 5) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('nip', $cek_login->nip);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    $this->session->set_userdata('nama_pegawai', $cek_login->nama_pegawai);
                    redirect('pegawai');
                } else {
                    $notif = "Gagal";
                    $this->session->set_flashdata('delete', $notif);

                    redirect('login');
                }
            } else {
                $notif = "username/Password Salah";
                $this->session->set_flashdata('delete', $notif);

                redirect('login');
            }
        } else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);

            redirect('login');
        }
    }
    public function uploadST()
    {
        $config['upload_path'] = 'assets/dokumen/surat_tugas';
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 3000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('surat_tugas')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;

    }

     function register()
    {
        $this->db->set('id_pengguna_pt', 'UUID()', FALSE);
        $kode_pt = $this->input->post('kode_pt');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $surat_tugas = $this->uploadST();
        $data = array(
            'kode_pt' => $kode_pt,
            'email' => $email,
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'no_hp' => $no_hp,
            'username' => $username,
            'password' => $hash,
            'password_temporary' => $password,
            'surat_tugas' => $surat_tugas,
        );

        $this->m_umum->input_data($data, 'pengguna_pt');
        $notif = "Register berhasil, tunggu validasi akun 1x24 jam";
        $this->session->set_flashdata('success', $notif);
        redirect('login/auth_pts');

    }

    public function auth_pts()
    {
        $kode_pt = $this->session->userdata('kode_pt');
        if ($kode_pt != NULL) {
            redirect(site_url('pts'));
        } else {
            $data = array(
                'judul' => 'Login PT',
                'dt_pt' => $this->Login_model->get_pt(),
                'menu' => 'login',
                'sub_menu' => '',
                'action' => 'login/auth_pts_action',
            );
           $this->template->load('login/template', 'login/login_pts', $data);
        }
    }

    public function auth_pts_action()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_login = $this->Login_model->auth_pts($username);
        if ($cek_login) {

            if (password_verify($password, $cek_login->password)) {
                $this->session->set_userdata('kode_pt', $cek_login->kode_pt);
                $this->session->set_userdata('nama_pt', $cek_login->nama_pt);
                $this->session->set_userdata('id_pengguna_pt', $cek_login->id_pengguna_pt);
                $this->session->set_userdata('jenis_pt', $cek_login->jenis_pt);
                redirect('pts');
            } else {
                $notif = "Password Salah";
                $this->session->set_flashdata('delete', $notif);

                redirect('login/auth_pts');
            }
        } else {
            $notif = "Akun Tidak Terdaftar";
            $this->session->set_flashdata('delete', $notif);

            redirect('login/auth_pts');
        }
    }
     public function reset_password()
    {
       $kode_unik = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        $email = $this->input->post('email');
        $pass_baru = $this->input->post('pass_baru');
        $query=$this->db->query("Select * from pengguna_pt where 
        email= '$email'");
        foreach ($query->result() as $row) {
        $email=$row->email;
        $username=$row->username;
        }
        $sql = "update pengguna_pt set kode_confirm='$kode_unik' where email='$email' ";
        $this->db->query($sql);
       //sesuaikan name dengan di form nya ya 
   
      
       $this->db->select('*');
       $this->db->from('pengguna_pt');
       $this->db->where('email= "'.$email.'"');
       
   $query = $this->db->get();
   if($query->num_rows()==0)
   {
    $notif = "Email Tidak Terdaftar";
            $this->session->set_flashdata('delete', $notif);

            redirect('login/auth_pts');
   }
else
{
   
  ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $from = "admin@pinandu.lldikti11.or.id";
            $to = $email;
            $subject = "Reset Password";
            $message = "Username anda:$username dan Password baru anda: $pass_baru silahkan konfirmasi dengan mengklik tautan https://pinandu.lldikti11.or.id/login/confirm_password/$pass_baru/$email/$kode_unik";
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
             redirect('login/auth_pts');
}
}

  function confirm_password($pass_baru,$email,$kode){
     $hash = password_hash($pass_baru, PASSWORD_DEFAULT);
           $sql = "update pengguna_pt set password='$hash' where email='$email' and kode_confirm='$kode' ";
        $this->db->query($sql);
        $sqll = "update pengguna_pt set kode_confirm='' where email='$email'";
        $this->db->query($sqll);
         $notif = " Password berhasil di reset silahkan login";
            $this->session->set_flashdata('success', $notif);
        redirect('login/auth_pts');
    }
      



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
