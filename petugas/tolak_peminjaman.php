<?php
include "koneksi.php";
$no_transaksi=$_REQUEST['no_transaksi'];
$hasil=mysqli_query($konek, "DELETE FROM tbpeminjaman WHERE no_transaksi='$no_transaksi'");
if (!$hasil)
    echo "Upsss maaf! Data gagal dihapus😓😓";
if ($hasil)
    echo "Data berhasil dihapus✅! <br>";

echo "<br><br>";
print ("<html><head><meta http-equiv='refresh' content='2;url=daftarpinjam_petugas.php'></head><body></body></html>")
?>