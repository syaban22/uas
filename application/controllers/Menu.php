<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}
	
	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('template/footer');
		}
		else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu baru ditambahkan</div>');
			redirect('menu');
		}
	}

	public function delete($id)
	{
		$this->db->delete('user_menu', array('id' => $id));
		redirect('menu');
	}

	public function update($id)
	{
		$data = array(
			'menu' => $this->input->post('menu')
		);

		$this->db->where('id', $id);
		$this->db->update('user_menu', $data);
		redirect('menu');
	}

	public function submenu()
	{
		$data['judul'] = 'SubMenu Management';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->model('Menu_model', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('template/footer');	
		}
		else{
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sub Menu baru ditambahkan</div>');
			redirect('menu/submenu');
		}
	}

	public function deletesm($id)
	{
		$this->db->delete('user_sub_menu', array('id' => $id));
		redirect('menu/submenu');
	}

	public function updatesm($id)
	{
		$data = array(
			'title' => $this->input->post('titleU'),
			'menu_id' => $this->input->post('menu_idU'),
			'url' => $this->input->post('urlU'),
			'icon' => $this->input->post('iconU'),
			'is_active' => $this->input->post('is_activeU')
		);

		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);
		redirect('menu/submenu');		
	}
}