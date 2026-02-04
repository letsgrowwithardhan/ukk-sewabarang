<?php
include "headerpetugas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM INPUT BARANG</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="badan">
<?php include "koneksi.php";
    $data=mysqli_fetch_row(mysqli_query($konek, "SELECT max(no_transaksi) FROM tbpeminjaman"));
    $id=$data[0]+0001;
    ?>
    <div class="container"> 
<form id="contact" action="pinjamsimpan_petugas.php" method="POST" enctype="multipart/form-data">
<h3>INPUT DATA PEMINJAMAN</h3>
<h4>Isikan data dengan lengkap</h4>
<fieldset>
<input placeholder="No Transaksi" type="text" name="no_transaksi" required autofocus value= <?php echo "$id" ?> readonly>
</fieldset>
<fieldset>
<select name="id_user">
    <?php
    include "koneksi.php";
    echo "<option value=not_jenis>Id User</option>";
    echo "<option value=not>(Silahkan pilih data dibawah ini):</option>";
    $data=mysqli_query($konek, "SELECT * FROM tbuser");
    while ($hasil=mysqli_fetch_array($data))
        {
            echo"<option value=$hasil[id_user]>$hasil[id_user] | $hasil[nama]</option>";
        }
        ?>
</select>
</fieldset>
<fieldset>
<select name="id_barang">
    <?php
    include "koneksi.php";
    echo "<option value=not_jenis>Id Barang</option>";
    echo "<option value=not>(Silahkan pilih data dibawah ini):</option>";
    $data=mysqli_query($konek, "SELECT * FROM tbbarang");
    while ($hasil=mysqli_fetch_array($data))
        {
            echo"<option value=$hasil[id_barang]>$hasil[id_barang] | $hasil[nama_barang]</option>";
        }
        ?>
</select>
</fieldset>
<fieldset>
<input placeholder="Jumlah Pinjam" type="number" name="jml_pinjam" required>
</fieldset>
<fieldset>
<label>Tanggal Pinjam</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Pinjam" type="date" name="tgl_pinjam" required>
</fieldset>
<fieldset>
<label>Tanggal Kembali</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Kembali" type="date" name="tgl_batas_kembali" required>
</fieldset>
<fieldset>
<input value=Kirim type="submit" class="submit">
</fieldset>
<fieldset>
<input value=Batal type="reset" class="cancel">
</fieldset>
</form>
</div>
</section>
</body>
</html>
<?php
include "footer.php";
?>