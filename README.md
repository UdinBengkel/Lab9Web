# Praktikum 9: PHP Modular

## Nama: Syafarudiansya
## NIM: 312410381
## Kelas: TI 24 A6

### Langkah-langkah Pratikum

#### 1. header.php
```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Contoh Modularisasi</title>
    <link
      href="style.css"
      rel="stylesheet"
      type="text/stylesheet"
      media="screen"
    />
  </head>
  <body>
    <div class="container">
      <header>
        <h1>Modularisasi Menggunakan Require</h1>
      </header>
      <nav>
        <a href="home.php">Home</a>
        <a href="about.php">Tentang</a>
        <a href="kontak.php">Kontak</a>
      </nav>
    </div>
  </body>
</html>
```
#### 2. footer.php
```html
        <footer>
            <p>&copy; 2021, Informatika, Universitas Pelita Bangsa</p>
        </footer>
    </div>
</body>
</html>
```
#### 3. home.php
```php
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman Home</h2>
    <p>Ini adalah bagian content dari halaman.</p>
</div>

<?php require('footer.php'); ?>
```
#### 4. about.php
```php
<?php require('header.php'); ?>

<div class="content">
    <h2>Ini Halaman About</h2>
    <p>Ini adalah bagian content dari halaman.</p>
</div>

<?php require('footer.php'); ?>
```

<img src="gambar/1.png" width="500"/>

### Pertanyaan dan Tugas
Implementasikan konsep modularisasi pada kode program praktikum 8 tentang database,
sehingga setiap halamannya memiliki template tampilan yang sama. Dan terapkan
penggunaan Routing agar project menjadi lebih modular.
Gunakan struktur direktory seperti berikut:

project/
├── index.php
├── config/
│   └── database.php
├── views/
│   ├── header.php
│   ├── footer.php
│   └── dashboard.php
├── modules/
│   ├── user/
│   │   ├── list.php
│   │   └── add.php
│   └── auth/
│       ├── login.php
│       └── logout.php
└── assets/
    ├── css/
    └── js/

Routing menggunakan url: index.php?page=user/list
Opsional: Gunakan htaccess agar url lebih SEO Friendly.
Contoh URL: (base-domain)/user/list

### Jawaban:

#### Tampilan Awal
<img src="gambar/2.png" width="500"/>

#### Tambah Barang
<img src="gambar/3.png" width="500"/>
<img src="gambar/4.png" width="500"/>

#### Ubah
<img src="gambar/5.png" width="500"/>
<img src="gambar/6.png" width="500"/>

#### Hapus (dan bisa terlihat routingnya seperti contoh URL yang ada di Pertanyaan dan Tugas)
<img src="gambar/7.png" width="500"/>
<img src="gambar/8.png" width="500"/>
