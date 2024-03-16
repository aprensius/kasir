<?php
include "koneksi.php";


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $keterangan = $_POST['keterangan'];


    $query = mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$namaproduk',
    Harga='$harga', Stok='$stok',  keterangan='$keterangan' WHERE produkID='$id'");
    if ($query) {
 ?>
           <script>
        alert('Produk Berhasil Edit')
        window.location = "tampilanproduk.php";
 </script>
 <?php
    } else {

        ?>
          <script>
        alert('Gagal Edit Pelanggan. Silahkan Coba Lagi.');
        window.location = "editproduk.php?id=<?php echo $id; ?>";
 </script>
<?php
}
}
?>