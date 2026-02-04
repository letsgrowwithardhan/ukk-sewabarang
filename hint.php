<?php
// Memanggil file koneksi database
include "koneksi.php";

// Menangkap data yang dikirim dari form menggunakan metode POST
$no_transaksi        = $_POST['no_transaksi'];        // Nomor transaksi peminjaman
$id_user             = $_POST['id_user'];             // ID user/peminjam
$id_barang           = $_POST['id_barang'];           // ID barang yang dipinjam
$jml_pinjam          = $_POST['jml_pinjam'];          // Jumlah barang yang dipinjam
$tgl_pinjam          = $_POST['tgl_pinjam'];          // Tanggal peminjaman
$tgl_batas_kembali   = $_POST['tgl_batas_kembali'];   // Tanggal batas pengembalian
$denda               = $_POST['denda'];               // Denda keterlambatan
$tgl_kembali         = $_POST['tgl_kembali'];         // Tanggal barang dikembalikan

// Mengambil data peminjaman lama berdasarkan nomor transaksi
// Tujuannya untuk mengetahui jumlah pinjam lama dan status sebelumnya
$data_lama = mysqli_query(
    $konek,
    "SELECT jml_pinjam, status 
     FROM tbpeminjaman 
     WHERE no_transaksi='$no_transaksi'"
);

// Mengubah hasil query menjadi array asosiatif
$lama = mysqli_fetch_assoc($data_lama);

// Mengupdate data peminjaman menjadi status kembali
$hasil = mysqli_query($konek, "UPDATE tbpeminjaman SET 
        id_user='$id_user',                     -- Update ID user
        id_barang='$id_barang',                 -- Update ID barang
        jml_pinjam='$jml_pinjam',               -- Update jumlah pinjam
        tgl_pinjam='$tgl_pinjam',               -- Update tanggal pinjam
        tgl_batas_kembali='$tgl_batas_kembali', -- Update batas kembali
        status='kembali',                       -- Ubah status menjadi kembali
        denda='$denda',                         -- Simpan denda
        tgl_kembali='$tgl_kembali'              -- Simpan tanggal kembali
        WHERE no_transaksi='$no_transaksi'      -- Berdasarkan nomor transaksi
");

// Jika update peminjaman gagal, hentikan program
if(!$hasil){
    die("Penyimpanan data gagal dilaksanakan");
}

// Mengecek apakah status sebelumnya BELUM kembali
// Agar stok tidak bertambah dua kali
if ($lama['status'] != 'kembali') {

    // Mengembalikan stok barang ke tabel tbbarang
    // Stok ditambah berdasarkan jumlah pinjam lama
    $query = mysqli_query(
        $konek,
        "UPDATE tbbarang 
         SET jml_barang = jml_barang + ".$lama['jml_pinjam']." 
         WHERE id_barang='$id_barang'"
    );

    // Jika update stok gagal, hentikan program
    if (!$query) {
        die("Gagal mengupdate jumlah barang");
    }
}

// Redirect otomatis ke halaman daftar konfirmasi peminjaman setelah 2 detik
echo "<html>
<head>
<meta http-equiv='refresh' content='2;url=daftar_konfirmasi_pinjam.php'>
</head>
<body></body>
</html>";
?>
