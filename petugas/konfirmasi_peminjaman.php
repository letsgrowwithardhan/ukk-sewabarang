<?php
include "koneksi.php";

$no_transaksi = $_GET['no_transaksi'] ?? '';

if ($no_transaksi == '') {
    die("No transaksi tidak ditemukan");
}

/* ===============================
   AMBIL DATA PEMINJAMAN
   =============================== */
$data = mysqli_query(
    $konek,
    "SELECT id_barang, jml_pinjam, status 
     FROM tbpeminjaman 
     WHERE no_transaksi='$no_transaksi'"
);

$row = mysqli_fetch_assoc($data);

if (!$row) {
    die("Data peminjaman tidak ditemukan");
}

$id_barang  = $row['id_barang'];
$jml_pinjam = $row['jml_pinjam'];
$status     = $row['status'];

/* ===============================
   CEK STATUS (ANTI DOBEL)
   =============================== */
if ($status == 'tersewa') {
    echo "<script>
        alert('Peminjaman ini sudah dikonfirmasi sebelumnya');
        window.location='daftar_konfirmasi_pinjam.php';
    </script>";
    exit;
}

/* ===============================
   UPDATE STATUS PEMINJAMAN
   =============================== */
$update_peminjaman = mysqli_query(
    $konek,
    "UPDATE tbpeminjaman 
     SET status='tersewa'
     WHERE no_transaksi='$no_transaksi'"
);

/* ===============================
   KURANGI STOK BARANG (SATU KALI)
   =============================== */
$update_barang = mysqli_query(
    $konek,
    "UPDATE tbbarang 
     SET tersedia = tersedia - $jml_pinjam 
     WHERE id_barang='$id_barang'"
);

/* ===============================
   CEK HASIL
   =============================== */
if (!$update_peminjaman || !$update_barang) {
    die("Gagal mengupdate data peminjaman atau stok barang");
}

/* ===============================
   REDIRECT
   =============================== */
echo "<script>
alert('Peminjaman berhasil dikonfirmasi');
window.location='daftar_konfirmasi_pinjam.php';
</script>";
?>
