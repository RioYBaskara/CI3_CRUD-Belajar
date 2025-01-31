<?php

class Mahasiswa_model extends CI_Model
{
    // Read Data Tabel Mahasiswa, dikrim dalam bentuk array
    public function getAllMahasiswa()
    {
        // *select/read tabel mahasiswa
        return $this->db->get('mahasiswa')->result_array();
    }

    // Create Tambah Data Tabel Mahasiswa 
    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post("nama", true),
            "nrp" => $this->input->post("nrp", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true)
        ];
        // *insert/create tabel mahasiswa
        $this->db->insert("mahasiswa", $data);
    }

    // Destroy Data Tabel Mahasiswa per id/parameter $id
    public function hapusDataMahasiswa($id)
    {
        // query delete berdasarkan id dari parameter $id
        // $this->db->where("id", $id);
        $this->db->delete("mahasiswa", ["id" => $id]);
    }

    // Detail Data Tabel Mahasiswa per id/parameter $id
    public function getMahasiswaById($id)
    {
        // $this->db->where("id", $id);
        // $this->db->select("mahasiswa");

        // query builder untuk select mahasiswa WHERE $id, dikirim dalam bentuk array row
        return $this->db->get_where("mahasiswa", ['id' => $id])->row_array();
    }

    // Update Data Tabel Mahasiswa per id, dari input hidden form pada view
    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post("nama", true),
            "nrp" => $this->input->post("nrp", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true)
        ];

        // query builder untuk update mahasiswa WHERE $id
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }

    // Search Data Tabel Mahasiswa diambil dari input keyword view index
    public function cariDataMahasiswa()
    {
        // query builder untuk mencari data yang menyerupai(like) tabel mahasiswa
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        // return data dalam bentuk array
        return $this->db->get('mahasiswa')->result_array();
    }
}