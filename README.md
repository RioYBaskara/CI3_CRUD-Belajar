# CodeIgniter3-Belajar

## CodeIgniter 3.1.9, Bootstrap 4

### Fitur Proyek
* CRUD untuk tabel Mahasiswa
* Search untuk tabel Mahasiswa dan people
* Validasi Form, pesan error berbahasa indonesia
* Pagination untuk Tabel People
* Alert menggunakan SweetAlert2
* ...

### Framework dan Library
* CodeIgniter3
* Bootstrap4
* SweetAlert2
* Jquery3

### Konfigurasi Database
* Nama Database : phpmvc
```
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'phpmvc',
	'dbdriver' => 'mysqli',
```

### Tabel
* Mahasiswa
* Peoples

### Controller
* Mahasiswa.php
* Peoples.php

### Model
* Peoples_model.php
* Mahasiswa_model.php

### autoload.php
* libraries : database, session
```
$autoload['libraries'] = array('database', 'session');
```
* helper : url
```
$autoload['helper'] = array('url');
```

### config.php
* $config['base_url'] = 'http://localhost/ci-app/';
* $config['index_page'] = ''; 

### pagination.php
* konfigurasi pagination, serta styling menggunakna bootstrap4
```
<?php
//Konfigurasi Pagination
$config['base_url'] = "http://localhost/ci-app/peoples/index";
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
```

### .htaccess
```
<IfModule authz_core_module>
    Require all denied
</IfModule>
<IfModule !authz_core_module>
    Deny from all
</IfModule>
```

### note
* beberapa kode php menggunakan shorthand.
