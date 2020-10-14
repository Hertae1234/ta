<?php 

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}

	function index(){
		$this->load->view('auth/login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->Login_model->cek_login($username, $password);
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			return redirect(base_url("admin/index"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function registrasi($data){
		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($data["password"]);
		$password2 = mysqli_real_escape_string($data["password2"]);
		//cek konfirmasi pasword

		if($password != $password2){
			echo "<script>
					alert('konfirmasi password tidak sesuai')
					</script>"		;
			return false;
		}

		return 1;
	}
}