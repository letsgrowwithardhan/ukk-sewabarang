<?php
include "koneksi.php";
$id_barang   =$_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori    = $_POST['kategori'];
$jml_barang  = $_POST['jml_barang'];
$tersedia    = $jml_barang; // otomatis sama saat input awal
$tgl_entry   = date('Y-m-d');

// upload gambar
$lokasi_file = $_FILES['gambar']['tmp_name'];
$gambar      = $_FILES['gambar']['name'];

move_uploaded_file($lokasi_file, "gambar/$gambar");

// INSERT TANPA id_barang
$hasil = mysqli_query($konek, "
    INSERT INTO tbbarang 
    (id_barang, nama_barang, kategori, jml_barang, tersedia, tgl_entry, gambar) 
    VALUES 
    ('$id_barang', '$nama_barang', '$kategori', '$jml_barang', '$tersedia', '$tgl_entry', '$gambar')
");

if (!$hasil) {
    die("Penyimpanan data gagal");
}

echo "<html>
<head>
<meta http-equiv='refresh' content='2;url=finputbarang.php'>
</head>
<body></body>
</html>";
?>
