<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	
	public function index()
	{
		$data['judul'] = 'Detail Perusahaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('perusahaan/index', $data);
		$this->load->view('template/footer');
	}
}