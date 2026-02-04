<?php
include "koneksi.php";
$id_barang        = $_POST['id_barang'];
$nama_barang      = $_POST['nama_barang'];
$kategori         = $_POST['kategori'];
$jml_barang       = $_POST['jml_barang'];
$tgl_entry        = $_POST['tgl_entry'];

$lokasi_file= $_FILES['gambar']['tmp_name'];
$gambar = $_FILES['gambar']['name'];
move_uploaded_file($lokasi_file,"../admin/gambar/$gambar");

$hasil=mysqli_query($konek, "UPDATE tbbarang SET id_barang='$id_barang', nama_barang='$nama_barang', kategori='$kategori', jml_barang='$jml_barang', tgl_entry='$tgl_entry', gambar='$gambar';");
            if(!$hasil)
                die("Penyimpanan data gagal dilaksanakan");

            echo "<br><br>";
            print("<html><head><meta http-equiv='refresh' content='2;url=daftarbarang.php'></head><body></body></html>");
            ?>