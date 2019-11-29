<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Anggota_model extends CI_Model
{
	private $_table = "ttd_anggota";

	public function get_all($id_pengajuan)
	{
		return $this->db->select("d.name nama_dosen, a.nama nama_mahasiswa")
						->from("ttd_anggota a")
						->join("akd_dosens d" , "d.id = a.id_dosen", "left")
						->where("a.id_pengajuan", $id_pengajuan)
						->get()->result();

	}

	public function insert($data)
	{
		return $this->db->insert('ttd_anggota', $data);
	}
}