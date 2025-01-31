<!-- <?php var_dump($mahasiswa); ?> -->
<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashcreate') ?>"></div>
    <!-- flashdata create -->
    <!-- <?php if ($this->session->flashdata('flashcreate')): ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flashcreate'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
    <?php endif; ?>

    <!-- flashdata destroy -->
    <?php if ($this->session->flashdata('flashdestroy')): ?>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flashdestroy'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <!-- Form Cari data -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Cari Data Mahasiswa..." name="keyword"
                        autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if (empty($mahasiswa)): ?>
                <div class="alert alert-danger" role="alert">
                    Data mahasiswa tidak ditemukan!
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs): ?>
                    <li class="list-group-item">
                        <!-- <?= $mhs['id']; ?> -->
                        <?= $mhs['nama']; ?>
                        <!-- TOMBOL -->
                        <!-- tombol hapus -->
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>"
                            class="badge badge-danger float-right tombol-hapus">Hapus</a>
                        <!-- tombol ubah -->
                        <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id']; ?>"
                            class="badge badge-success float-right">Ubah</a>
                        <!-- tombol detail -->
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>"
                            class="badge badge-primary float-right">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>