<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['level'])) {
    header("Location: ../flogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEAK ZONE ADVENTURE</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
    <nav>
        <div class="logo">
            <a href="indexpetugas.php"><img src="ukksewa.png"></a>
        </div>
        <ul class="navbar">
        <li><a href="indexpetugas.php" class="active">Home</a></li>
        <li>
            <a href="">Perizinan⏷</a>
            <ul class="dropdown">
                <li class="navbar"><a href="daftarpinjam_petugas.php">Daftar Konfirmasi </a></li>
                <li class="navbar"><a href="daftarkonfirmasi_balik.php">Daftar Konfirmasi Balik</a></li>
            </ul>
        </li>
        <li>
            <a href="">Laporan⏷</a>
            <ul class="dropdown">
                <li class="navbar"><a href="daftarbarang_petugas.php">Daftar Barang</a></li>
                <li class="navbar"><a href="daftaruser_petugas.php">Daftar User</a></li>
                <li class="navbar"><a href="daftar_konfirmasi_pinjam.php">Daftar Peminjaman</a></li>
                <li class="navbar"><a href="daftarbalik.php">Daftar Pengembalian</a></li>
            </ul>
        </li>
        <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    </header>
</html>