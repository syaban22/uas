<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
	/*
	 public function getPerusahaan()
	{
		$query =
			"
		SELECT * FROM lamar_pekerjaan l, perusahaan, posisi p WHERE l.perusahaan_id = perusahaan.id and l.posisi_id=p.id
		";

		return $this->db->query($query)->result_array();
	}
**/

	public function getPelamar($limit, $start, $keyword = null)
	{
		if ($keyword !== null) {
			$query =
				"
			SELECT l.id, l.nama, l.alamat, l.no_telp, l.email, l.posisi_id, l.perusahaan_id, pe.perusahaan, p.posisi as posisi, l.file_data FROM lamar_pekerjaan l, perusahaan pe, posisi p WHERE l.perusahaan_id = pe.id and l.posisi_id=p.id and l.nama LIKE '%$keyword%' limit $start, $limit
		";
		} else {
			$query =
				"
			SELECT l.id, l.nama, l.alamat, l.no_telp, l.email, l.posisi_id, l.perusahaan_id, pe.perusahaan, p.posisi as posisi, l.file_data FROM lamar_pekerjaan l, perusahaan pe, posisi p WHERE l.perusahaan_id = pe.id and l.posisi_id=p.id limit $start, $limit
		";
		}
		return $this->db->query($query, $limit, $start, $keyword)->result_array();
	}

	public function getPelamar2($limit, $start, $keyword = null, $perus)
	{
		if ($keyword !== null) {
			$query =
				"
			SELECT l.id, l.nama, l.alamat, l.no_telp, l.email, l.posisi_id, l.perusahaan_id, pe.perusahaan, p.posisi as posisi, l.file_data FROM lamar_pekerjaan l, perusahaan pe, posisi p WHERE l.perusahaan_id = pe.id and l.posisi_id=p.id and pe.perusahaan = '$perus' and l.nama LIKE '%$keyword%' limit $start, $limit
		";
		} else {
			$query =
				"
			SELECT l.id, l.nama, l.alamat, l.no_telp, l.email, l.posisi_id, l.perusahaan_id, pe.perusahaan, p.posisi as posisi, l.file_data FROM lamar_pekerjaan l, perusahaan pe, posisi p WHERE l.perusahaan_id = pe.id and l.posisi_id=p.id and pe.perusahaan = '$perus' limit $start, $limit
		";
		}
		return $this->db->query($query, $limit, $start, $keyword, $perus)->result_array();
	}

	public function export($perus)
	{
		$query = "SELECT l.id, l.nama, l.alamat, l.no_telp, l.email, pe.perusahaan, p.posisi as posisi, l.file_data FROM lamar_pekerjaan l, perusahaan pe, posisi p WHERE l.perusahaan_id = pe.id and l.posisi_id=p.id and pe.perusahaan = '$perus'";
		return $this->db->query($query, $perus)->result();
	}

	public function countAllPelamar()
	{

		return $this->db->get('lamar_pekerjaan')->num_rows();
	}

	public function All($limit, $start)
	{
		return $this->db->get('lamar_pekerjaan', $limit, $start)->result_array();
	}
}
