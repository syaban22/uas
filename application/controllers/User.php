<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('upload');
	}

	public function index()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function perusahaan()
	{
		$data['judul'] = 'Daftar Perusahaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/perusahaan', $data);
		$this->load->view('template/footer');
	}

	public function UbahFoto($id)
	{
		$config['upload_path']          = './asset/img/profile/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 0;
		$config['max_width']            = 500;
		$config['max_height']           = 500;
		$config['overwrite'] 			= TRUE;

		$this->upload->initialize($config);

		$this->upload->do_upload('UbahFoto');
		$gbr = $this->upload->data();
		$file = $gbr['file_name'];
		var_dump($file);

		$data = [
			'gambar' => $file,
		];
		if ($this->upload->do_upload('UbahFoto') == false) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Format Foto Salah</div>');
			redirect('user');
		} else {
			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Update Foto Berhasil</div>');
			redirect('user');
		}
	}

	public function lamarPekerjaan()
	{
		$data['judul'] = 'Lamar Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();
		$data['posisi'] = $this->db->get('posisi')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		// if (empty($_FILES['ktp']['ktp'])) {
		// 	$this->form_validation->set_rules('ktp', 'ktp', 'required');
		// }

		$config['upload_path']          = './asset/files/ktp/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 0;
		$config['encrypt_name']			= TRUE;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->upload->initialize($config);


		// $this->upload->do_upload('ktp');
		// $gbr = $this->upload->data();
		// $file = $gbr['file_name'];

		if ($this->form_validation->run() == false) {
			if (!$this->upload->do_upload('ktp')) {
				$data['error'] = $this->upload->display_errors();
			}
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('user/lamarPekerjaan', $data);
			$this->load->view('template/footer');
		} else {
			if (!$this->upload->do_upload('ktp')) {
				$data['error'] = $this->upload->display_errors();
				$this->load->view('template/header', $data);
				$this->load->view('template/sidebar', $data);
				$this->load->view('template/topbar', $data);
				$this->load->view('user/lamarPekerjaan', $data);
				$this->load->view('template/footer');
			} else {
				$this->upload->do_upload('ktp');
				$gbr = $this->upload->data();
				$file = $gbr['file_name'];
				$data = [
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'no_telp' => $this->input->post('telepon'),
					'email' => $this->input->post('email'),
					'perusahaan_id' => $this->input->post('perusahaan'),
					'posisi_id' => $this->input->post('posisi'),
					'file_data' => $file
				];

				$this->db->insert('lamar_pekerjaan', $data);
				$this->session->set_flashdata('pesan', 'berhasil dikirim');
				redirect('user');
			}
		}
	}
}
