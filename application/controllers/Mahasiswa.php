<?php

class Mahasiswa extends CI_Controller
{
    // Class Construct, selalu dipanggil di awal saat class Mahasiswa diinisialisasi
    public function __construct()
    {
        parent::__construct();
        // load model Mahasiswa_model, nanti semua method bisa load model tanpa ngeload manual lagi untuk setiap method || karna di construct
        $this->load->model("Mahasiswa_model");
        // load komponen library, form_validation untuk method tambah(create)
        $this->load->library("form_validation");
    }
    // Method index, menampilkan daftar mahasiswa dari tabel mahasiswa, READ
    public function index()
    {
        // load model tapi buat per method aja, ini di index.
        // $this->load->model('Mahasiswa_model');
        // judul halaman, disimpan di $data, dengan variabel judul || manggil di viewnya <?php echo $judul;? nanti
        $data["judul"] = "Daftar Mahasiswa";

        // mengambil semua data melalui model, method/fungsi getAllMahasiswa() || dikirim dengan variabel $mahasiswa melalui $data. di view foreach ($mahasiswa as $mhs):
        $data["mahasiswa"] = $this->Mahasiswa_model->getAllMahasiswa();

        // load view header, footer, index pada folder mahasiswa dan mengirimkan $data
        $this->load->view("templates/header", $data);
        $this->load->view("mahasiswa/index", $data);
        $this->load->view("templates/footer");
    }

    // Method tambah untuk create data mahasiswa, pakai form_validation serta rulenya.
    public function tambah()
    {
        $data["judul"] = "Form Tambah Data Mahasiswa";

        // Rules untuk form_validation
        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("nrp", "NRP", "required|numeric");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");

        // Pengkondisian form_validation, jika input salah, kembali ke view form input. jika input benar, menjalankan query untuk menambahkan data ke tabel mahasiswa
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header", $data);
            $this->load->view("mahasiswa/tambah");
            $this->load->view("templates/footer");
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            // flashdata, session flash dengan isi Ditambahkan
            $this->session->set_flashdata("flash", "Ditambahkan");
            // mengalihkan ke view mahasiswa
            redirect('mahasiswa');
        }
    }
}