<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST ['alamat'];
    $nomortelepon = $_POST ['nomortelepon'];


    $pelanggan = "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon)
VALUES ('$namapelanggan', '$alamat', '$nomortelepon')";

if ($koneksi->query($pelanggan) === TRUE) {
    ?>

    <script>
        alert('Data Berhasil Ditambahkan')
        window.location = "tampilanpelanggan.php";
        </script>
<?php
} else {
  echo "Error: " . $pelanggan . "<br>" .$koneksi->error;
}

$koneksi->close();
}




?>