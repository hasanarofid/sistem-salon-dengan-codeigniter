<?php

class M_login extends CI_Model{

		function auth($username,$password){
			$this->db->select('*');
			$this->db->from('pengguna a');
			$this->db->where('a.username = "'.$username.'" AND a.password=md5 ("'.$password.'") ');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query;
			}
			function auth_pelanggan($username,$password){
			$this->db->select('*');
			$this->db->from('pelanggan a');
			$this->db->where('a.username = "'.$username.'" AND a.password=md5 ("'.$password.'") ');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query;
			}
	
 
 
}