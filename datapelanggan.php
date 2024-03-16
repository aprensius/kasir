<?php
include "koneksi.php";

$table = "SELECT * FROM pelanggan";
$data = mysqli_query($koneksi, $table);

?>
<link rel="stylesheet" href="dataadmin.css">
<title>Data Pelanggan<title>

    <table rules="all" border="1" cellpadding="1" align="center">
       
    <thead>
    <th style="text-aligen: center;">NAMA PELANGGAN</th>
    <th style="text-aligen: center;">ALAMAT</th>
            <th style="text-aligen: center;">NOMOR TELEPON</th>
        
            <th colspan="2" style="text-aligen: center;">AKSI</th>
            
        </thead>
        <?php
        while ($pelanggan = mysqli_fetch_assoc($data)) {
        ?>
   <tr>
       
        <td><?php echo $pelanggan ["NamaPelanggan"]; ?></td>
        <td><?php echo $pelanggan ["Alamat"]; ?></td>
        <td><?php echo $pelanggan ["NomorTelepon"]; ?></td>

       <td style="text-aligen: center;"><button type="text"><a href="editadmin.php?id=<?php echo $pelanggan['id'];?>">EDIT</a></button></td>
       <td style="text-aligen: center;"><button type="text"><a href="hapusadmin.php?id=<?php echo $pelanggan['id'];?>">HAPUS</a></button></td>
        </tr>
<?php
        }
        ?>
       <tbody>

        </tbody>
    </table>
</body>
</html>