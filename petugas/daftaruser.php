<?php
include "headerpetugas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR USER</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="badan">
    <div class="lap">
<?php include "koneksi.php";
    $hasil=mysqli_query($konek, "select * from tbuser");
    $jumlah=mysqli_num_rows($hasil);
    echo "<h3 align=center><b>DAFTAR USER PEAK ZONE ADVENTURE</h3>
    <h2 align=center><span class=circle>●</span> Jumlah Data User: <b>$jumlah</b></h2><br>";
    $no=1;
    echo "
    <table border=1>
    <thead>
    <th>No</th>
    <th>Id User</th>
    <th >Nama</th>
    <th >Jk</th>
    <th >Telp</th>
    <th >Email</th>
    <th >Alamat</th>
    <th >Foto</th>
    <th >Edit</th>
    <th >Hapus</th></thead>";
    while($baris=mysqli_fetch_array($hasil))
    {
        echo "<tbody><tr><td align=center>$no</td>
        <td align=center>$baris[0]</td>
        <td>$baris[nama]</td>
        <td align=center>$baris[2]</td>
        <td align=center>$baris[telp]</td>
        <td>$baris[email]</td>
        <td>$baris[alamat]</td>";
    
?>
<td><img src="./foto/<?php echo"$baris[foto]"; ?>" width=50 height=70></td>
<?php
    echo "
    <td align=center><button><a href=edituser.php?nomor=$baris[0]>Edit</a></button></td>
    <td align=center><button><a href=hapususer.php?id_user=$baris[0] onclick='return confirm(\"Anda yakin data anggota $baris[id_user] akan dihapus?\")'>Hapus</a></button></td></tr></tbody>";
    $no++;
    }
    echo "</table>";
    ?>
    <form action=cetakuser.php method=post class="print">
        <button type=submit class="cetak">Cetak</button>
    </div>
</section>
</body>
</html>
<?php
include "footer.php";
?>