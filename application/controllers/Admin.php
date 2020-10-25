<?php 

class Admin extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengajuan_model");
        $this->load->model("anggota_model");
        $this->load->library('session');

		if($this->session->userdata('status') != "login")
		{
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		parse_str($_SERVER['QUERY_STRING'], $params);

        if ($_SESSION['is_admin'] == '0') {
        	return redirect()->back();
        }
		$this->load->helper('url');
		$this->load->library('javascript');
		$status = isset($_GET['status'])? $_GET['status']: '';
		$sort = isset($_GET['sort'])? $_GET['sort']: '';
		$search = isset($_GET['search'])? $_GET['search']: '';

		$data = [
			'pengajuan' => $this->pengajuan_model->get_custom($status, $sort, $search),
			'params' => $params
		];

		return view('admins/home', $data);

	}

	public function status()
	{
		$status = $this->pengajuan_model->get_detail_by_status($_GET['status']);
		
		$data['pengajuan']=$status; 

		return view('admins/status', $data);
	}

	public function arsip()
	{
		$arsip = $_GET['status'];
		$status = $this->pengajuan_model->get_detail_by_status($arsip);
		
		$data['pengajuan']=$status; 

		return view('admins/status', $data);
	}


	public function pengajuan($id_pengajuan)
	{
		$pengajuan=$this->pengajuan_model->get_detail($id_pengajuan);
		$pengajuan->anggota=$this->anggota_model->get_all($id_pengajuan);
		$data['pengajuan']=$pengajuan;
		return view('admins/detail', $data);
	}


	public function update($id_pengajuan)
	{

		$status				= $this->input->post('status'); 
		$catatan 			= $this->input->post('catatan'); 
		$tanggal_selesai	= $this->input->post('tanggal_selesai'); 

		$data = [
			'catatan'			=> $catatan
		];
		
		if (!empty($tanggal_selesai)) {
			$data['tanggal_selesai'] = $tanggal_selesai;
		}
		if (!empty($status)) {
			$data['status'] = $status;
		}


		if (!empty($_FILES['bukti_scan']['name'])) {
			$config['upload_path']          = APPPATH.'../upload/';
			$config['file_name']			= $_FILES['bukti_scan']['name'];
            $config['allowed_types']        = 'jpg|png|pdf';
            $config['file_ext_tolower']     = TRUE;
            $config['encrypt_name']        	= TRUE;
            $config['max_size']        		= 2048;
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('bukti_scan'))
            {
                    $error = $this->upload->display_errors();

					$this->session->set_flashdata('msg_error', $error);
                    redirect('admin/pengajuan/'.$id_pengajuan);
            }else{ 
            	$name = $this->upload->data('file_name');
            	$data['bukti_scan'] = $name;
            }
		}

		$save = $this->pengajuan_model->update($data, $id_pengajuan);
		if ($save) {
			$this->session->set_flashdata('msg_success', 'Berhasil disimpan');
		} else {
			$this->session->set_flashdata('msg_error', 'Gagal dismpan, silakan coba lagi');
		}

		redirect('admin');
	}


	public function do_upload()
    {
            $config['upload_path']          = APPPATH.'../upload/';
            $config['allowed_types']        = 'jpg|png|pdf';
            $config['file_ext_tolower']     = TRUE;
            $config['encrypt_name']        	= TRUE;
            $config['max_size']        		= 2048;
            
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('bukti_scan'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('pengajuan/detail', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());


                    $this->load->view('upload_success', $data);
            }
    }

    public function kelola_akun()
  	{
  		
  		$data['akd_dosens']=$this->dosen_model->get_all();


  		return view('pengajuans/baru', $data);
  	}

} 