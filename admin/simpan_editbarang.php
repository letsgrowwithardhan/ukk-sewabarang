<?php
include "koneksi.php";

$id_barang   = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori    = $_POST['kategori'];
$jml_barang  = $_POST['jml_barang'];
$tersedia    = $_POST['tersedia'];
$tgl_entry   = $_POST['tgl_entry'];

if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != "") {
    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $gambar      = $_FILES['gambar']['name'];
    move_uploaded_file($lokasi_file,"gambar/$gambar");

    $hasil = mysqli_query($konek, "UPDATE tbbarang SET 
        nama_barang='$nama_barang',
        kategori='$kategori',
        jml_barang='$jml_barang',
        tersedia='$tersedia',
        tgl_entry='$tgl_entry',
        gambar='$gambar'
        WHERE id_barang='$id_barang'");
} else {
    $hasil = mysqli_query($konek, "UPDATE tbbarang SET 
        nama_barang='$nama_barang',
        kategori='$kategori',
        jml_barang='$jml_barang',
        tersedia='$tersedia',
        tgl_entry='$tgl_entry'
        WHERE id_barang='$id_barang'");
}

if(!$hasil)
    die("Penyimpanan data gagal dilaksanakan");

print("<html><head><meta http-equiv='refresh' content='2;url=daftarbarang.php'></head><body></body></html>");
?>
