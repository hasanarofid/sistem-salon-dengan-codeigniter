<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pts_model extends CI_Model
{


	function get_all_pengajuan_layanan($kode_pt)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('pts.kode_pt', $kode_pt);
		$this->db->where('sp.id_sp !=', "9f73eab8-21e1-11ee-8d5f-c0185002a09f");
		$this->db->where('status_layanan.id_status_layanan !=', '9f5s9ef');
		$this->db->where('status_layanan.id_status_layanan !=', '6d5e4s5');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_riwayat_layanan($kode_pt)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where("pts.kode_pt = ".$kode_pt." and (status_layanan.id_status_layanan = '9f5s9ef' OR status_layanan.id_status_layanan = '6d5e4s5')");
		$query = $this->db->get();
		return $query->result();
	}
	function get_all_layanan_pts($jenis_pt)
	{
		$this->db->select('*');
		$this->db->from('sp');
		$this->db->where('jenis_layanan LIKE "%%'.$jenis_pt.'%%"');
		$this->db->where('sp.id_sp !=', "9f73eab8-21e1-11ee-8d5f-c0185002a09f");
		$this->db->where('status_sp="On"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_row_detail_layanan($no_tiket)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.id_pegawai', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('layanan.no_tiket', $no_tiket);
		$query = $this->db->get();
		return $query->row();
	}
	function get_row_layanan($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.id_pegawai', 'left');
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
	function get_datalayananstatus_db($kode_pt)
	{
		$this->db->select('status_layanan.nama_status_layanan, layanan.id_status_layanan, COUNT(*) as total');
		$this->db->from('layanan');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', '');
		$this->db->where('layanan.kode_pt', $kode_pt);
		$this->db->group_by('status_layanan.id_status_layanan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_dtgrafiklayanan($status, $tahunbulan, $kode_pt)
	{
		$this->db->select('COUNT(*)as total');
		$this->db->from('riwayat_tiket a');
		$this->db->join('layanan b', 'b.id_layanan=a.id_layanan');
		$this->db->where('a.id_status_layanan', $status);
		$this->db->where('b.kode_pt', $kode_pt);
		$this->db->where("a.tgl_riwayat LIKE  '" . $tahunbulan . "%%'");
		$query = $this->db->get();
		return $query;
	}
	function get_dttotallayananbg($bagian, $kode_pt)
	{
		$this->db->select('COUNT(*)as total, a.id_status_layanan');
		$this->db->from('layanan a');
		$this->db->join('sp b', 'a.id_sp=b.id_sp');
		$this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
		$this->db->where('b.id_bagian', $bagian);
		$this->db->where('a.kode_pt', $kode_pt);
		$this->db->where(" a.id_status_layanan <> '1f7e6gj'");
		$query = $this->db->get();
		return $query;
	}

	function get_all_pengajuan_layanan_konsultasi($kode_pt)
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('pts.kode_pt', $kode_pt);
		$this->db->where('sp.id_sp', "9f73eab8-21e1-11ee-8d5f-c0185002a09f");
		$this->db->where('status_layanan.id_status_layanan !=', '9f5s9ef');
		$this->db->where('status_layanan.id_status_layanan !=', '6d5e4s5');
		$query = $this->db->get();
		return $query->result();
	}

	function get_row_view_template($id_syarat)
	{
		$this->db->select('*');
		$this->db->from('syarat');
		$this->db->where('id_syarat', $id_syarat);
		$query = $this->db->get();
		return $query->row();
	}
}
