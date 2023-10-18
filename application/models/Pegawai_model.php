<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
     function get_berkas_respon($id_layanan)
    		 {
	 	$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('id_layanan',$id_layanan);
			$this->db->where('id_status_dokumen',"c2713cfb-f2ee-11ed-9a98-c454445434d3");
			 return $this->db->get();
	 
		 
}

	function get_all_pengajuan_layanan($id_pegawai)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where("pegawai.nip = ".$id_pegawai." and sp.id_sp != '9f73eab8-21e1-11ee-8d5f-c0185002a09f' and (status_layanan.id_status_layanan = '3f9j9h7s' OR status_layanan.id_status_layanan = '4f4s8rs' or status_layanan.id_status_layanan = '7d9aj39')");
		
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_riwayat_layanan($id_pegawai)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where("pegawai.nip = ".$id_pegawai." and (status_layanan.id_status_layanan = '9f5s9ef' OR status_layanan.id_status_layanan = '6d5e4s5')");
		$query = $this->db->get();
		return $query->result();
	}

	function get_row_detail_layanan($no_tiket)
	{
		$this->db->select('*, layanan.no_hp as no_hp_umum , pengguna_pt.no_hp as no_hp_operator');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
        $this->db->join('pengguna_pt', 'pengguna_pt.id_pengguna_pt = layanan.id_pengguna_pt', 'left');
		$this->db->where('layanan.no_tiket', $no_tiket);
		$query = $this->db->get();
		return $query->row();
	}

	function get_row_layanan($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('layanan.id_layanan', $id_layanan);
		$query = $this->db->get();
		return $query->row();
	}

	function get_all_syarat_layanan($id_sp)
	{
		$this->db->select('*');
		$this->db->from('detail_sp');
		$this->db->join('sp', 'detail_sp.id_sp=sp.id_sp', 'left');
		$this->db->join('syarat', 'detail_sp.id_syarat=syarat.id_syarat', 'left');
		$this->db->where('sp.id_sp', $id_sp);
		$this->db->where('detail_sp.status_detail_sp', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_row_dokumen($id_layanan, $id_syarat)
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_syarat', $id_syarat);
		$query = $this->db->get();
		return $query->row();
	}

	function get_row_dokumen_cek($id_layanan, $id_syarat)
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_syarat', $id_syarat);
		$query = $this->db->get();
		return $query;
	}

	function get_row_view_dokumen($id_dokumen)
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('id_dokumen', $id_dokumen);
		$query = $this->db->get();
		return $query->row();
	}

	function get_all_riwayat_tiket($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('riwayat_tiket');
		$this->db->join('layanan', 'riwayat_tiket.id_layanan=layanan.id_layanan', 'left');
		$this->db->join('status_layanan', 'riwayat_tiket.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->where('layanan.id_layanan', $id_layanan);
		$this->db->order_by('tgl_riwayat', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_dokumen_respon($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('dokumen');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_status_dokumen', 'c2713cfb-f2ee-11ed-9a98-c454445434d3');
		$query = $this->db->get();
		return $query->result();
	}

	function get_row_syarat($id_syarat)
	{
		$this->db->select('*');
		$this->db->from('syarat');
		$this->db->where('id_syarat', $id_syarat);
		$query = $this->db->get();
		return $query->row();
	}

	function get_status_proses_ajuan_diperiksa()
	{
		$this->db->select('*');
		$this->db->from('status_layanan');
		$this->db->where('id_status_layanan', "4f4s8rs");
		$this->db->or_where('id_status_layanan', "7d9aj39");
		$query = $this->db->get();
		return $query->result();
	}

	function get_status_proses_ajuan_diproses()
	{
		$this->db->select('*');
		$this->db->from('status_layanan');
		$this->db->or_where('id_status_layanan', "6d5e4s5");
		$this->db->or_where('id_status_layanan', "9f5s9ef");
		$query = $this->db->get();
		return $query->result();
	}

	function get_status_proses_ajuan_diproses_yudisium()
	{
		$this->db->select('*');
		$this->db->from('status_layanan');
		$this->db->or_where('id_status_layanan', "6d5e4s5");
		$this->db->or_where('id_status_layanan', "9f5s9ef");
		$this->db->or_where('id_status_layanan', "7d9aj39");
		$query = $this->db->get();
		return $query->result();
	}

	function get_datalayananstatus_db($nip)
	{
		$this->db->select('status_layanan.nama_status_layanan, layanan.id_status_layanan, COUNT(*) as total');
		$this->db->from('layanan');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', '');
		$this->db->where('layanan.id_pegawai', $nip);
		$this->db->group_by('status_layanan.id_status_layanan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_dtgrafiklayanan($status, $tahunbulan, $nip)
	{
		$this->db->select('COUNT(*)as total');
		$this->db->from('riwayat_tiket a');
		$this->db->join('layanan b', 'b.id_layanan=a.id_layanan');
		$this->db->where('a.id_status_layanan', $status);
		$this->db->where('b.id_pegawai', $nip);
		$this->db->where("a.tgl_riwayat LIKE  '" . $tahunbulan . "%%'");
		$query = $this->db->get();
		return $query;
	}

	function get_all_pengajuan_konsultasi($id_pegawai)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('pegawai.nip', $id_pegawai);
		$this->db->where('sp.id_sp', '9f73eab8-21e1-11ee-8d5f-c0185002a09f');
		$this->db->where('status_layanan.id_status_layanan !=', '1f7e6gj');
		$this->db->where('status_layanan.id_status_layanan !=', '3h7g4h7');
		$this->db->where('status_layanan.id_status_layanan !=', '6d5e4s5');
		$this->db->where('status_layanan.id_status_layanan !=', '9f5s9ef');
		$query = $this->db->get();
		return $query->result();
	}
}
