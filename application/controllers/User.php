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
		$data['judul'] = 'Home';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$em = $this->session->userdata('email');

		$this->db->select_sum('cek');
		$this->db->from('lamar_pekerjaan');
		$this->db->where('email', $em);
		$query = $this->db->get();
		$data['stat'] = $query->row()->cek;


		$this->load->view('template/header_UserHome', $data);
		// $this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar_UserHome', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}

	public function Profile()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$em = $this->session->userdata('email');
		$this->db->select_sum('cek');
		$this->db->from('lamar_pekerjaan');
		$this->db->where('email', $em);
		$query = $this->db->get();
		$data['stat'] = $query->row()->cek;

		$this->session->unset_userdata('kerja');
		$this->session->unset_userdata('perusahaan');

		$this->session->set_userdata('stat', $data['stat']);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar_user', $data);
		$this->load->view('user/UserProfile', $data);
		$this->load->view('template/footer');
	}

	public function JobItem()
	{
		$data['judul'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();

		$data['stat'] = $this->session->userdata('stat');

		$this->session->set_userdata('kerja', $this->input->get('job'));

		$this->load->model('Posisi_model', 'posisi');
		$job = $this->input->get('job');
		$data['gaji'] = $this->posisi->Gaji($job);

		$data['posisi'] = $this->db->get_where('posisi', [
			'id' => $this->input->get('job')
		])->result_array();

		$this->load->view('template/header_UserHome', $data);
		// $this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar_UserHome', $data);
		$this->load->view('user/job', $data);
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

	public function DetailPerusahaan()
	{
		$data['judul'] = 'Daftar Perusahaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['detail'] = $this->db->get_where('profile_perusahaan', ['id_perusahaan' => $this->input->get('perusahaan')])->row_array();
		$data['nama'] = $this->db->get_where('perusahaan', ['id' => $this->input->get('perusahaan')])->row_array();

		$this->session->set_userdata('perusahaan', $this->input->get('perusahaan'));

		$this->load->view('template/header_perusahaan', $data);
		// $this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/WebPerusahaan', $data);
		$this->load->view('template/footer_perusahaan');
	}

	public function UbahFoto($id)
	{
		$config['upload_path']          = './asset/img/profile/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 2000;
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
			redirect('user/Profile');
		} else {
			$old_img = $data['user']['gambar'];
			if ($old_img != 'default.jpg') {
				unlink(FCPATH . '/asset/img/profile/' . $old_img);
			}

			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('pesan', 'Update Foto Berhasil');
			redirect('user/Profile');
		}
	}

	public function lamarPekerjaan()
	{
		$data['judul'] = 'Lamar Pekerjaan';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$em = $this->session->userdata('email');
		$this->db->select_sum('cek');
		$this->db->from('lamar_pekerjaan');
		$this->db->where('email', $em);
		$query = $this->db->get();
		$data['stat'] = $query->row()->cek;

		$data['perusahaan'] = $this->db->get('perusahaan')->result_array();
		$data['posisi'] = $this->db->get('posisi')->result_array();
		$data['jenis'] = $this->db->get('jenkel')->result_array();

		$data['perr'] = $this->db->get_where('perusahaan', ['id' => $this->session->userdata('perusahaan')])->row_array();
		$data['per'] = $data['perr']['perusahaan'];

		$this->form_validation->set_rules(
			'nama',
			'Nama',
			'required|min_length[2]',
			array(
				'required' => 'Nama tidak boleh kosong',
				'min_length' => 'Nama setidaknya lebih dari 1 karakter'
			)
		);
		$this->form_validation->set_rules(
			'alamat',
			'Alamat',
			'required|min_length[2]',
			array(
				'required' => 'Alamat tidak boleh kosong',
				'min_length' => 'Alamat setidaknya lebih dari 1 karakter'
			)
		);
		$this->form_validation->set_rules(
			'telepon',
			'Telepon',
			'required|min_length[8]',
			array(
				'required' => 'No Telepon tidak boleh kosong',
				'min_length' => 'Nomor telepon tidak valid'
			)
		);
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('jenkel', 'Jenkel', 'required');

		$config['upload_path']          = './asset/files/ktp/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 2000;
		$config['encrypt_name']			= TRUE;

		$this->upload->initialize($config);

		if ($this->form_validation->run() == false) {
			if (!$this->upload->do_upload('ktp')) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$data['error'] = "Complete validation above and upload it again";
				$this->session->set_flashdata('pesan', 'perhatikan');
			}
			$data['posisi_id'] = $this->session->userdata('kerja');
			$data['perusahaan_id'] = $this->session->userdata('perusahaan');
			$this->load->view('template/header_Pekerjaan', $data);
			// $this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar_UserHome', $data);
			$this->load->view('user/lamarPekerjaan', $data);
			$this->load->view('template/footer');
		} else {
			if (!$this->upload->do_upload('ktp')) {
				$this->session->set_flashdata('pesan', 'perhatikan');
				$data['error'] = $this->upload->display_errors();
				$data['posisi_id'] = $this->session->userdata('kerja');
				$data['perusahaan_id'] = $this->session->userdata('perusahaan');
				$this->load->view('template/header_Pekerjaan', $data);
				// $this->load->view('template/sidebar', $data);
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
					'file_data' => $file,
					'status' => '1',
					'jenkel' => $this->input->post('jenkel')
				];

				$this->db->insert('lamar_pekerjaan', $data);
				$this->session->set_flashdata('pesan', 'berhasil dikirim');
				redirect('user/Profile');
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

		$cek = array(
			'cek' => $this->input->get('st'),
		);

		// $this->db->where('id', $id);
		$this->db->update('lamar_pekerjaan', $cek);


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

	public function changePassword()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$em = $this->session->userdata('email');

		$this->db->select_sum('cek');
		$this->db->from('lamar_pekerjaan');
		$this->db->where('email', $em);
		$query = $this->db->get();
		$data['stat'] = $query->row()->cek;

		$this->form_validation->set_rules('curpass', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules(
			'newpass',
			'Password Baru',
			'required|trim|min_length[8]|matches[conpass]',
			array(
				'matches' => 'Password Baru dan Konfirmasi Password Baru tidak sama',
				'min_length' => 'Password setidaknya 8 karakter'
			)
		);
		$this->form_validation->set_rules(
			'conpass',
			'Konfirmasi Password',
			'required|trim|min_length[8]|matches[newpass]',
			array(
				'matches' => 'Password Baru dan Konfirmasi Password Baru tidak sama',
				'min_length' => 'Konfirmasi Password dan Password Baru harus memiliki jumlah karakter yang sama'
			)
		);

		if ($this->form_validation->run() == false) {
			// $this->session->set_flashdata('mt', '<div class="alert alert-danger" role="alert">Update Password Gagal, harap periksa kembali.</div>');
			$this->session->set_flashdata('pesan', 'Gagal pass');
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar_user', $data);
			$this->load->view('user/UserProfile', $data);
			$this->load->view('template/footer');
		} else {
			$curpass = $this->input->post('curpass');
			$newpass = $this->input->post('newpass');
			if (!password_verify($curpass, $data['user']['password'])) {
				$this->session->set_flashdata('ms', '<div class="alert-danger" role="alert">Password Lama Salah!</div>');
				$this->session->set_flashdata('pesan', 'Gagal pass');
				redirect('user/Profile');
			} else {
				if ($curpass == $newpass) {
					$this->session->set_flashdata('msg', '<div class="alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Lama!</div>');
					$this->session->set_flashdata('pesan', 'Gagal pass');
					redirect('user/Profile');
				} else {
					$pass_hash = password_hash($newpass, PASSWORD_DEFAULT);

					$this->db->set('password', $pass_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('pesan', 'Ubah Password Berhasil');
					redirect('user/Profile');
				}
			}
		}
	}
}
