## CRUD Single Table "Mahasiswa" - Belajar

# CodeIgniter 3.1.9, Bootstrap 4

### Fitur Proyek
* CRUD (On progress)
* Validasi Form, pesan error berbahasa indonesia
* flash data
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

### Controller
Mahasiswa.php

### Model
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

###note
* beberapa kode php menggunakan shorthand.
