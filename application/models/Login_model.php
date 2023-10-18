<?php

class Login_model extends CI_Model
{

	function auth($nip, $aplikasi)
	{
		$this->db->select('pengguna.id_aplikasi,pegawai.nip,pegawai.password,pengguna.id_role,bagian.id_bagian,pegawai.id_bagian_pegawai,pegawai.nama_pegawai,pegawai.id_pegawai');
		$this->db->from('pengguna');
		$this->db->join('aplikasi', 'aplikasi.id_aplikasi = pengguna.id_aplikasi');
		$this->db->join('pegawai', 'pegawai.id_pegawai = pengguna.id_pegawai');
		$this->db->join('bagian', 'bagian.id_bagian = pegawai.id_bagian_pegawai', 'left');
		$this->db->where('pegawai.nip', $nip);
		$this->db->where('aplikasi.id_aplikasi', $aplikasi);
		$this->db->limit(1);
		$query = $this->db->get()->row();
		return $query;
	}
	function get_aplikasi()
	{
		$this->db->select('*');
		$this->db->from('aplikasi a');
		$this->db->order_by('a.id_aplikasi desc');
		$query = $this->db->get();
		return $query->result();
	}
		function get_pt()
	{
		$this->db->select('*');
		$this->db->from('pts');
		$this->db->where('status_pt', 'A');
		$query = $this->db->get();
		return $query->result();
	}

	function auth_pts($username)
	{
		$this->db->select('*');
		$this->db->from('pengguna_pt a');
			$this->db->join('pts b', 'a.kode_pt=b.kode_pt', 'left');
		$this->db->where('a.username', $username);
		$this->db->where('a.status',1);
		$this->db->where('b.status_pt', 'A');
		$this->db->limit(1);
		$query = $this->db->get()->row();
		return $query;
	}
}
