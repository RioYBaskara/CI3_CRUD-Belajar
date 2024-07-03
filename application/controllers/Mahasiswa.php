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
    // READ || Menampilkan daftar mahasiswa dari tabel mahasiswa menggunakan Model Mahasiswa_model dan fungsi getAllMahasiswa()
    public function index()
    {
        // load model tapi buat per method aja, ini di index.
        // $this->load->model('Mahasiswa_model');
        // judul halaman, disimpan di $data, dengan variabel judul || manggil di viewnya <?php echo $judul;? nanti
        $data["judul"] = "Daftar Mahasiswa";

        // mengambil semua data melalui model, method/fungsi getAllMahasiswa() || dikirim dengan variabel $mahasiswa melalui $data. di view foreach ($mahasiswa as $mhs):
        $data["mahasiswa"] = $this->Mahasiswa_model->getAllMahasiswa();

        // jika keyword dalam method post ada *dari input index keyword, maka akan menjalankan fungsi cariDataMahasiswa() dari Model Mahasiswa_model
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }

        // load view header, footer, index pada folder mahasiswa dan mengirimkan $data
        $this->load->view("templates/header", $data);
        $this->load->view("mahasiswa/index", $data);
        $this->load->view("templates/footer");
    }

    // CREATE || Method tambah untuk create data mahasiswa, pakai form_validation serta rulenya. Menggunakan Model Mahasiswa_model tambahDataMahasiswa()
    public function tambah()
    {
        $data["judul"] = "Form Tambah Data Mahasiswa";

        // Rules untuk form_validation
        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("nrp", "NRP", "required|numeric");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");

        // CREATE || Pengkondisian form_validation, jika input salah, kembali ke view form input. jika input benar, menjalankan query untuk menambahkan data ke tabel mahasiswa lalu redirect dengan session, flashdata
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header", $data);
            $this->load->view("mahasiswa/tambah");
            $this->load->view("templates/footer");
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            // flashdata, session flash dengan isi Ditambahkan
            $this->session->set_flashdata("flashcreate", "Ditambahkan");
            // mengalihkan ke view mahasiswa
            redirect('mahasiswa');
        }
    }

    // DESTROY || menjalankan fungsi untuk menghapus data per id dari Model Mahasiswa_model hapusDataMahasiswa($id) lalu redirect dengan session, flashdata
    public function hapus($id)
    {
        // memanggil query destroy data per id yang ada pada Mahasiswa_model dengan method hapusDataMahasiswa() dengan parameter $id
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        // redirect dengan session flashdata
        $this->session->set_flashdata('flashcreate', 'Dihapus');
        redirect('mahasiswa');
    }

    // READ || menjalankan fungsi untuk select data per id menggunakan model Mahasiswa_model fungsi getMahasiswaById($id), flashdata
    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view("templates/header", $data);
        $this->load->view("mahasiswa/detail");
        $this->load->view("templates/footer");
    }

    // UPDATE || menjalankan fungsi untuk update data per id menggunakan model Mahasiswa_model fungsi ubahDataMahasiswa(), flash data. mengambil data tabel mahasiswa juga dengan getMahasiswaById($id) untuk menampilkan value data pada input form.
    public function ubah($id)
    {
        $data["judul"] = "Form Ubah Data Mahasiswa";
        $data["mahasiswa"] = $this->Mahasiswa_model->getMahasiswaById($id);
        // IDE ||| nanti jurusan dibikin tabel sendiri biar bisa nambah jurusan baru pakai crud form
        $data["jurusan"] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Pangan', 'Teknik Lingkungan'];

        // Rules untuk form_validation
        $this->form_validation->set_rules("nama", "Nama", "required");
        $this->form_validation->set_rules("nrp", "NRP", "required|numeric");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");

        // CREATE || Pengkondisian form_validation, jika input salah, kembali ke view form input. jika input benar, menjalankan query untuk menambahkan data ke tabel mahasiswa lalu redirect dengan session, flashdata
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("templates/header", $data);
            $this->load->view("mahasiswa/ubah", $data);
            $this->load->view("templates/footer");
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            // flashdata, session flash dengan isi Diubah
            $this->session->set_flashdata("flashcreate", "Diubah");
            // mengalihkan ke view mahasiswa
            redirect('mahasiswa');
        }
    }
}