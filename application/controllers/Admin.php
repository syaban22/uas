<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->model('Pelamar_model', 'pelamarM');

		//$data['perusahaan'] = $this->pelamarM->getPerusahaan();
		$data['posisi'] = $this->db->get('posisi')->result_array();
		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();


		//filter
		// $no = $this->input->post('id_perus');
		// var_dump($no);
		//var_dump($nomor);
		//echo $perusahaan;
		//$per = $this->db->get_where('lamar_pekerjaan', ['perusahaan_id' => $perusahaan])->result();

		//print_r($per);

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama', $data['keyword']);
		$this->db->from('lamar_pekerjaan');
		$config['total_rows'] = $this->db->count_all_results();
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

		$data['pelamar'] = $this->pelamarM->getPelamar($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}
	public function updatePelamar($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('telepon'),
			'email' => $this->input->post('email'),
			'perusahaan_id' => $this->input->post('perusahaan'),
			'posisi_id' => $this->input->post('posisi')
		);

		$this->db->where('id', $id);
		$this->db->update('lamar_pekerjaan', $data);
		$this->session->set_flashdata('pesan', 'diubah');
		redirect('admin');
	}

	public function deletePelamar($id)
	{
		$this->db->delete('lamar_pekerjaan', array('id' => $id));
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('admin');
	}

	public function level()
	{
		$data['judul'] = 'Level';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['level'] = $this->db->get('user_level')->result_array();

		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/level', $data);
			$this->load->view('template/footer');
		} else {
			$this->db->insert('user_level', ['level' => $this->input->post('level')]);
			$this->session->set_flashdata('pesan', 'Level baru berhasil ditambahkan');
			redirect('admin/level');
		}
	}

	public function update($id)
	{
		$data = array(
			'level' => $this->input->post('levelU')
		);

		$this->db->where('id', $id);
		$this->db->update('user_level', $data);
		$this->session->set_flashdata('pesan', 'Edit data Level');
		redirect('admin/level');
	}

	public function delete($id)
	{
		$this->db->delete('user_level', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Level berhasil dihapus');
		redirect('admin/level');
	}

	public function levelakses($id)
	{
		$data['judul'] = 'Level Akses';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['level'] = $this->db->get_where('user_level', ['id' => $id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/level-akses', $data);
		$this->load->view('template/footer');
	}

	public function rubahakses()
	{
		$menu_id = $this->input->post('menuId');
		$level_id = $this->input->post('levelId');

		$data = [
			'role_id' => $level_id,
			'menu_id' => $menu_id
		];

		$hasil = $this->db->get_where('user_access_menu', $data);

		if ($hasil->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('pesan', 'Akses telah diganti');
	}

	public function perusahaan()
	{
		$data['judul'] = 'Perusahaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();

		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/perusahaan', $data);
			$this->load->view('template/footer');
		} else {
			$data = [
				'perusahaan' => $this->input->post('perusahaan'),
			];

			$this->db->insert('perusahaan', $data);
			$this->session->set_flashdata('pesan', 'Perusahaan baru berhasil ditambahkan');
			redirect('admin/perusahaan');
		}
	}

	public function updateP($id)
	{
		$data = array(
			'perusahaan' => $this->input->post('perusahaanU'),
		);

		$this->db->where('id', $id);
		$this->db->update('perusahaan', $data);
		$this->session->set_flashdata('pesan', 'Edit data Perusahaan berhasil');
		redirect('admin/perusahaan');
	}

	public function deleteP($id)
	{
		$this->db->delete('perusahaan', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Perusahaan berhasil dihapus');
		redirect('admin/perusahaan');
	}

	function get_file()
	{
		$id = $this->uri->segment(3);
		$get_db = $this->m_files->get_file_byid($id);
		$q = $get_db->row_array();
		$file = $q['file_data'];
		var_dump($file);
		$path = './asset/files/ktp/' . $file;
		$data = file_get_contents($path);
		$name = $file;
		force_download($name, $data);
	}

	function getUserlist()
	{
		$data['judul'] = 'User Lists';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->model('user_model', 'userM');
		$data['level'] = $this->db->get('user_level')->result_array();
		//$data['user'] = $this->db->from('user');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('username', $data['keyword']);
		$this->db->from('user');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['base_url'] = 'http://localhost/uas1/admin/getUserlist';

		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		if ($this->uri->segment(3) !== null) {
			$data['start'] = $this->uri->segment(3);
		} else {
			$data['start'] = 0;
		}

		$data['users'] = $this->userM->getUsers($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/ListUser', $data);
		$this->load->view('template/footer');
	}

	public function deleteU($id)
	{
		$this->db->delete('user', array('id' => $id));
		$this->session->set_flashdata('pesan', 'User berhasil dihapus');
		redirect('admin/getUserlist');
	}

	public function updateU($id)
	{
		var_dump($this->input->post('level'));
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'level_id' => $this->input->post('level'),
		);

		$this->db->where('id', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('pesan', 'Edit Data User berhasil');
		redirect('admin/getUserlist');
	}
}
