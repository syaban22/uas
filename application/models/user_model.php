<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getUsers($limit, $start, $keyword = null)
    {
        if ($keyword !== null) {
            $query =
                "
			SELECT u.id, u.nama, u.gambar, u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id and u.username LIKE '%$keyword%' limit $start, $limit
		";
        } else {
            $query =
                "
			SELECT u.id, u.nama, u.gambar, u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id limit $start, $limit
		";
        }
        return $this->db->query($query, $limit, $start, $keyword)->result_array();
    }

    public function getStat($limit, $start, $keyword = null, $usr)
    {
        if ($keyword !== null) {
            $query =
                "
			SELECT l.id, l.email, pe.perusahaan, p.posisi as posisi, s.ket_status as status FROM lamar_pekerjaan l, perusahaan pe, posisi p, status_user s WHERE l.perusahaan_id = pe.id and l.status = s.id and l.posisi_id=p.id and l.email = '$usr' and pe.perusahaan LIKE '%$keyword%' limit $start, $limit
		";
        } else {
            $query =
                "
			SELECT l.id, l.email, pe.perusahaan, p.posisi as posisi, s.ket_status as status FROM lamar_pekerjaan l, perusahaan pe, posisi p, status_user s WHERE l.perusahaan_id = pe.id and l.status = s.id and l.posisi_id=p.id and l.email = '$usr' limit $start, $limit
		";
        }
        return $this->db->query($query, $limit, $start, $keyword, $usr)->result_array();
    }
}
