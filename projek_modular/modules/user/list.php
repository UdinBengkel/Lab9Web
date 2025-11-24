<?php
// modules/user/list.php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../views/header.php';
?>
<h1>Data Barang</h1>
<a href="index.php?page=user/add">Tambah Barang</a>
<table>
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM data_barang ORDER BY id_barang ASC";
$res = mysqli_query($koneksi, $sql);
if($res){
    while($row = mysqli_fetch_assoc($res)){
        echo '<tr>';
        echo '<td>' . (!empty($row['gambar']) ? '<img src="assets/img/'.htmlspecialchars($row['gambar']).'" alt="" style="max-width:80px;">' : '') . '</td>';
        echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
        echo '<td>' . htmlspecialchars($row['kategori']) . '</td>';
        echo '<td>' . htmlspecialchars($row['harga_jual']) . '</td>';
        echo '<td>' . htmlspecialchars($row['harga_beli']) . '</td>';
        echo '<td>' . htmlspecialchars($row['stok']) . '</td>';
        echo '<td class="actions"><a href="index.php?page=user/edit&id=' . urlencode($row['id_barang']) . '">Ubah</a> | <a href="index.php?page=user/delete&id=' . urlencode($row['id_barang']) . '" onclick="return confirm(\'Hapus data?\')">Hapus</a></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="7">Tidak ada data.</td></tr>';
}
?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../../views/footer.php'; ?>
