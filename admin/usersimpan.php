<?php
include "koneksi.php";
$id_user   =$_POST['id_user'];
$nama      = $_POST['nama'];
$jk        = $_POST['jk'];
$telp      = $_POST['telp'];
$email     = $_POST['email'];
$alamat    = $_POST['alamat'];
$tgl_entry = date('Y-m-d');

// upload foto
$lokasi_file = $_FILES['foto']['tmp_name'];
$foto        = $_FILES['foto']['name'];

move_uploaded_file($lokasi_file, "../admin/foto/$foto");

// INSERT TANPA id_user
$hasil = mysqli_query($konek, "
    INSERT INTO tbuser 
    (id_user, nama, jk, telp, email, alamat, tgl_entry, foto) 
    VALUES 
    ('$id_user', '$nama', '$jk', '$telp', '$email', '$alamat', '$tgl_entry', '$foto')
");

if (!$hasil) {
    die('Penyimpanan data gagal');
}

echo "<html>
<head>
<meta http-equiv='refresh' content='2;url=finputuser.php'>
</head>
<body></body>
</html>";
?>
