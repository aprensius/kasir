<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST ['harga'];
    $stok = $_POST ['stok'];
    $ket = $_POST ['ket'];


    $produk = "INSERT INTO produk (NamaProduk, Harga, Stok, Keterangan)
VALUES ('$namaproduk', '$harga', '$stok', '$ket')";

if ($koneksi->query($produk) === TRUE) {
    ?>

    <script>
        alert('Data Berhasil Ditambahkan')
        window.location = "tampilanproduk.php";
        </script>
<?php
} else {
  echo "Error: " . $produk . "<br>" .$koneksi->error;
}

$koneksi->close();
}
?>