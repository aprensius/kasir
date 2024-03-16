<?php
include "koneksi.php";


if (isset($_POST['edit'])){
    $id = $_POST['id'];
    $tanggalpenjualan = $_POST['tanggalpenjualan'];
    $totalharga= $_POST['totalharga'];
    $pelangganid = $_POST['namapelanggan'];

    $query = mysqli_query($koneksi, "UPDATE penjualan SET TanggalPenjualan='$tanggalpenjualan',
    Totalharga= '$totalharga', PelangganID='$pelangganid' WHERE PenjualanID='$id'");
    if ($query) {
 ?>
           <script>
        alert('Pelanggan Berhasil Edit')
        window.location = "tampilanpenjualan.php";
 </script>
 <?php
    } else {

        ?>
          <script>
        alert('Gagal Edit Pelanggan. Silahkan Coba Lagi.');
        window.location = "editpenjualan.php?id=<?php echo $id; ?>";
 </script>
<?php
}
}
?>