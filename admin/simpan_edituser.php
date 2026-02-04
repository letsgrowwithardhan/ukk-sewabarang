<?php
include "koneksi.php";

$id_user   = $_POST['id_user'];
$nama      = $_POST['nama'];
$jk        = $_POST['jk'];
$telp      = $_POST['telp'];
$email     = $_POST['email'];
$alamat    = $_POST['alamat'];
$tgl_entry = $_POST['tgl_entry'];

if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $foto        = $_FILES['foto']['name'];
    move_uploaded_file($lokasi_file,"foto/$foto");

    $hasil = mysqli_query($konek, "UPDATE tbuser SET 
        nama='$nama',
        jk='$jk',
        telp='$telp',
        email='$email',
        alamat='$alamat',
        tgl_entry='$tgl_entry',
        foto='$foto'
        WHERE id_user='$id_user'");
} else {
    $hasil = mysqli_query($konek, "UPDATE tbuser SET 
        nama='$nama',
        jk='$jk',
        telp='$telp',
        email='$email',
        alamat='$alamat',
        tgl_entry='$tgl_entry'
        WHERE id_user='$id_user'");
}

if(!$hasil)
    die("Penyimpanan data gagal dilaksanakan");

print("<html><head><meta http-equiv='refresh' content='2;url=daftaruser.php'></head><body></body></html>");
?>
