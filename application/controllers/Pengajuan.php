	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("anggota_model");
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
        if($this->session->userdata('status') != "login")
		{
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		return view('pengajuans/home');
	}
	
	public function status()
	{
		if ($this->session->userdata('is_admin') == '0') {
			$pengajuan=$this->pengajuan_model->get_detail_by_nidn($this->session->userdata('username'));
		} 

		else {
			$pengajuan=$this->pengajuan_model->get_all_detail();
		}


		$data['pengajuan']=$pengajuan;		
		return view('pengajuans/status', $data);
	}
  	
  	public function baru()
  	{
  		$data['akd_dosens'] = $this->dosen_model->get_all();
  		$data['pengusul'] = $this->dosen_model->get_pengusul($this->session->userdata('username'));

  		return view('pengajuans/baru', $data);
  	}

  	public function draf()
  	{
		$pengajuan=$this->pengajuan_model->get_all_detail();


		$data['pengajuan']=$pengajuan;
  		return view('pengajuans/draf', $data);
  	}

	public function detail($id_pengajuan)
	{
		$pengajuan=$this->pengajuan_model->get_detail($id_pengajuan);
		$pengajuan->anggota=$this->anggota_model->get_all($id_pengajuan);
		$data['pengajuan']=$pengajuan;

		return view('pengajuans/detail', $data);
	}
	
	public function edit($id_pengajuan)
  	{
		$pengajuan=$this->pengajuan_model->get($id_pengajuan);
		$pengajuan->anggota=$this->anggota_model->get_all($id_pengajuan);
		$data['akd_dosens']=$this->dosen_model->get_all();
  		$data['pengusul'] = $this->dosen_model->get_pengusul($this->session->userdata('username'));
  		$data['pengajuan'] = $pengajuan;
  		return view('pengajuans/baru', $data);
  	}

	public function store($status)
	{
		// Collecting data
		$id_pengajuan   = $this->input->post('id_pengajuan');
		$id_pengusul	= $this->input->post('id_pengusul');
		$judul 			= $this->input->post('judul');
		$anggota 		= $this->input->post('anggota[]');
		$mahasiswa 		= $this->input->post('mahasiswa[]');
		$jenis_sumber_dana 	= $this->input->post('jenis_sumber_dana');
		$sumber_dana	= $this->input->post('sumber_dana');
		$tujuan 		= $this->input->post('tujuan');
		$total 			= $this->input->post('total'); 
	
		$data = [
			'id_pengusul' 	=> $id_pengusul,
			'judul' 	  	=> $judul,
			'tujuan'		=> $tujuan,
			'jenis_sumber_dana'	=> $jenis_sumber_dana,
			'sumber_dana' 	=> $sumber_dana,
			'total' 		=> $total,
			'status' 		=> !empty($status)? $status : 'draf'
		];



		$save = empty($id_pengajuan) 
			? $this->pengajuan_model->insert($data)
			: $this->pengajuan_model->update($data, $id_pengajuan);

		if ($save) {
			$id_pengajuan=$this->db->insert_id();
			if (!empty($anggota)) {
				foreach ($anggota as $value) {
					if (!empty($value)) {
						
						$this->anggota_model->insert([
							'id_pengajuan' => $id_pengajuan,
							'id_dosen'		=> $value
						]);
					}
				}
			}

			if (!empty($mahasiswa)) {
				foreach ($mahasiswa as $value) {
					if (!empty($value)) {
						
						$this->anggota_model->insert([
							'id_pengajuan' => $id_pengajuan,
							'nama'		=> $value
						]);
					}
				}
			}
			
			$this->session->set_flashdata('msg_success', 'New post saved.');
		} else {
			$this->session->set_flashdata('msg_error', 'New post can\'t be save! Please try again.');
		}
		redirect('pengajuan/status');
	}

	public function ajukan($id_pengajuan)
	{
		$data = [
			'status' 	=> 'diajukan'
		];

		$save = $this->pengajuan_model->update($data, $id_pengajuan);

		if ($save) {
			$this->session->set_flashdata('msg_success', 'Berhasil diajukan');
		} else {
			$this->session->set_flashdata('msg_error', 'Gagal diajukan, silakan coba lagi');
		}

		redirect('pengajuan/status');

	}

}