<?php 

class Admin extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("anggota_model");
    }

	public function index()
	{
		$pengajuan=$this->pengajuan_model->get_all_detail();
		
		$data['pengajuan']=$pengajuan;

		return view('admins/home', $data);

	}

	public function pengajuan($id_pengajuan)
	{
		$pengajuan=$this->pengajuan_model->get_detail($id_pengajuan);
		$pengajuan->anggota=$this->anggota_model->get_all($id_pengajuan);
		$data['pengajuan']=$pengajuan;
		return view('admins/detail', $data);
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


} 