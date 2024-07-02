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

        //Konfigurasi Pagination
        $config['base_url'] = "http://localhost/ci-app/peoples/index";
        // memanggil fungsi countAllPeoples() untuk mengambil jumlah row data
        $config['total_rows'] = $this->peoples->countAllPeoples();
        $config['per_page'] = 12;
        $config['num_links'] = 6;

        //styling pagination, ribet bgt Ya Allah
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_open'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_open'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // inisialisasi pagination sesuai konfigurasi pada $config
        $this->pagination->initialize($config);


        // toroubleshoot
        // var_dump($config['total_rows']);
        // die;

        // Mengambil data dari tabel peoples sesuai halaman pagination.
        $data['start'] = $this->uri->segment(3);
        $data["peoples"] = $this->peoples->getPeoples($config['per_page'], $data['start']);

        // load view header, footer, index pada folder mahasiswa dan mengirimkan $data
        $this->load->view("templates/header", $data);
        $this->load->view("peoples/index", $data);
        $this->load->view("templates/footer");
    }
}