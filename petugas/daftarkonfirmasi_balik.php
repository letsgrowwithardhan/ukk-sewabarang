<?php
include "headerpetugas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR PEMINJAMAN</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="badan">
    <div class="lap">
<?php include "koneksi.php";
$hasil=mysqli_query($konek,"SELECT tbpeminjaman.no_transaksi,tbuser.id_user,tbuser.nama,
    tbbarang.id_barang,tbbarang.nama_barang,tbpeminjaman.jml_pinjam,tbpeminjaman.tgl_pinjam,tbpeminjaman.tgl_batas_kembali, tbpeminjaman.status, tbpeminjaman.tgl_kembali, tbpeminjaman.denda  
    from tbpeminjaman,tbbarang,tbuser where tbpeminjaman.id_user=tbuser.id_user 
    AND tbpeminjaman.id_barang=tbbarang.id_barang AND tbpeminjaman.status='pending_balik'");

    $jumlah=mysqli_num_rows($hasil);
    echo "<h3 align=center><b>KONFIRMASI PEMINJAMAN PEAK ZONE ADVENTURE</h3>
    <h2 align=center><span class=circle>●</span> Jumlah Data Peminjaman: <b>$jumlah</b></h2><br>";
    $no=1;
    echo "
    <table border=1>
    <thead>
    <th width=30>No</th>
    <th width=30>No Transaksi</th>
    <th width=30>Id User</th>
    <th >Nama User</th>
    <th >Id Barang</th>
    <th >Nama Barang</th>
    <th width=30>Jumlah Pinjam</th>
    <th >Tanggal Pinjam</th>
    <th >Tanggal Batas Kembali</th>
    <th >Denda</th>
    <th >Tanggal Kembali</th>
    <th >Status</th>
    <th >Terima</th>
    <th >Tolak</th></thead>";
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
        <td align=center>$baris[denda]</td>
        <td align=center>$baris[tgl_kembali]</td>
        <td align=center>$baris[status]</td>";
    
?>
<?php
    echo "
    <td align=center><button><a href=baliksimpan.php?no_transaksi=$baris[no_transaksi] onclick='return confirm(\"Anda yakin ubah status data pinjam $baris[no_transaksi]?\")'>Konfirmasi</a></button></td>
    <td align=center><button><a href=tolakbalik.php?no_transaksi=$baris[0] onclick='return confirm(\"Anda yakin data barang $baris[no_transaksi] akan ditolak?\")'>Tolak</a></button></td></tr></tbody>";
    $no++;
    }
    echo "</table>";
    ?>
    </div>
</section>
</body>
</html>
<?php
include "footer.php";
?>