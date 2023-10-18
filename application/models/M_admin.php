<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	function hitung_waktu($tgl_mulai,$tgl_akhir)
		 {		
			$query=$this->db->query("WITH RECURSIVE calendar AS (
            SELECT '$tgl_mulai' AS calendar_date
            UNION ALL
            SELECT calendar_date + INTERVAL 1 DAY
            FROM calendar
            WHERE calendar_date < '$tgl_akhir'
        )
        SELECT COUNT(*)  as total_hari
        FROM (
            SELECT calendar_date
            FROM calendar
            WHERE 
                DAYOFWEEK(calendar_date) NOT IN (1,7)
                AND DATE(calendar_date) NOT IN (
                    SELECT tanggal FROM hari_libur 
                    WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_akhir'
                )
        ) as subquery");
			return $query;
		 }
		 function hitung_proses($tgl_mulai)
		 {	
		 $tgl_akhir=date('Y-m-d');	
			$query=$this->db->query("WITH RECURSIVE calendar AS (
            SELECT '$tgl_mulai' AS calendar_date
            UNION ALL
            SELECT calendar_date + INTERVAL 1 DAY
            FROM calendar
            WHERE calendar_date < '$tgl_akhir'
        )
        SELECT COUNT(*)  as total_hari
        FROM (
            SELECT calendar_date
            FROM calendar
            WHERE 
                DAYOFWEEK(calendar_date) NOT IN (1,7)
                AND DATE(calendar_date) NOT IN (
                    SELECT tanggal FROM hari_libur 
                    WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_akhir'
                )
        ) as subquery");
			return $query;
		 }
	public function layanan_periksa()
{   
   $query = $this->db->get_where('layanan', array('id_status_layanan' => '3f9j9h7s'));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
function get_pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
         $this->db->order_by('tgl_pengaduan desc');
        $query = $this->db->get();
        return $query->result();
    }
