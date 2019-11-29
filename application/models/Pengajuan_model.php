<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Pengajuan_model extends CI_Model
{
	private $table='ttd_pengajuan';

	public function get_all()
	{
		return $this->db->get($this->table)->result();
	}

	public function get_all_detail()
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->get()->result();

	}

	public function get_detail($id_pengajuan)
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->where("p.id", $id_pengajuan)
						->get()->row();

	}

	public function insert($data)
	{
		return $this->db->insert('ttd_pengajuan', $data);
	}
}
