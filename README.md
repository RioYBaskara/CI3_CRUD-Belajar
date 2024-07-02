## CRUD Tabel "Mahasiswa dan People" - Belajar

# CodeIgniter 3.1.9, Bootstrap 4

### Fitur Proyek
* CRUD untuk tabel Mahasiswa
* Search untuk tabel Mahasiswa
* Validasi Form, pesan error berbahasa indonesia
* Pagination untuk Tabel People
* ...

### Konfigurasi Database
Nama Database : phpmvc
```
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'phpmvc',
	'dbdriver' => 'mysqli',
```

### Tabel
Mahasiswa
Peoples

### Controller
Mahasiswa.php
Peoples.php

### Model
Peoples_model.php
Mahasiswa_model.php

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
