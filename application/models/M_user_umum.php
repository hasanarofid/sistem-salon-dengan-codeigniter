<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_umum extends CI_Model{
   

		 function get_sp()
		 {		
			
			 $this->db->select('*');
			$this->db->from('sp a');
			 $this->db->join('bagian b','a.id_bagian=b.id_bagian','left');
			 $this->db->where('a.jenis_layanan="Umum"');
			$this->db->where('a.status_sp="On"');
			$query = $this->db->get();
			return $query->result();
		 }
		
		 function get_detail_sp($id_sp)
		 {		
			
			 $this->db->select('*');
			$this->db->from('detail_sp a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->join('syarat c','c.id_syarat=a.id_syarat','');
			 $this->db->where('a.id_sp',$id_sp);
			 $this->db->where('a.status_detail_sp=1');
			$query = $this->db->get();
			return $query->result();
		 }
		 
	function update_sp($id_sp)
	{
		
		$this->db->select('*');
		$this->db->from('sp a');
		 $this->db->join('bagian b','a.id_bagian=b.id_bagian','left');
		 $this->db->where('a.id_sp',$id_sp);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			show_404();
		}
       
	}
	function show_tiket($no_tiket)
		 {		
			 $this->db->select('*');
			$this->db->from('layanan a');
			$this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->where('a.no_tiket',$no_tiket);
			$query = $this->db->get();
			return $query->row();
		 }
		 function get_tiket($no_tiket)

		 {
	 
			 return $this->db->get_where('layanan',array('no_tiket'=>$no_tiket));
	 
		 }
		
		 function show_syarat($id_sp)
		 {		
			
			 $this->db->select('*');
			$this->db->from('detail_sp a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->join('syarat c','c.id_syarat=a.id_syarat','');
			 $this->db->where('a.id_sp',$id_sp);
			 $this->db->where('a.status_detail_sp=1');
			$query = $this->db->get();
			return $query->result();
		 }
		 function cek_status_tiket($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
			 $this->db->join('syarat b','a.id_syarat=b.id_syarat','');
			 $this->db->join('status_dokumen c','a.id_status_dokumen=c.id_status_dokumen','');
			 $this->db->where('c.nama_status_dokumen ="Baru"');
			 $this->db->where('a.id_layanan',$id_layanan);
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_dokumen($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
			 $this->db->join('syarat b','a.id_syarat=b.id_syarat','');
			 $this->db->join('status_dokumen c','a.id_status_dokumen=c.id_status_dokumen','');
			 $this->db->where('c.nama_status_dokumen ="Baru"');
			 $this->db->where('a.id_layanan',$id_layanan);
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_dokumen_respon($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
		
			 $this->db->join('status_dokumen b','a.id_status_dokumen=b.id_status_dokumen','');
			 $this->db->where('a.id_layanan',$id_layanan);
			 $this->db->where('b.nama_status_dokumen ="Respon"');
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_riwayat($id_layanan)
		 {		
			 $this->db->select('*');
			$this->db->from('riwayat_tiket a');
			 $this->db->join('layanan b','a.id_layanan=b.id_layanan','');
			 $this->db->join('status_layanan c','a.id_status_layanan=c.id_status_layanan','left');
			 $this->db->where('a.id_layanan',$id_layanan);
			 $this->db->order_by('a.tgl_riwayat asc');
			$query = $this->db->get();
			return $query->result();
		 }
		 function cek_max_riwayat($id_layanan)
		 {		
			$queryy=$this->db->query("select * from riwayat_tiket a
			where tgl_riwayat=(SELECT max(tgl_riwayat) from riwayat_tiket b where
			b.id_layanan='$id_layanan')");
			return $queryy->row_array();
		 }
 
}
?>