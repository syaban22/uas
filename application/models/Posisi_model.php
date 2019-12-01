<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi_model extends CI_Model 
{
	public function getGaji()
	{
		$query = 
		"
		SELECT posisi.*, gaji.ket_gaji
		FROM posisi JOIN gaji
		ON posisi.id_gaji = gaji.id
		";

		return $this->db->query($query)->result_array();
	}
}