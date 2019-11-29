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
    }

	public function index()
	{
		
		return view('pengajuans/home');
	}
	
	public function status()
	{
		$pengajuan=$this->pengajuan_model->get_all_detail();


		$data['pengajuan']=$pengajuan;		
		return view('pengajuans/status', $data);
	}
  	
  	public function baru()
  	{
  		$data['akd_dosens']=$this->dosen_model->get_all();

  		return view('pengajuans/baru', $data);
  	}

	public function detail($id_pengajuan)
	{
		$pengajuan=$this->pengajuan_model->get_detail($id_pengajuan);
		$pengajuan->anggota=$this->anggota_model->get_all($id_pengajuan);
		$data['pengajuan']=$pengajuan;
		return view('pengajuans/detail', $data);
	
	}
	public function coba()
	{
		return view('admins/coba_upload');
	}


    public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }

	public function store()
	{
		// Collecting data
		$id_pengusul	= $this->input->post('id_pengusul');
		$judul 			= $this->input->post('judul');
		$anggota 		= $this->input->post('anggota[]');
		$mahasiswa 		= $this->input->post('mahasiswa[]');
		$jenis_sumber_dana 	= $this->input->post('jenis_sumber_dana');
		$sumber_dana	= $this->input->post('sumber_dana');
		$tujuan 		= $this->input->post('tujuan');
		$total 			= $this->input->post('total'); 

		$data = [
			'id_pengusul' 	  	=> $id_pengusul,
			'judul' 	  	=> $judul,
			'tujuan'		=> $tujuan,
			'jenis_sumber_dana'		=> $jenis_sumber_dana,
			'sumber_dana' 	=> $sumber_dana,
			'total' => $total,
			'status' => 'draf',
		];

		$save = $this->pengajuan_model->insert($data);

		if ($save) {
			$id_pengajuan=$this->db->insert_id();
			if (!empty($anggota)) {
				foreach ($anggota as $value) {
					$this->anggota_model->insert([
						'id_pengajuan' => $id_pengajuan,
						'id_dosen'		=> $value
					]);
				}
			}

			if (!empty($mahasiswa)) {
				foreach ($mahasiswa as $value) {
					$this->anggota_model->insert([
						'id_pengajuan' => $id_pengajuan,
						'nama'		=> $value
					]);
				}
			}
			
			$this->session->set_flashdata('msg_success', 'New post saved.');
		} else {
			$this->session->set_flashdata('msg_error', 'New post can\'t be save! Please try again.');
		}
		redirect('pengajuan/status');
	}

}