<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK DATA BARANG PEAKZONE ADVENTURE</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="badan">
    <center>
        <br>
        <h2>LAPORAN DATA BARANG</h2>
        <h3>PEAKZONE ADVENTURE</h3>
        <?php
        include "koneksi.php";
        ?>
        <table border=1 style="" width=400>
            <tr>
                <th>No</th>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Entry</th></tr>
        <?php
        $no=1;
        $sql=mysqli_query($konek,"SELECT id_barang, nama_barang, kategori, jml_barang, tgl_entry FROM tbbarang");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_barang'];?></td>
                <td><?php echo $data['nama_barang'];?></td>
                <td><?php echo $data['kategori'];?></td>
                <td><?php echo $data['jml_barang'];?></td>
                <td><?php echo $data['tgl_entry'];?></td></tr>
            <?php
        }
        ?>
        </table><br>
        <table border=0 width="400" class=ttd>
            <tr>
                <td align=right></td></tr>
            <tr>
                <td align=right height=50></td></tr>
            <tr>
                <td align=right height=50>(PeakZone Adventure)</td></tr>
</table>
<center>
    <script>
        window.print();
        </script>
</section>
</body>
</html>