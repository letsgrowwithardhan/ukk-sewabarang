<?php
include "koneksi.php";
$id_barang=$_REQUEST['id_barang'];
$hasil=mysqli_query($konek, "DELETE FROM tbbarang WHERE id_barang='$id_barang'");
if (!$hasil)
    echo "Upsss maaf! Data gagal dihapus😓😓";
if ($hasil)
    echo "Data berhasil dihapus✅! <br>";

echo "<br><br>";
print ("<html><head><meta http-equiv='refresh' content='2;url=daftarbarang.php'></head><body></body></html>")
?>