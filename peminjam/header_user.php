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
    <title>Peminjam</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
    <nav>
        <div class="logo">
            <a href="indexpeminjam.php"><img src="ukksewa.png"></a>
        </div>
        <ul class="navbar">
        <li><a href="../index.php" class="active">Home</a></li>
        <li><a href="katalog.php" class="active">Katalog</a></li>
        <li><a href="daftar_user_pinjam.php" class="active">Daftar Pinjam</a></li>
        <!-- <li><a href="layanan.php">Syarat & Ketentuan</a></li> -->
         <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>
    </header>
</body>
</html>