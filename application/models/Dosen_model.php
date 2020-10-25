<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dosen_model extends CI_Model
{
	
	private $_table = "akd_dosens";
	public $id;
	public $name;
	public $alias;
	public $prefix_title;
	public $suffix_title;
	public $jurusan;
	public $nidn;

	public function rules()
	{
	    return['field' => 'nama',
	        'label' => 'Nama',	
	        'rules' => 'required'];
	}

	public function get_all()
	{
		return $this->db->order_by('name')->get($this->_table)->result();
	}
	public function get_pengusul($nidn)
	{
		return $this->db->get_where($this->_table, ['nidn'=>$nidn])->row();
	}
/*
	public function get_pengusul()
	{
		$this->db->select('*')->where('type','dosen')->get('akd_dosens')->result();
	}*/

	public function get_by_id($id)
	{
		return $this->db->get_where($this->_table, ["id"=>$id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id = uniqid();
		$this->name = $post["nama"];
		$this->prefix = $post["prefix"];
		$this->suffix = $post["sufix"];
		$this->jurusan = $post["jurusan"];
		$this->db->insert($this->_table, $this);
	}
/*
	public function update()
	{
		$post = $this->input->post();
		$this->id_anggota = $post["id"];
		$this->id_dosen = $post["dosen"];
		$this->id_pengajuan = $post["pengajuan"];
		$this->db->update($this->_table, $this, array("id_anggota" =>$post['id']));
	}

	public function delete($id)
	{
		return $this->db->delet($this->_table, array("id_anggota" => $id));
	}*/
}

