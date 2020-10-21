<?php 

class Login_model extends CI_Model{	
	public function ambil_data($table,$where = []){		
		return $this->db->get_where($table,$where);
	}

	public function create_user($data){
		return $this->db->insert('ttd_users', $data);
	}

	public function cek_login($username,$password) {
		return $this->ambil_data('ttd_users', [
			'username' => $username,
			'password' => $password
		])
		->row_array();
	}	

	public function cek_user($username) {
		return $this->ambil_data('ttd_users', [
			'username' => $username,
		])
		->row_array();
	}	


	public function cek_dosen($password) {
		return $this->ambil_data('akd_dosens', [
			'nidn' => $password
		])
		->row_array();
	}
}