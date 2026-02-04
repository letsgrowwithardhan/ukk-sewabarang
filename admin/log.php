<?php
function simpanLog($konek, $username, $aktivitas) {
    mysqli_query($konek, "INSERT INTO tblog (username, aktivitas) 
              VALUES ('$username', '$aktivitas')");
}
?>
