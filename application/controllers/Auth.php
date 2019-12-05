<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('captcha', 'captcha', 'trim|callback_check_captcha|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login', array(
				'img' => $this->create_captcha()
			));
			$this->load->view('template/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// mengecek user didalam database
		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// cek jika user ada
		if ($user) {
			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'level_id' => $user['level_id'],
					'nama' => $user['nama']
				];

				$this->session->set_userdata($data);
				if ($user['level_id'] == 1) {
					redirect('admin');
				} else if ($user['level_id'] == 2) {
					redirect('perusahaan');
				} else if ($user['level_id'] == 3) {
					redirect('user');
				} else if ($user['level_id'] == 4) {
					redirect('publik');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function create_captcha()
	{
		$options = array(
			'img_path' => './captcha/',
			'img_url' => base_url('captcha/'),
			'img_width' => '295',
			'img_height' => '50',
			'expiration' => 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];

		$this->session->set_userdata('captchaword', $cap['word']);

		return $image;
	}

	public function refresh_captcha()
	{
		$options = array(
			'img_path' => './captcha/',
			'img_url' => base_url('captcha/'),
			'img_width' => '295',
			'img_height' => '50',
			'expiration' => 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];

		$this->session->set_userdata('captchaword', $cap['word']);

		echo $cap['image'];
		return $image;
	}

	public function check_captcha()
	{
		if ($this->input->post('captcha') == $this->session->userdata('captchaword')) {
			return true;
		} else {
			$this->form_validation->set_message('check_captcha', 'Captcha is wrong');
			return false;
		}
	}

	public function registration()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', ['matches' => 'password tidak sama!', 'min_length' => 'password terlalu pendek']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registrasi Pelamar Baru';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('template/auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('name', true)),
				'gambar' => 'default.jpg',
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level_id' => 3,
				'tgl_buat' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pendaftaran Sukses!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level_id');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logout berhasil</div>');
		redirect('auth');
	}

	public function block()
	{
		$this->load->view('auth/block');
	}
}
