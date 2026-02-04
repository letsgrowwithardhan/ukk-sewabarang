<?php
include "header.php";
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
    $nomor=$_REQUEST['nomor'];
    $data=mysqli_fetch_row(mysqli_query($konek, "SELECT * FROM tbpeminjaman WHERE no_transaksi='$nomor'"));
    // $id=$data[0]+1;
    ?>
    <div class="container"> 
<form id="contact" action="simpan_edit_pinjam.php" method="POST" enctype="multipart/form-data">
<h3>INPUT DATA PEMINJAMAN</h3>
<h4>Isikan data dengan lengkap</h4>
<fieldset>
<input placeholder="No Transaksi" type="text" name="no_transaksi" required autofocus value= "<?php echo "$data[0]" ?>">
</fieldset>
<fieldset>
<select name="id_user" value= "<?php echo "$data[1]" ?>">
    <?php
    include "koneksi.php";
    echo "<option value=not_jenis>Id User</option>";
    echo "<option value=not>(Silahkan pilih data dibawah ini):</option>";
    $dt_user = mysqli_query($konek, "SELECT * FROM tbuser");
    while ($hasil = mysqli_fetch_array($dt_user)) {
    $selected = ($hasil['id_user'] == $data[1]) ? "selected" : "";
    echo "<option value='{$hasil['id_user']}' $selected>
            {$hasil['id_user']} | {$hasil['nama']}
          </option>";
}

        ?>
</select>
</fieldset>
<fieldset>
<select name="id_barang" value= "<?php echo "$data[2]" ?>">
    <?php
    include "koneksi.php";
    echo "<option value=not_jenis>Id Barang</option>";
    echo "<option value=not>(Silahkan pilih data dibawah ini):</option>";
    $dt_barang = mysqli_query($konek, "SELECT * FROM tbbarang");
    while ($hasil = mysqli_fetch_array($dt_barang)) {
    $selected = ($hasil['id_barang'] == $data[2]) ? "selected" : "";
    echo "<option value='{$hasil['id_barang']}' $selected>
            {$hasil['id_barang']} | {$hasil['nama_barang']}
          </option>";
}

        ?>
</select>
</fieldset>
<fieldset>
<input placeholder="Jumlah Pinjam" type="number" name="jml_pinjam" required value= "<?php echo "$data[3]" ?>">
</fieldset>
<fieldset>
<label>Tanggal Pinjam</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Pinjam" type="date" name="tgl_pinjam" required value= "<?php echo "$data[4]" ?>">
</fieldset>
<fieldset>
<label>Tanggal Batas Kembali</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Kembali" type="date" name="tgl_batas_kembali" required value= "<?php echo "$data[5]" ?>">
</fieldset>
<fieldset>
<input placeholder="Status" type="text" name="status" required value= "<?php echo "$data[6]" ?>" readonly>
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