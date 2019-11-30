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

	public function posisi()
	{
		$data['judul'] = 'Posisi';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['posisi'] = $this->db->get('posisi')->result_array();

		$this->form_validation->set_rules('posisi', 'Posisi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('perusahaan/posisi', $data);
			$this->load->view('template/footer');
		} else {
			$data = [
				'posisi' => $this->input->post('posisi'),
			];

			$this->db->insert('posisi', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Posisi baru ditambahkan</div>');
			redirect('perusahaan/posisi');
		}
	}

	public function updatePosisi($id)
	{
		$data = array(
			'posisi' => $this->input->post('posisiU'),
		);

		$this->db->where('id', $id);
		$this->db->update('posisi', $data);
		redirect('perusahaan/posisi');
	}

	public function deletePosisi($id)
	{
		$this->db->delete('posisi', array('id' => $id));
		redirect('perusahaan/posisi');
	}
}