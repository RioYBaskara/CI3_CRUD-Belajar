<?php

class Peoples_model extends CI_Model
{
    // ga kepake
    // public function getAllPeoples()
    // {
    //     return $this->db->get("peoples")->result_array();
    // }

    // fungsi untuk mengambil data dengan aturan pagination, limit dan start, dikirim dalam bentuk array
    public function getPeoples($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like("name", $keyword);
            $this->db->or_like("email", $keyword);
        }
        return $this->db->get("peoples", $limit, $start)->result_array();
    }

    // mengambil jumlah row data pada tabel peoples
    public function countAllPeoples()
    {
        return $this->db->get('peoples')->num_rows();
    }
}