<?php
session_start();
include "koneksi.php";
include "admin/log.php";

// simpan log SEBELUM session dihancurkan
if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    simpanLog(
        $konek,
        $_SESSION['username'],
        "Logout dari sistem sebagai " . $_SESSION['level']
    );
}

// hapus semua session
session_destroy();

// kembali ke halaman login
header("Location: flogin.php");
exit;
?>
