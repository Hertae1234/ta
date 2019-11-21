<?php 

class Admin extends CI_Controller {
	public function index()
	{
		return view('admins/home');
	}

	public function pengajuan()
	{
		return view('admins/pengajuan');
	}
} 