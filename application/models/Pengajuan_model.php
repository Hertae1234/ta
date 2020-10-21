<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Pengajuan_model extends CI_Model
{
	private $table='ttd_pengajuan';

	public function get($id_pengajuan)
	{
		return $this->db->where("id", $id_pengajuan)
						->get($this->table)
						->row();
	}


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

	public function order_by($order)
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->order_by($order, "asc")
						->get()->result();

	}


	public function get_detail($id_pengajuan)
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, p.catatan, p.tanggal_selesai, p.bukti_scan, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->where("p.id", $id_pengajuan)
						->get()->row();

	}

	public function get_detail_by_nidn($nidn)
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, p.catatan, p.tanggal_selesai, p.bukti_scan, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->where("d.nidn", $nidn)
						->get()->result();

	}

	public function get_detail_by_status($status)
	{
		return $this->db->select("p.id, p.judul, p.tujuan, p.sumber_dana, p.total, p.status, d.name")
						->from("ttd_pengajuan p")
						->join("akd_dosens d" , "d.id = p.id_pengusul")
						->where("p.status", $status)
						->get()->result();
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update($data, $id)
	{
		return $this->db->where('id', $id)
					->update($this->table, $data);
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
}
