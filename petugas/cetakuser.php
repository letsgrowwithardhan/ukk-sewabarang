<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK DATA USER PEAKZONE ADVENTURE</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section id="badan">
    <center>
        <br>
        <h2>LAPORAN DATA USER</h2>
        <h3>PEAKZONE ADVENTURE</h3>
        <?php
        include "koneksi.php";
        ?>
        <table border=1 style="" width=400>
            <tr>
                <th>No</th>
                <th>Id User</th>
                <th>Nama</th>
                <th>Jk</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Alamat</th></tr>
        <?php
        $no=1;
        $sql=mysqli_query($konek,"SELECT id_user, nama, jk, telp, email, alamat FROM tbuser");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_user']++;?></td>
                <td><?php echo $data['nama']++;?></td>
                <td><?php echo $data['jk']++;?></td>
                <td><?php echo $data['telp']++;?></td>
                <td><?php echo $data['email']++;?></td>
                <td><?php echo $data['alamat']++;?></td></tr>
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