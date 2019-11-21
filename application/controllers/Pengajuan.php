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
	public function index()
	{
		// Memanggil file test.blade.php
		// Tidak perlu menuliskan .blade.php
		return view('dosens/pengajuan');
	}
	public function status()
	{
		// Memanggil file test.blade.php
		// Tidak perlu menuliskan .blade.php
		return view('dosens/status');
	}

	public function detail_pengajuan()
	{
		return view('layouts/detail_pengajuan');
	}
}