<?php 

class Pengusul extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("anggota_model");
        $this->load->library('session');
        $this->session->set_userdata('username', 'admin');

		if($this->session->userdata('status') != "login")
		{
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$nidn = $this->session->userdata['username'];
		$pengajuan = [];
	
		if (is_numeric($nidn)) {
			$pengajuan = $this->pengajuan_model->get_detail_by_nidn();
		}
		
		$data['pengajuan'] = $pengajuan;

		return view('pengusuls/index', $data);

	}
} 
?>