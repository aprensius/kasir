<?php
include "koneksi.php";

$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM penjualan WHERE penjualanID='$id'";

if ($koneksi->query($sql) === TRUE) {
    ?>
    <script>
        alert('Data Berhasil Dihapus')
        window.location = "tampilanpenjualan.php"
 </script>
 <?php
 } else {
  echo "Error deleting record: " . $koneksi->error;
}

$koneksi->close();
?>