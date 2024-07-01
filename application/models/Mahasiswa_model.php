<?php

class Mahasiswa_model extends CI_Model
{
    // Read Data Tabel Mahasiswa, disimpan ke array
    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    // Create Tambah Data Mahasiswa
    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post("nama", true),
            "nrp" => $this->input->post("nrp", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true)
        ];
    }
}