<?php
include "koneksi.php";

$no_transaksi      = $_POST['no_transaksi'];
$id_user           = $_POST['id_user'];
$nama              = $_POST['nama'] ?? '';
$id_barang         = $_POST['id_barang'];
$nama_barang       = $_POST['nama_barang'] ?? '';
$jml_pinjam        = $_POST['jml_pinjam'];
$tgl_pinjam        = $_POST['tgl_pinjam'];
$tgl_batas_kembali = $_POST['tgl_batas_kembali'];
$status            = $_POST['status'];

$query = "UPDATE tbpeminjaman SET 
    id_user='$id_user',
    id_barang='$id_barang',
    jml_pinjam='$jml_pinjam',
    tgl_pinjam='$tgl_pinjam',
    tgl_batas_kembali='$tgl_batas_kembali',
    status='$status'
    WHERE no_transaksi='$no_transaksi'
";


$hasil = mysqli_query($konek, $query);

if (!$hasil) {
    die("Penyimpanan data gagal: " . mysqli_error($konek));
}

echo "<script>
alert('Data berhasil diupdate');
window.location='daftarpinjam.php';
</script>";
?>
