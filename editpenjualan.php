<?php
include "koneksi.php";
$id = $_GET['id'];
$edit = mysqli_query($koneksi, "SELECT * FROM penjualan 
JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID WHERE PenjualanID='$id'");
$editpenjualan = mysqli_fetch_array($edit);

if (!$editpenjualan){
    die ("Data Tidak Ditemukan.");
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;
}

.input-container {
  display: -ms-flexbox; 
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background:  rgb(30, 176, 255);
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid rgb(30, 176, 255);
}

/* Set a style for the submit button */
.btn {
  background-color: rgb(30, 176, 255);
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn a {
  background-color:  rgb(30, 176, 255);
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  text-decoration: none;
}
h2{
  text-align: center;
   font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif

}

.btn:hover {
  opacity: 1;
}

</style>
</head>
<body>

<form action="updatepenjualan.php" style="max-width:500px;margin:auto" method="POST">
  <h2>Form Edit Penjualan</h2>
  <div class="input-container">
    <i class="	fa fa-calendar icon"></i>
    <label class="input-field">Tanggal Penjualan</label>
    <input type="hidden" name="id" value="<?php echo $editpenjualan['PenjualanID'];?>">
    <input class="input-field" type="date" placeholder="Tanggal Penjualan" value="<?php echo $editpenjualan['TanggalPenjualan']; ?>" name="tanggalpenjualan">

  </div>

  <div class="input-container">
    <i class="fa fa-money icon"></i>
    <label class="input-field">Total Harga</label>
    <input class="input-field" type="text" placeholder="Total Harga" value="<?php echo $editpenjualan['TotalHarga']; ?>" name="totalharga">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <label class="input-field">Nama Pelanggan</label>
    <select class="input-filed" name="namapelanggan">
      <option><?php echo $editpenjualan['NamaPelanggan']; ?></option>
    <?php
    include "koneksi.php";
    $query = mysqli_query ($koneksi, "SELECT * FROM pelanggan")
    or die(mysqli_eror($koneksi));
    while ($data = mysqli_fetch_array($query)){
      echo "<option value = $data[PelangganID]> $data[NamaPelanggan]</option>";
    }
  ?>
  </select>
  </div>

  <button type="submit" name="edit" class="btn">Edit</button><br><br>
  <button type="text" class="btn"><a href="tampilanpenjualan.php"> Batal Edit</button>
</form>

</body>
</html>
