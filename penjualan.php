<?php

include "koneksi.php";

if(isset($_POST['submit'])){
    $tanggal = $_POST['tanggal'];
    $totalharga = $_POST ['totalharga'];
    $namapelanggan = $_POST ['namapelanggan'];

    $penjualan = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID)
VALUES ('$tanggal', '$totalharga', '$namapelanggan')";

if ($koneksi->query($penjualan) === TRUE) {
    ?>

    <script>
        alert('Data Berhasil Ditambahkan')
        window.location = "tampilanpenjualan.php";
        </script>
<?php
} else {
  echo "Error: " . $penjualan. "<br>" .$koneksi->error;
}

$koneksi->close();
}
?>