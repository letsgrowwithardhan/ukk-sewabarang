<?php
include "koneksi.php";
$id_user=$_REQUEST['id_user'];
$hasil=mysqli_query($konek, "DELETE FROM tbuser WHERE id_user='$id_user'");
if (!$hasil)
    echo "Upsss maaf! Data gagal dihapus😓😓";
if ($hasil)
    echo "Data berhasil dihapus✅! <br>";

echo "<br><br>";
print ("<html><head><meta http-equiv='refresh' content='2;url=daftaruser.php'></head><body></body></html>")
?>