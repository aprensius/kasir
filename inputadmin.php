<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $admin = $_POST['admin'];
    $password = $_POST ['password'];
  


    $admin = "INSERT INTO admin (admin,password)
VALUES ('$admin', '$password')";

if ($koneksi->query($admin) === TRUE) {
    ?>

    <script>
        alert('Registrasi Telah Berhasil,Silahkan Login');
        window.location = "loginadmin.html";
        </script>
<?php
} else {
  echo "Error: " . $admin . "<br>" .$koneksi->error;
}

$koneksi->close();
}
?>