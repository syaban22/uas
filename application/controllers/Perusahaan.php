<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
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

		$this->load->model('Posisi_model', 'posisi');

		$data['gaji'] = $this->posisi->getGaji();
		$data['posisi'] = $this->db->get('posisi')->result_array();
		$data['gajii'] = $this->db->get('gaji')->result_array();

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
				'id_gaji' => $this->input->post('gaji')
			];

			$this->db->insert('posisi', $data);
			$this->session->set_flashdata('pesan', 'Posisi baru berhasil ditambahkan');
			redirect('perusahaan/posisi');
		}
	}

	public function updatePosisi($id)
	{
		$data = array(
			'posisi' => $this->input->post('posisiU'),
			'id_gaji' => $this->input->post('gajiU')
		);

		$this->db->where('id', $id);
		$this->db->update('posisi', $data);
		$this->session->set_flashdata('pesan', 'Edit Data posisi berhasil');
		redirect('perusahaan/posisi');
	}

	public function deletePosisi($id)
	{
		$this->db->delete('posisi', array('id' => $id));
		$this->session->set_flashdata('pesan', 'Posisi berhasil dihapus');
		redirect('perusahaan/posisi');
	}

	public function getPelamar()
	{
		$data['judul'] = 'List Pelamar';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$perus = $this->session->userdata('nama');

		$this->load->model('Pelamar_model', 'pelamarM');

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
			$this->db->like('perusahaan', $perus);
			$this->db->from('lamar_pekerjaan l, perusahaan p');
			$this->db->where('l.perusahaan_id = p.id');
		} else {
			$this->db->like('nama', $data['keyword']);
			$this->db->from('lamar_pekerjaan, perusahaan');
			$this->db->where('lamar_pekerjaan.perusahaan_id = perusahaan.id');
			$this->db->where('perusahaan.perusahaan', $perus);
		}
		$config['total_rows'] = $this->db->count_all_results();
		$config['base_url'] = 'http://localhost/uas/perusahaan/getPelamar';

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

		$data['pelamar'] = $this->pelamarM->getPelamar2($config['per_page'], $data['start'], $data['keyword'], $perus);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('perusahaan/listPelamar', $data);
		$this->load->view('template/footer');
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

	public function Export()
	{
		$perus = $this->session->userdata('nama');
		$this->load->model('Pelamar_model', 'pelamarM');
		$data['pelamar'] = $this->pelamarM->export($perus);



		$object = new PHPExcel();

		$object->getProperties()->setCreator("Online Job Application 2019");
		$object->getProperties()->setLastModifiedBy("Online Job Application 2019");
		$object->getProperties()->setTitle("Daftar Pelamar");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'NAMA');
		$object->getActiveSheet()->setCellValue('C1', 'ALAMAT');
		$object->getActiveSheet()->setCellValue('D1', 'NO TELEPON');
		$object->getActiveSheet()->setCellValue('E1', 'EMAIL');
		$object->getActiveSheet()->setCellValue('F1', 'PERUSAHAAN');
		$object->getActiveSheet()->setCellValue('G1', 'POSISI');

		$baris = 2;
		$no = 1;

		foreach ($data['pelamar'] as $pl) {
			$object->getActiveSheet()->setCellValue('A' . $baris, $no++);
			$object->getActiveSheet()->setCellValue('B' . $baris, $pl->nama);
			$object->getActiveSheet()->setCellValue('C' . $baris, $pl->alamat);
			$object->getActiveSheet()->setCellValue('D' . $baris, $pl->no_telp);
			$object->getActiveSheet()->setCellValue('E' . $baris, $pl->email);
			$object->getActiveSheet()->setCellValue('F' . $baris, $pl->perusahaan);
			$object->getActiveSheet()->setCellValue('G' . $baris, $pl->posisi);

			$baris++;
		}

		$filename = "Data_Pelamar_" . "$perus" . '.xlsx';

		$object->getActiveSheet()->setTitle("Data Pelamar");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');
		exit;
	}
}
