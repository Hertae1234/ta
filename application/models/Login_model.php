<?php 

class Login_model extends CI_Model{	
	public function ambil_data($table,$where = []){		
		return $this->db->get_where($table,$where);
	}	

	public function cek_login($username,$password) {
		return $this->ambil_data('ttd_users', [
			'username' => $username,
			'password' => $password
		])
		->row_array();
	}
}