public function layanan_masuk()
{   
   $query = $this->db->get_where('layanan', array('id_status_layanan' => '3h7g4h7'));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function layanan_proses()
{   
   $query = $this->db->get_where('layanan', array('id_status_layanan' => '4f4s8rs'));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
public function layanan_selesai()
{   
   $query = $this->db->get_where('layanan', array('id_status_layanan' => '9f5s9ef'));
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
}
	function get_pegawai()
	{

		$this->db->select('*');
		$this->db->from('pegawai a');
		$this->db->join('bagian b', 'a.id_bagian_pegawai=b.id_bagian', 'left');
		$query = $this->db->get();
		return $query->result();
	}
		function get_syarat()
	{

		$this->db->select('*');
		$this->db->from('syarat');
		$this->db->order_by('tgl_input desc');
		$query = $this->db->get();
		return $query->result();
	}
	function get_pt()
	{

		$this->db->select('*');
		$this->db->from('pts');
		$this->db->where('status_pt','A');
		$this->db->order_by('kode_pt asc');
		$query = $this->db->get();
		return $query->result();
	}
	function get_pendaftar()
	{

		$this->db->select('a.*,b.nama_pt');
		$this->db->from('pengguna_pt a');
		$this->db->join('pts b', 'a.kode_pt=b.kode_pt', 'left');
		$this->db->where('a.status',0);

		$query = $this->db->get();
		return $query->result();
	}
	function get_pengguna_pt()
	{

		$this->db->select('a.*,b.nama_pt');
		$this->db->from('pengguna_pt a');
		$this->db->join('pts b', 'a.kode_pt=b.kode_pt', 'left');
		$this->db->where('a.status',1);

		$query = $this->db->get();
		return $query->result();
	}
	function get_bagian()
	{

		$this->db->select('*');
		$this->db->from('bagian a');
		$this->db->join('pegawai b', 'a.id_pokja=b.nip', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	function get_pengguna()
	{

		$this->db->select('*');
		$this->db->from('pengguna a');
		$this->db->join('pegawai b', 'a.id_pegawai=b.id_pegawai', 'left');
		$this->db->join('aplikasi c', 'a.id_aplikasi=c.id_aplikasi', 'left');
		$this->db->join('role d', 'a.id_role=d.id_role', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	function get_sp()
	{

		$this->db->select('*');
		$this->db->from('sp a');
		$this->db->join('bagian b', 'a.id_bagian=b.id_bagian', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	function get_layanan_baru()
	{

		 $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('status_layanan f', 'f.id_status_layanan=a.id_status_layanan');
        $this->db->join('pegawai d', 'a.id_pegawai=d.nip','left');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->join('status_layanan', 'a.id_status_layanan=status_layanan.id_status_layanan', 'left');
        $this->db->where('status_layanan.id_status_layanan', "3h7g4h7");
        $this->db->or_where('status_layanan.id_status_layanan', '3f9j9h7s');
		$this->db->or_where('status_layanan.id_status_layanan', '4f4s8rs');
		$this->db->or_where('status_layanan.id_status_layanan', '7d9aj39');
        
        $query = $this->db->get();
        return $query->result();
		$query = $this->db->get();
		return $query->result();
	}
	function get_riwayat_layanan()
	{

		  $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'a.id_pegawai=d.nip','left');
        $this->db->join('pts e', 'a.kode_pt=e.kode_pt', 'left');
        $this->db->join('status_layanan', 'a.id_status_layanan=status_layanan.id_status_layanan', 'left');
        $this->db->where('status_layanan.id_status_layanan', "6d5e4s5");
        $this->db->or_where('status_layanan.id_status_layanan', "9f5s9ef");
		$query = $this->db->get();
		return $query->result();
	}
	function get_detail_sp($id_sp)
	{

		$this->db->select('*');
		$this->db->from('detail_sp a');
		$this->db->join('sp b', 'a.id_sp=b.id_sp', '');
		$this->db->join('syarat c', 'c.id_syarat=a.id_syarat', '');
		$this->db->where('a.id_sp', $id_sp);
		$this->db->where('a.status_detail_sp=1');
		$query = $this->db->get();
		return $query->result();
	}

	function update_sp($id_sp = FALSE)
	{

		$this->db->select('*');
		$this->db->from('sp a');
		$this->db->join('bagian b', 'a.id_bagian=b.id_bagian', 'left');
		$this->db->where('a.id_sp', $id_sp);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			show_404();
		}
	}
	function show_tiket($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan a');
		$this->db->join('sp b', 'a.id_sp=b.id_sp', '');
		$this->db->where('a.id_layanan', $id_layanan);
		$query = $this->db->get();
		return $query->row();
	}
	function get_layanan($id_layanan)

	{

		return $this->db->get_where('layanan', array('id_layanan' => $id_layanan));
	}

	function show_syarat($id_sp)
	{

		$this->db->select('*');
		$this->db->from('detail_sp a');
		$this->db->join('sp b', 'a.id_sp=b.id_sp', '');
		$this->db->join('syarat c', 'c.id_syarat=a.id_syarat', '');
		$this->db->where('a.id_sp', $id_sp);
		$this->db->where('a.status_detail_sp=1');
		$query = $this->db->get();
		return $query->result();
	}
	function cek_status_tiket($id_layanan)
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
	function show_dokumen($id_layanan)
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
	function show_dokumen_respon($id_layanan)
	{

		$this->db->select('*');
		$this->db->from('dokumen a');

		$this->db->join('status_dokumen b', 'a.id_status_dokumen=b.id_status_dokumen', '');
		$this->db->where('a.id_layanan', $id_layanan);
		$this->db->where('b.nama_status_dokumen ="Respon"');
		$query = $this->db->get();
		return $query->result();
	}
	function show_riwayat($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('riwayat_tiket a');
		$this->db->join('layanan b', 'a.id_layanan=b.id_layanan', '');
		$this->db->join('status_layanan c', 'a.id_status_layanan=c.id_status_layanan', 'left');
		$this->db->where('a.id_layanan', $id_layanan);
		$this->db->order_by('a.tgl_riwayat asc');
		$query = $this->db->get();
		return $query->result();
	}
}
