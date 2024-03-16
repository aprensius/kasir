<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin= '$username' AND password='$password'");
$cek = mysqli_num_rows($login);
    if ($cek) {
      
 ?>
        <script>
            alert('USERNAME DAN PASSWORD BENAR, LOGIN BERHASIL');
            window.location = "dasboardadmin.php";
            </script>
          
            <?php
        } else {
            ?>
            <script>
                alert('USERNAME DAN PASSWORD TIDAK BENAR, SILAHKAN LOGIN ULANG!!');
                window.location = "loginadmin.html";
                </script>
                <?php
        }
        
    }
        ?>

?>