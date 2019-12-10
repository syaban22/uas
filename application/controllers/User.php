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

		$data = [
			'gambar' => $file,
		];
		if ($this->upload->do_upload('UbahFoto') == false) {
			$this->session->set_flashdata('pesan', 'Format Foto Salah');
			redirect('user');
		} else {
			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('pesan', 'Update Foto Berhasil');
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

		$config['upload_path']          = './asset/files/ktp/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 0;
		$config['encrypt_name']			= TRUE;

		$this->upload->initialize($config);

		if ($this->form_validation->run() == false) {
			if (!$this->upload->do_upload('ktp')) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$data['error'] = "Complete validation above and upload it again";
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

	public function getStatus()
	{
		$data['judul'] = 'Status';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$usr = $this->session->userdata('email');

		$this->load->model('user_model', 'UsM');

		//$data['perusahaan'] = $this->pelamarM->getPerusahaan();
		$data['posisi'] = $this->db->get('posisi')->result_array();
		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();


		//filter
		$nomor = $this->input->post('data');
		//echo $perusahaan;
		//$per = $this->db->get_where('lamar_pekerjaan', ['perusahaan_id' => $perusahaan])->result();

		//print_r($per);

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		if ($data['keyword'] == NULL) {
			$this->db->like('email', $usr);
			$this->db->from('lamar_pekerjaan l, perusahaan p');
			$this->db->where('l.perusahaan_id = p.id');
		} else {
			$this->db->like('perusahaan', $data['keyword']);
			$this->db->from('lamar_pekerjaan, perusahaan');
			$this->db->where('lamar_pekerjaan.perusahaan_id = perusahaan.id');
			$this->db->where('lamar_pekerjaan.email', $usr);
		}
		$config['total_rows'] = $this->db->count_all_results();
		$config['base_url'] = 'http://localhost/uas/user/getStat';

		$data['total_rows'] = $config['total_rows'];
		// if ($perusahaan == 0) {
		// 	$perusahaan = 5;
		// }
		$config['per_page'] = 5;
		//$data['start'] = $this->uri->segment(3);
		//var_dump($this->input->post('num_rows'));


		// $data['jumlah_page'] = ceil($config['total_rows'] / $config['per_page']);
		// $data['page'] = ceil(($this->uri->segment(3) / $data['jumlah_page']));
		// if ($data['page'] == 0) {
		// 	$data['page'] = 1;
		// }

		$this->pagination->initialize($config);


		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['pelamar'] = $this->UsM->getStat($config['per_page'], $data['start'], $data['keyword'], $usr);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/getStatus', $data);
		$this->load->view('template/footer');
	}
}
