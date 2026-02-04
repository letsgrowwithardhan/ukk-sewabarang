<?php
include "koneksi.php";

$no_transaksi        = $_POST['no_transaksi'];
$id_user             = $_POST['id_user'];
$id_barang           = $_POST['id_barang'];
$jml_pinjam          = $_POST['jml_pinjam'];
$tgl_pinjam          = $_POST['tgl_pinjam'];
$tgl_batas_kembali   = $_POST['tgl_batas_kembali'];
$tgl_kembali         = $_POST['tgl_kembali'];
$status              = 'pending_balik';

/* ===============================
   HITUNG DENDA OTOMATIS
   =============================== */

// tarif denda per hari
$tarif_denda = 5000;

// ubah ke timestamp
$batas = strtotime($tgl_batas_kembali);
$kembali = strtotime($tgl_kembali);

// default denda
$denda = 0;

// jika terlambat
if ($kembali > $batas) {
    $selisih_hari = ceil(($kembali - $batas) / (60 * 60 * 24));
    $denda = $selisih_hari * $tarif_denda;
}

/* ===============================
   UPDATE DATA PEMINJAMAN
   =============================== */

$hasil = mysqli_query($konek, "UPDATE tbpeminjaman SET 
    id_user='$id_user',
    id_barang='$id_barang',
    jml_pinjam='$jml_pinjam',
    tgl_pinjam='$tgl_pinjam',
    tgl_batas_kembali='$tgl_batas_kembali',
    status='$status',
    denda='$denda',
    tgl_kembali='$tgl_kembali'
    WHERE no_transaksi='$no_transaksi'
");

if(!$hasil){
    die("Penyimpanan data gagal dilaksanakan");
}

echo "<html>
<head>
<meta http-equiv='refresh' content='2;url=daftar_user_pinjam.php'>
</head>
<body></body>
</html>";
?>
