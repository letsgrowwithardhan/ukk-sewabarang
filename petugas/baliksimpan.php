<?php
include "koneksi.php";

// ===============================
// AMBIL NO TRANSAKSI DARI URL
// ===============================
$no_transaksi = $_GET['no_transaksi'] ?? '';

if ($no_transaksi == '') {
    die("No transaksi tidak ditemukan");
}

// ===============================
// AMBIL DATA PEMINJAMAN
// ===============================
$data = mysqli_query(
    $konek,
    "SELECT id_barang, jml_pinjam, status 
     FROM tbpeminjaman 
     WHERE no_transaksi='$no_transaksi'"
);

$p = mysqli_fetch_assoc($data);

if (!$p) {
    die("Data peminjaman tidak ditemukan");
}

// ===============================
// CEK STATUS (ANTI DOBEL)
// ===============================
if ($p['status'] == 'kembali') {
    echo "<script>
        alert('Barang sudah dikembalikan sebelumnya');
        window.location='daftar_konfirmasi_pinjam.php';
    </script>";
    exit;
}

// ===============================
// UPDATE STATUS PEMINJAMAN
// ===============================
$update = mysqli_query(
    $konek,
    "UPDATE tbpeminjaman 
     SET status='kembali', tgl_kembali=CURDATE()
     WHERE no_transaksi='$no_transaksi'"
);

if (!$update) {
    die("Gagal mengupdate status peminjaman");
}

// ===============================
// KEMBALIKAN STOK BARANG
// ===============================
$stok = mysqli_query(
    $konek,
    "UPDATE tbbarang 
     SET tersedia = tersedia + ".$p['jml_pinjam']." 
     WHERE id_barang='".$p['id_barang']."'"
);

if (!$stok) {
    die("Gagal mengembalikan stok barang");
}

// ===============================
// REDIRECT
// ===============================
echo "<script>
alert('Barang berhasil dikembalikan');
window.location='daftar_konfirmasi_pinjam.php';
</script>";
?>
