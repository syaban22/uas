<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publik extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Dashboard Publik';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/header_public', $data);
		$this->load->view('template/topbar_public', $data);
		$this->load->view('publik/index', $data);
		$this->load->view('template/footer_public');
	}
}
