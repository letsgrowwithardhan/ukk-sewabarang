
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
    $data=mysqli_fetch_row(mysqli_query($konek, "SELECT max(id_barang) FROM tbbarang"));
    $id=$data[0]+001;
    ?>
    <div class="container"> 
<form id="contact" action="barangsimpan.php" method="POST" enctype="multipart/form-data">
<h3>INPUT DATA BARANG</h3>
<h4>Isikan data dengan lengkap</h4>
<fieldset>
<input placeholder="Id Barang" type="text" name="id_barang" required autofocus value= <?php echo "$id" ?> readonly>
</fieldset>
<fieldset>
<input placeholder="Nama Barang" type="text" name="nama_barang" required>
</fieldset>
<fieldset>
    <label>Kategori Barang:
<input placeholder="Kategori Barang" type="radio" name="kategori" value="sepatu" checked>Sepatu 
<input placeholder="Kategori Barang" type="radio" name="kategori" value="tas">Tas
<input placeholder="Kategori Barang" type="radio" name="kategori" value="jaket">Jaket
<input placeholder="Kategori Barang" type="radio" name="kategori" value="aksesoris">Aksesoris
</label></fieldset>
<fieldset>
<input placeholder="Jumlah Barang" type="number" name="jml_barang" required>
</fieldset>
<fieldset>
<label>Tanggal Entry</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Entry" type="date" name="tgl_entry" required>
</fieldset>
<fieldset>
<label>
<input placeholder="Gambar" type="file" name="gambar"> 
</label></fieldset>
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
