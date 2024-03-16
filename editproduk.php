<?php
include "koneksi.php";
$id = $_GET['id'];
$edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID='$id'");
$editproduk = mysqli_fetch_array($edit);

if (!$editproduk){
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
  display: -ms-flexbox; /* IE10 */
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

<form action="updateproduk.php" style="max-width:500px;margin:auto" method="POST">
  <h2>Form Edit Produk</h2>
  <div class="input-container">
    <i class="fa fa-line-chart icon"></i>
    <input type="hidden" name="id" value="<?php echo $editproduk['ProdukID'];?>">
    <input class="input-field" type="text" placeholder="Nama Produk" value="<?php echo $editproduk['NamaProduk']; ?>" name="namaproduk">
  </div>

  <div class="input-container">
    <i class="fa fa-money icon"></i>
    <input class="input-field" type="text" placeholder="Harga" value="<?php echo $editproduk['Harga']; ?>" name="harga">
  </div>
  
  <div class="input-container">
    <i class="fa fa-bar-chart icon"></i>
    <input class="input-field" type="text" placeholder="Stok" value="<?php echo $editproduk['Stok']; ?>" name="stok">
  </div>

  <div class="input-container">
    <i class="fa fa-bar-chart icon"></i>
    <input class="input-field" type="text" placeholder="keterangan" value="<?php echo $editproduk['keterangan']; ?>" name="keterangan">
  </div>

  <button type="submit" name="edit" class="btn">Edit</button><br><br>
  <button type="text" class="btn"><a href="tampilanproduk.php"> Batal Edit</button>
</form>
</body>
</html>
