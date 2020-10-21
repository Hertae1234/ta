<?php 

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}

	function index(){


		if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
			if ($_SESSION['is_admin'] == '1') {
				return redirect('admin');
			}
			return redirect('pengusul');
		}

		$this->load->view('auth/login');
	}

	function sign_up(){
		$this->load->view('auth/sign_up');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Login_model->cek_login(
			$username, 
			md5($password)
		);
		if(!empty($cek)){

			$data_session = array(
				'username' => $username,
				'is_admin' => $cek['role_id'], 
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			if ($cek['role_id'] == 1) {
				return redirect(base_url("admin/index"));
			}
			
			return redirect(base_url("pengusul/index"));

		}
			echo "Username dan password salah !";
	}

	function logout(){
		$this->session->sess_destroy();

		echo "<script>
				alert('Berhasil Logout');
				window.location.href='".base_url('login')."';	
				</script>"		;

	}

	function aksi_sign_up(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');

		//cek konfirmasi pasword
		
		if($password != $password2){
			echo "<script>
					alert('konfirmasi password tidak sesuai')
					</script>"		;
			return false;
		}

		//cek apakah user sudah terdaftar sebelumnya
		$cek_user = $this->Login_model->cek_user(
			$username
		);

		
		if(!empty($cek_user)) {
			echo "<script>
					alert('user sudah terdaftar, silahkan Login')
					</script>";
			return false;
		}

		//cek apakah nidn ditemukan di database dosen
		$cek_dosen = $this->Login_model->cek_dosen(
			$username
		);


		if(empty($cek_dosen)){
			echo "<script>
					alert('gagal membuat akun')
					</script>"		;
			return false;
		}

		//jika ada nidn benar, buat akun dan set session
		$this->Login_model->create_user([
			'username' => $username,
			'fullname' => $cek_dosen['name'],
			'password' => md5($password),
			'role_id'  => '0'
		]);

		$data_session = array(
			'username' => $username,
			'fullname' => $cek_dosen['name'],
			'is_admin' => '0', 
			'status' => "login"
			);

		$this->session->set_userdata($data_session);
	
		return redirect(base_url('pengusul/index'));
	}
}