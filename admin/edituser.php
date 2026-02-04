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
    $nomor=$_REQUEST['nomor'];
    $data=mysqli_fetch_row(mysqli_query($konek, "SELECT * FROM tbuser WHERE id_user='$nomor'"));
    $id=$data[0]+1;
    ?>
    <div class="container"> 
<form id="contact" action="simpan_edituser.php" method="POST" enctype="multipart/form-data">
<h3>INPUT DATA USER</h3>
<h4>Isikan data dengan lengkap</h4>
<fieldset>
<input placeholder="Id User" type="text" name="id_user" required autofocus value= "<?php echo "$data[0]" ?>" readonly>
</fieldset>
<fieldset>
<input placeholder="Nama" type="text" name="nama" required value= <?php echo "$data[1]" ?>>
</fieldset>
<fieldset>
    <label>Jenis Kelamin:
<input placeholder="Jenis Kelamin" type="radio" name="jk" value="L" <?php if ($data[2] == 'L') echo 'checked';  ?>>Laki-laki 
<input placeholder="Jenis Kelamin" type="radio" name="jk" value="P" <?php if ($data[2] == 'P') echo 'checked' ;  ?>>Perempuan
</label></fieldset>
<fieldset>
<input placeholder="Telp" type="text" name="telp" required value= <?php echo "$data[3]" ?>>
</fieldset>
<fieldset>
<input placeholder="Email" type="email" name="email" required value= <?php echo "$data[4]" ?>>
</fieldset>
<fieldset>
<textarea placeholder="isikan alamat anda disini" name="alamat" required ><?php echo "$data[5]" ?></textarea>
</fieldset>
<fieldset>
<label>Tanggal Entry</label>
</fieldset>
<fieldset>
<input placeholder="Tanggal Entry" type="date" name="tgl_entry" required value= <?php echo "$data[6]" ?>>
</fieldset>
<fieldset>
<label>
<input placeholder="Foto" type="file" name="foto" value= <?php echo "$data[7]" ?>> 
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