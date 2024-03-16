<?php
include "koneksi.php";


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $penjualanID = $_POST['penjualanID'];
    $produkID = $_POST['produkID'];
    $jumlahproduk = $_POST['jumlahproduk'];
    $subtotal = $_POST['subtotal'];

    $query = mysqli_query($koneksi, "UPDATE detailpenjualan SET PenjualanID='$penjualanid',
    ProdukID= '$produkid', JumlahProduk='$jumlahproduk', Subtotal='$subtotal' WHERE PenjualanID='$id'");
    if ($query) {
 ?>
           <script>
        alert('Pelanggan Berhasil Edit')
        window.location = "tampilandetailpenjualan.php";
 </script>
 <?php
    } else {

        ?>
          <script>
        alert('Gagal Edit Pelanggan. Silahkan Coba Lagi.');
        window.location = "editdetailpenjualan.php?id=<?php echo $id; ?>";
 </script>
<?php
}
}
?>