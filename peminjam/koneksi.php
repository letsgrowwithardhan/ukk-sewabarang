<?php
$host="localhost";
$user="root";
$password="";
$dbname="ukksewabarang";

$konek=mysqli_connect($host, $user, $password, $dbname);
if ($konek)
    echo("<center><div class=loading></div></center>");

if (!$konek)
    die("Gagal koneksi karena".mysql_error());
$dbKonek=mysqli_select_db($konek, $dbname);

if (!$dbKonek)
    die("Gagal Buka Database $dbname karena".mysql_error());
?>