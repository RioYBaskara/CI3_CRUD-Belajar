<?php

class Peoples extends CI_Controller
{
    // READ || Menampilkan data dari tabel peoples menggunakan Model Peoples_model yang diberi alias peoples
    public function index()
    {
        $data["judul"] = "List of Peoples";

        $this->load->model('Peoples_model', 'peoples');

        // PAGINATION, load library
        $this->load->library('pagination');

        // ambil data search keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;

        // inisialisasi pagination sesuai konfigurasi pada $config
        $this->pagination->initialize($config);


        // toroubleshoot
        // var_dump($config['total_rows']);
        // die;

        // Mengambil data dari tabel peoples sesuai halaman pagination.
        $data['start'] = $this->uri->segment(3);
        $data["peoples"] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);

        // load view header, footer, index pada folder mahasiswa dan mengirimkan $data
        $this->load->view("templates/header", $data);
        $this->load->view("peoples/index", $data);
        $this->load->view("templates/footer");
    }
}