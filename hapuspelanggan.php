<?php
include "koneksi.php";

$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM pelanggan WHERE pelangganID='$id'";

if ($koneksi->query($sql) === TRUE) {
    ?>
    <script>
        alert('Data Berhasil Dihapus')
        window.location = "tampilanpelanggan.php"
 </script>
 <?php
 } else {
  ?>
  <script>
        alert('Data TidakBisa Dihapus, Karena Data Sudah Di Gunakan Pada Tabel Yang Lain.Harap Hapus Dulu Data Pada Tabel Berikut')
        window.location = "tampilanpenjualan.php"
 </script>
<?php
 }

$koneksi->close();
?>