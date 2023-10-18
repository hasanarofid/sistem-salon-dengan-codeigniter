<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pokja extends CI_Model
{

    function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function get_bagian()
    {
        $this->db->select('*');
        $this->db->from('bagian');
        $query = $this->db->get();
        return $query->result();
    }
       function get_pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
         $this->db->order_by('tgl_pengaduan desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_dtgrafiklayanan($status, $tahunbulan)
    {
        $this->db->select('COUNT(*)as total');
        $this->db->from('riwayat_tiket a');
        $this->db->where('a.id_status_layanan', $status);
        $this->db->where("a.tgl_riwayat LIKE  '" . $tahunbulan . "%%'");
        $query = $this->db->get();
        return $query;
    }

    function get_dttotallayananbg($bagian)
    {
        $this->db->select('COUNT(*)as total, a.id_status_layanan');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->where('b.id_bagian', $bagian);
        $this->db->where(" a.id_status_layanan <> '1f7e6gj'");
        $query = $this->db->get();
        return $query;
    }

    function get_layanan()
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');

        $this->db->join('status_layanan f', 'f.id_status_layanan=a.id_status_layanan');
        $this->db->join('pegawai d', 'a.id_pegawai=d.nip', 'left');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->where(" a.id_status_layanan <> '1f7e6gj'");
        $query = $this->db->get();
        return $query->result();
    }

    function get_layanankabagum($nip)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('status_layanan f', 'f.id_status_layanan=a.id_status_layanan');
        $this->db->join('pegawai d', 'a.id_pegawai=d.nip', 'left');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');

        $this->db->where(" a.id_status_layanan <> '1f7e6gj'");
        $this->db->where(" a.id_status_layanan <> '3h7g4h7'");
        $this->db->where('c.id_pokja', $nip);

        $query = $this->db->get();
        return $query->result();
    }

    function get_layanan_bagianpokja($bagian)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->join('status_layanan f', 'f.id_status_layanan=a.id_status_layanan');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->where('c.id_bagian', $bagian);
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_layanan($id_layanan)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->where('a.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_layanan_pokja($id_bagian)
    {

        $this->db->select('*');
        $this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp');
		$this->db->join('bagian', 'sp.id_bagian=bagian.id_bagian');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
        $this->db->where('bagian.id_bagian', $id_bagian);
        $this->db->where('status_layanan.id_status_layanan','3h7g4h7');
     
        $query = $this->db->get();
        return $query->result();
    }

    function get_riwayat_layanan_pokja($id_bagian)
    {

        $this->db->select('*');
        $this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp');
		$this->db->join('bagian', 'sp.id_bagian=bagian.id_bagian');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
        $this->db->where('bagian.id_bagian', $id_bagian);
        $this->db->where('status_layanan.id_status_layanan !="3h7g4h7"');
        $this->db->where('status_layanan.id_status_layanan !="1f7e6gj"');
        $query = $this->db->get();
        return $query->result();
    }

    function get_layanan_kabagumum($nip)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('status_layanan f', 'f.id_status_layanan=a.id_status_layanan');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->join('status_layanan', 'a.id_status_layanan=status_layanan.id_status_layanan', 'left');
        $this->db->where('c.id_pokja', $nip);
        $this->db->where('a.id_layanan !=', '9f73eab8-21e1-11ee-8d5f-c0185002a09f');
        $this->db->where('status_layanan.id_status_layanan', "3h7g4h7");
        
        $query = $this->db->get();
        return $query->result();
    }

    

    function get_layanan_riwayat_kabagumum($nip)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->join('status_layanan', 'a.id_status_layanan=status_layanan.id_status_layanan', 'left');
        $this->db->where('c.id_pokja', $nip);
        $this->db->where('status_layanan.id_status_layanan', "6d5e4s5");
        $this->db->or_where('status_layanan.id_status_layanan', "9f5s9ef");
        
        $query = $this->db->get();
        return $query->result();
    }

    function get_layanan_daftar($nip, $status)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->where('a.id_status_layanan', $status);
        $this->db->where('a.id_pegawai', $nip);
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_layanan_pokja($id_layanan, $nip)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->where('a.id_layanan', $id_layanan);
        $this->db->where('a.id_pegawai', $nip);
        $query = $this->db->get();
        return $query->result();
    }

    function get_pegawai_bagian($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('pegawai c', 'b.id_bagian=c.id_bagian_pegawai');
        $this->db->where('a.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_syarat_sp_ajuan($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('detail_sp a');
        $this->db->join('syarat b', 'a.id_syarat=b.id_syarat');
        $this->db->join('layanan c', 'a.id_sp=c.id_sp');
        $this->db->where('c.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_riwayat_layanan($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('riwayat_tiket a');
        $this->db->join('status_layanan b', 'a.id_status_layanan=b.id_status_layanan');
        $this->db->join('layanan c', 'a.id_layanan=c.id_layanan');

        $this->db->where('c.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_dokrespon($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('dokumen');
        $this->db->where('dokumen.id_layanan', $id_layanan);
        $this->db->where('dokumen.id_status_dokumen', 'c2713cfb-f2ee-11ed-9a98-c454445434d3');
        return $this->db->get();
    }

    function get_dok($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('dokumen a');
        $this->db->join('syarat b', 'a.id_syarat=b.id_syarat', '');
        $this->db->join('status_dokumen c', 'a.id_status_dokumen=c.id_status_dokumen', '');
        $this->db->where('c.nama_status_dokumen ="Baru"');
        $this->db->where('a.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_bagian($bagian)
    {
        $this->db->select('*');
        $this->db->from('bagian');
        $this->db->join('pegawai', 'bagian.id_pokja=pegawai.nip', '');
        $this->db->where('bagian.id_bagian', $bagian);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datalayananstatus_db()
    {
        $this->db->select('status_layanan.nama_status_layanan, layanan.id_status_layanan, COUNT(*) as total');
        $this->db->from('layanan');
        $this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', '');
        $this->db->group_by('status_layanan.id_status_layanan');
        $query = $this->db->get();
        return $query->result();
    }

    function get_datalayananstatusbagian_db($bagian)
    {
        $this->db->select('status_layanan.nama_status_layanan, layanan.id_status_layanan, COUNT(*) as total');
        $this->db->from('layanan');
        $this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', '');
        $this->db->join('sp', 'layanan.id_sp=sp.id_sp', '');
        $this->db->where('sp.id_bagian', $bagian);
        $this->db->group_by('status_layanan.id_status_layanan');
        $query = $this->db->get();
        return $query->result();
    }

    function get_row_detail_layanan($id_layanan)
	{
		$this->db->select('*, layanan.no_hp as no_hp_umum , pengguna_pt.no_hp as no_hp_operator');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.nip', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
        $this->db->join('pengguna_pt', 'pengguna_pt.id_pengguna_pt = layanan.id_pengguna_pt', 'left');
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
		$this->db->order_by('tgl_riwayat','DESC');
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

    function get_status_proses_ajuan()
	{
		$this->db->select('*');
		$this->db->from('status_layanan');
		$this->db->where('id_status_layanan', "4f4s8rs");
		$this->db->or_where('id_status_layanan', "6d5e4s5");
		$this->db->or_where('id_status_layanan', "7d9aj39");
		$this->db->or_where('id_status_layanan', "9f5s9ef");
		$query = $this->db->get();
		return $query->result();
	}

    function get_pegawai_per_bagian($id_bagian)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id_bagian_pegawai', $id_bagian);
		$query = $this->db->get();
		return $query->result();
	}

    function get_all_pengajuan_layanan_konsultasi()
	{

		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->join('sp', 'layanan.id_sp=sp.id_sp', 'left');
		$this->db->join('pegawai', 'layanan.id_pegawai=pegawai.id_pegawai', 'left');
		$this->db->join('status_layanan', 'layanan.id_status_layanan=status_layanan.id_status_layanan', 'left');
		$this->db->join('pts', 'layanan.kode_pt=pts.kode_pt', 'left');
		$this->db->where('sp.id_sp', "9f73eab8-21e1-11ee-8d5f-c0185002a09f");
		$this->db->where('status_layanan.id_status_layanan !=', '9f5s9ef');
		$this->db->where('status_layanan.id_status_layanan !=', '6d5e4s5');
		$query = $this->db->get();
		return $query->result();
	}

    function get_pegawai()
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('id_bagian_pegawai !=', '');
		$query = $this->db->get();
		return $query->result();
	}
}
