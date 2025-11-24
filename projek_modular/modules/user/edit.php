<?php
// modules/user/edit.php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../views/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($id <= 0){
    echo '<p>ID tidak valid</p>';
    require_once __DIR__ . '/../../views/footer.php';
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $harga_jual = intval($_POST['harga_jual'] ?? 0);
    $harga_beli = intval($_POST['harga_beli'] ?? 0);
    $stok = intval($_POST['stok'] ?? 0);

    // optional gambar update
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0){
        $uploadDir = __DIR__ . '/../../assets/img/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $filename = basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $filename);
        $gambar_sql = ", gambar='" . mysqli_real_escape_string($koneksi,$filename) . "'";
    } else {
        $gambar_sql = '';
    }

    $sql = "UPDATE data_barang SET kategori='" . mysqli_real_escape_string($koneksi,$kategori) . "', nama='" . mysqli_real_escape_string($koneksi,$nama) . "', harga_beli=" . $harga_beli . ", harga_jual=" . $harga_jual . ", stok=" . $stok . $gambar_sql . " WHERE id_barang=" . $id;
    if(mysqli_query($koneksi, $sql)){
       header("Location: index.php?page=user/list");
       exit;
    } else {
        echo '<p>Gagal update: ' . mysqli_error($koneksi) . '</p>';
    }
}

$res = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE id_barang=" . $id);
$row = mysqli_fetch_assoc($res);
if(!$row){
    echo '<p>Data tidak ditemukan</p>';
    require_once __DIR__ . '/../../views/footer.php';
    exit;
}
?>
<h1>Ubah Barang</h1>
<a href="index.php?page=user/list">Kembali ke list</a>
<form method="post" enctype="multipart/form-data">
    <label>Nama Barang
        <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
    </label>
    <label>Kategori
        <input type="text" name="kategori" value="<?php echo htmlspecialchars($row['kategori']); ?>" required>
    </label>
    <label>Harga Beli
        <input type="number" name="harga_beli" value="<?php echo htmlspecialchars($row['harga_beli']); ?>" required>
    </label>
    <label>Harga Jual
        <input type="number" name="harga_jual" value="<?php echo htmlspecialchars($row['harga_jual']); ?>" required>
    </label>
    <label>Stok
        <input type="number" name="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
    </label>
    <label>Gambar (biarkan kosong jika tidak ingin ganti)
        <input type="file" name="gambar" accept="image/*">
    </label>
    <button class="btn" type="submit">Simpan Perubahan</button>
</form>
<?php require_once __DIR__ . '/../../views/footer.php'; ?>
