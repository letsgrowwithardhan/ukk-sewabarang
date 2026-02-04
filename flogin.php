<?php
include "headerhome.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEAK ZONE ADVENTURE</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section id="badan">
    <div class="login"> 
<form id="contact" action="login.php" method="POST" enctype="multipart/form-data">
<h3>PEAK ZONE ADVENTURE</h3>
<h4>*Silahkan Masukkan Username dan Password!</h4>
<fieldset>
<input placeholder="Username" type="text" name="username" required>
</fieldset>
<fieldset>
<input placeholder="Password" type="password" name="password" required>
</fieldset>
<fieldset>
<select name="level">
    <option value=not-jenis>*Pilih Level</option>
    <option value=admin>Admin</option>
    <option value=petugas>Petugas</option>
    <option value=peminjam>Peminjam</option>
</select>
</fieldset>
<fieldset>
<input value=Login type="submit" class="submit">
</fieldset>
<fieldset>
<center><button><a href="index.php">Kembali</a></button></center>
</fieldset>
</form>
</div>
</section>
</body>
</html>
<?php
include "footer.php";
?>