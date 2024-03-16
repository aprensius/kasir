<?php
include "koneksi.php";


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $nomortelepon = $_POST['nomortelepon'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$namapelanggan',
    Alamat= '$alamat', NomorTelepon='$nomortelepon' WHERE pelangganID='$id'");
    if ($query) {
 ?>
           <script>
        alert('Pelanggan Berhasil Edit')
        window.location = "tampilanpelanggan.php";
 </script>
 <?php
    } else {

        ?>
          <script>
        alert('Gagal Edit Pelanggan. Silahkan Coba Lagi.');
        window.location = "editpelanggan.php?id=<?php echo $id; ?>";
 </script>
<?php
}
}
?>