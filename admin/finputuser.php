<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM INPUT USER</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="badan">
<?php include "koneksi.php";
    $data=mysqli_fetch_row(mysqli_query($konek, "SELECT max(id_user) FROM tbuser"));
    $id=$data[0]+001;
    ?>
    <div class="container"> 
<form id="contact" action="usersimpan.php" method="POST" enctype="multipart/form-data">
<h3>INPUT DATA USER</h3>
<h4>Isikan data dengan lengkap</h4>
<fieldset>
<input placeholder="Id User" type="text" name="id_user" required autofocus value= <?php echo "$id" ?> readonly>
</fieldset>
<fieldset>
<input placeholder="Nama" type="text" name="nama" required>
</fieldset>
<fieldset>
    <label>Jenis Kelamin:
<input placeholder="Jenis Kelamin" type="radio" name="jk" value="L" checked>Laki-laki 
<input placeholder="Jenis Kelamin" type="radio" name="jk" value="P">Perempuan 
</label></fieldset>
<fieldset>
<input placeholder="Telp" type="text" name="telp" required>
</fieldset>
<fieldset>
<input placeholder="Email" type="email" name="email" required>
</fieldset>
<fieldset>
<textarea placeholder="isikan alamat anda disini" name="alamat" required></textarea>
</fieldset>
<fieldset>
<label>Tanggal Entry</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Entry" type="date" name="tgl_entry" required>
</fieldset>
<fieldset>
<label>
<input placeholder="Foto" type="file" name="foto"> 
</label></fieldset>
<fieldset>
<input value=Kirim type="submit" class="submit">
</fieldset>
<fieldset>
<input value=Batal type="reset" class="cancel">
</fieldset>
</form>
</div>
            <!-- <p align=center><h2><b>TAMBAH DATA USER</p></h2>
            <form action="user_simpan.php" method=POST enctype="multipart/form-data">
                        <input type="text" name="id_user" size=1 value= <?php echo "$id" ?> readonly>
                        <input type="submit" value="Simpan"></td></tr>
            </form>     -->
</section>
</body>
</html>
<?php
include "footer.php";
?>