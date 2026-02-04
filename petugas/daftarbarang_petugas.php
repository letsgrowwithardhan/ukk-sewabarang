<?php
include "headerpetugas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR BARANG</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="badan">
    <div class="lap">
<?php include "koneksi.php";
    $hasil=mysqli_query($konek, "select * from tbbarang");
    $jumlah=mysqli_num_rows($hasil);
    echo "<h3 align=center><b>DAFTAR BARANG PEAK ZONE ADVENTURE</h3>
    <h2 align=center><span class=circle>●</span> Jumlah Data Barang: <b>$jumlah</b></h2><br>";
    $no=1;
    echo "
    <table border=1>
    <thead>
    <th>No</th>
    <th width=30>Id Barang</th>
    <th >Nama Barang</th>
    <th >Kategori</th>
    <th width=30>Jumlah Barang</th>
    <th width=30>Tersedia</th>
    <th >Tanggal Entry</th>
    <th >Gambar</th></thead>";
    while($baris=mysqli_fetch_array($hasil))
    {
        echo "<tbody><tr><td align=center>$no</td>
        <td align=center>$baris[0]</td>
        <td>$baris[nama_barang]</td>
        <td align=center>$baris[kategori]</td>
        <td align=center>$baris[jml_barang]</td>
        <td align=center>$baris[tersedia]</td>
        <td>$baris[tgl_entry]</td>";
    
?>
<td><img src="./gambar/<?php echo"$baris[gambar]"; ?>" width=70 height=70></td>
<?php
    }
    $no++;
    echo "</table>";
    ?>
    <form action=cetakbarang.php method=post class="print">
        <button type=submit class="cetak">Cetak</button>
    </div>
</section>
</body>
</html>
<?php
include "footer.php";
?>