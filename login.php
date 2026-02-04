<?php
session_start();
include "koneksi.php";
include "admin/log.php";
 // ⬅️ WAJIB

$username = $_POST['username'];
$password = $_POST['password'];
$level    = $_POST['level'];

if ($level == "") {
    echo "<script>alert('Level belum dipilih');window.location='flogin.php';</script>";
    exit;
}

$sql = "SELECT * FROM tblogin 
        WHERE username='$username' 
        AND password='$password' 
        AND level='$level'";

$hasil = mysqli_query($konek, $sql);

if (mysqli_num_rows($hasil) >= 1) {
    $baris = mysqli_fetch_assoc($hasil);

    $_SESSION['username'] = $baris['username'];
    $_SESSION['level']    = $baris['level'];

    // ✅ SIMPAN AKTIVITAS LOGIN
    simpanLog(
        $konek,
        $baris['username'],
        "Login ke sistem sebagai $level"
    );

    // Redirect sesuai level
    if ($level == "admin") {
        header("Location: admin/indexadmin.php");
    } elseif ($level == "petugas") {
        header("Location: petugas/indexpetugas.php");
    } elseif ($level == "peminjam") {
        header("Location: peminjam/indexpeminjam.php");
    }
} else {
    echo "<script>alert('Login gagal! Username/Password/Level anda salah');
    window.location='flogin.php';</script>";
}
?>
