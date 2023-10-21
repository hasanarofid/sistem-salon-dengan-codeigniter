<?php

class M_umum extends CI_model
{

	function get_data($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}

	function ambil_data($tabel, $kolom = FALSE, $id = FALSE)
	{
		if ($id === FALSE) {
			$q = $this->db->get($tabel);	
			return $q->result();		
		}
		$q = $this->db->get_where($tabel, array($kolom => $id)); 
		return $q->row();			
	}

	function hapus($tabel, $kolom, $id)
	{
		$this->db->delete($tabel, array($kolom => $id));
	}
	function set_data($tabel)
	{
		$data = $this->input->post(null, TRUE);
		array_pop($data);
		return $this->db->insert($tabel, $data);
	}
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function UpdateData($tabelName, $data, $where)
	{
		$res = $this->db->update($tabelName, $data, $where);
		return $res;
	}
	function update_data($tabel)
	{
		$data = $this->input->post(null, TRUE);
		$primary = array_slice($data, 0, 1);
		array_shift($data);
		array_pop($data);
		$this->db->where($primary);
		$this->db->update($tabel, $data);
	}

	function hapus_data($tabel, $kolom, $id)
	{
		$this->db->delete($tabel, array($kolom => $id));
		if (!$this->db->affected_rows())
			return (FALSE);
		else
			return (TRUE);
	}
	 function get_pelanggan($username)

		 {
	 
			 return $this->db->get_where('pelanggan',array('username'=>$username));
	 
		 }

	function get_service()
	{

		$this->db->select('*');
		$this->db->from('service a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', '');

		$query = $this->db->get();
		return $query->result();
	}
	function get_gallery()
	{

		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->order_by('tgl_upload desc');
		$this->db->limit(4);

		$query = $this->db->get();
		return $query->result();
	}
	function get_gallery_all()
	{

		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->order_by('tgl_upload desc');

		$query = $this->db->get();
		return $query->result();
	}
	function get_testimoni_all()
	{

		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('tgl_testimoni desc');

		$query = $this->db->get();
		return $query->result();
	}
	function get_testimoni()
	{

		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('tgl_testimoni desc');
		$this->db->limit(4);

		$query = $this->db->get();
		return $query->result();
	}
	function get_kategori()
	{

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->limit(6);

		$query = $this->db->get();
		return $query->result();
	}
}
