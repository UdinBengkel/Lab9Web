<?php
// modules/user/add.php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../views/header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $harga_jual = $_POST['harga_jual'] ?? 0;
    $harga_beli = $_POST['harga_beli'] ?? 0;
    $stok = $_POST['stok'] ?? 0;
    $gambar = '';

    // simple file upload handling if image provided
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0){
        $uploadDir = __DIR__ . '/../../assets/img/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $filename = basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $filename);
        $gambar = $filename;
    }

    $sql = "INSERT INTO data_barang (kategori,nama,gambar,harga_beli,harga_jual,stok) VALUES ('" . mysqli_real_escape_string($koneksi,$kategori) . "','" . mysqli_real_escape_string($koneksi,$nama) . "','" . mysqli_real_escape_string($koneksi,$gambar) . "'," . intval($harga_beli) . "," . intval($harga_jual) . "," . intval($stok) . ")";
    if(mysqli_query($koneksi, $sql)){
        header("Location: index.php?page=user/list");
        exit;
    } else {
        echo '<p>Gagal menyimpan: ' . mysqli_error($koneksi) . '</p>';
    }
}
?>
<h1>Tambah Barang</h1>
<a href="index.php?page=user/list">Kembali ke list</a>
<form method="post" enctype="multipart/form-data">
    <label>Nama Barang
        <input type="text" name="nama" required>
    </label>
    <label>Kategori
        <input type="text" name="kategori" required>
    </label>
    <label>Harga Beli
        <input type="number" name="harga_beli" required>
    </label>
    <label>Harga Jual
        <input type="number" name="harga_jual" required>
    </label>
    <label>Stok
        <input type="number" name="stok" required>
    </label>
    <label>Gambar
        <input type="file" name="gambar" accept="image/*">
    </label>
    <button class="btn" type="submit">Simpan</button>
</form>
<?php require_once __DIR__ . '/../../views/footer.php'; ?>
