<?php
include "koneksi.php";
$no_transaksi = $_POST['no_transaksi'];
$id_user = $_POST['id_user'];
$id_barang = $_POST['id_barang'];
$jml_pinjam = $_POST['jml_pinjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_batas_kembali = $_POST['tgl_batas_kembali'];
$status='pending';

$hasil=mysqli_query($konek,"INSERT INTO tbpeminjaman (no_transaksi, id_user, id_barang, tgl_pinjam, jml_pinjam, tgl_batas_kembali, status) 
    values ('$no_transaksi', '$id_user', '$id_barang', '$tgl_pinjam', '$jml_pinjam', '$tgl_batas_kembali', '$status');");
            if(!$hasil)
                die("Penyimpanan data gagal dilaksanakan");

            echo "<br><br>";
            print("<html><head><meta http-equiv='refresh' content='2;url=finputpinjam.php'></head><body></body></html>");
            ?>