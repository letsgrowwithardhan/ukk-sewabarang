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
$hasil=mysqli_query($konek,"SELECT tbpeminjaman.no_transaksi,tbuser.id_user,tbuser.nama,
    tbbarang.id_barang,tbbarang.nama_barang,tbpeminjaman.jml_pinjam,tbpeminjaman.tgl_pinjam,tbpeminjaman.tgl_batas_kembali, tbpeminjaman.status, tbpeminjaman.denda, tbpeminjaman.tgl_kembali  
    from tbpeminjaman,tbbarang,tbuser where tbpeminjaman.id_user=tbuser.id_user 
    AND tbpeminjaman.id_barang=tbbarang.id_barang AND tbpeminjaman.status='kembali' ");

    $jumlah=mysqli_num_rows($hasil);
    echo "<h3 align=center><b>DAFTAR PEMINJAMAN PEAK ZONE ADVENTURE</h3>
    <h2 align=center><span class=circle>●</span> Jumlah Data Pengembalian: <b>$jumlah</b></h2><br>";
    $no=1;
    echo "
    <table border=1>
    <thead>
    <th width=20>No</th>
    <th width=20>No Transaksi</th>
    <th width=30>Id User</th>
    <th >Nama User</th>
    <th >Id Barang</th>
    <th >Nama Barang</th>
    <th width=30>Jumlah Pinjam</th>
    <th >Tanggal Pinjam</th>
    <th >Tanggal Batas Kembali</th>
    <th >Status</th>
    <th >Denda</th>
    <th >Tanggal Kembali</th>
    <th >Hapus</th></thead>";
    while($baris=mysqli_fetch_array($hasil))
    {
        echo "<tbody><tr><td align=center>$no</td>
        <td align=center>$baris[no_transaksi]</td>
        <td align=center>$baris[id_user]</td>
        <td>$baris[nama]</td>
        <td align=center>$baris[id_barang]</td>
        <td>$baris[nama_barang]</td>
        <td align=center>$baris[jml_pinjam]</td>
        <td align=center>$baris[tgl_pinjam]</td>
        <td align=center>$baris[tgl_batas_kembali]</td>
        <td align=center>$baris[status]</td>
        <td align=center bgcolor=#b4c9a1>Rp $baris[denda]</td>
        <td align=center>$baris[tgl_kembali]</td>
        ";
    
?>
<?php
    echo "
    <td align=center><button><a href=hapuspinjam.php?nomor=$baris[no_transaksi] onclick='return confirm(\"Anda yakin data barang $baris[no_transaksi] akan dihapus?\")'>Hapus</a></button></td></tr></tbody>";
    $no++;
    }
    echo "</table>";
    ?>
    <form action=cetakbalik.php method=post class="print">
        <button type=submit class="cetak">Cetak</button>
    </div>
</section>
</body>
</html>
<?php
include "footer.php";
?>