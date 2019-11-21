<?php 

class Home extends CI_Controller {
	public function index($nama = '')
	{
		return view('layouts/master');
	}
} 
?>