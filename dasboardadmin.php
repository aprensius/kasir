<?php
include "koneksi.php";

$pelanggan = "SELECT * FROM pelanggan";
$jum_pelanggan = mysqli_query($koneksi, $pelanggan);

$jumlah_pelanggan = mysqli_num_rows($jum_pelanggan);


$produk = "SELECT SUM(Stok) as total FROM produk";
$jum_produk = mysqli_query($koneksi, $produk);
$barang = mysqli_fetch_assoc($jum_produk);
$totalstok = $barang['total'];

$admin = "SELECT * FROM admin";
$jum_admin = mysqli_query($koneksi, $admin);
$jumlah_admin = mysqli_num_rows($jum_admin);


$penjualan = "SELECT * FROM penjualan";
$jum_penjualan = mysqli_query($koneksi, $penjualan);
$jumlah_penjualan = mysqli_num_rows($jum_penjualan)
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Pangolin' rel='stylesheet'>
<style>
body {
    font-family: 'Pangolin';font-size: 22px;
    background-image: url(gambar/2.jpeg);
}
h2{
    font-family:  'Pangolin';
}
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(36, 145, 94);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 80px;
  text-decoration: none;
  display: block;
  text-align: right;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.sidebar {
  height: 100%;
  width: 190px;
  position: fixed;
  z-index: 1;
  top: 56px;
  left: 8;
  background-color: #13130f;
  overflow-x: hidden;
  padding-top: 8px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 180px; /* Same as the width of the sidenav */
  padding: 0px 10px;
  color: rgb(0, 0, 0);
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


.container {
  padding: 2px 16px;
}

* {
  box-sizing: border-box;
}

body {
  font-family:'Pangolin' ;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row{
  margin: 0 -5px;
margin-top: 1rem ;

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color: pink ;
}
.card2 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color: pink;
}
.card3 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color:pink ;
}
.card4 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color:pink ;
}
.card5 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5px;
  text-align: center;
  background-color:pink ;

.icon
  font-size: 25px;
}
.btn {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 16px 80px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
  cursor: pointer;
}

.btn:hover {
  background-color: #3e8e41;
  color: white;
}

</style>
</head>
<body style="background-color:white;">

<div class="navbar">
  <a href="#home">Kasir  Beauty Shop</a>
  <div class="dropdown" style="float: right; margin-right: 60px;">
    <button class="dropbtn">Selamat Datang Admin
      <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
    <button type="submit" class="btn" onclick="logout()">Logout</button>
    <p id="demo"></p>
    <script>
function logout() {
  var txt;
  if (confirm("Apakah Anda Yakin Logout?")) {
    window.location = "landingpage.html";
  } else {
    window.location = "dasboardadmin.php";
  }
}
</script>
    </div>
  </div> 
</div>

<div class="sidebar">

<a href="#home"><i class="fa fa-area-chart"></i>Dashboard</a>

    <a href="tampilanpelanggan.php"><i class="fa fa-users"></i>   Pelanggan</a>
    <a href="tampilanproduk.php"><i class="fa fa-shopping-bag"></i> Stok Barang</a>
    <a href="tampilanpenjualan.php"><i class="fa fa-fw fa-tags"></i> Penjualan</a>
    <a href="tampilandetailpenjualan.php"><i class="fa fa-cart-arrow-down"></i> Detail Penjualan</a>
    <a href="logout.php"><i class="fa fa-fw fa-minus-circle"></i> Logout</a>
  </div>
  
  <div class="main">
  
<div class="row">
  <div class="column">
    <div class="card1">
      <h2>Jumlah Pelanggan</h2>
      <p class="icon"><i class="fa fa-users"></i></p>
      <p class="icon"><?php echo "". $jumlah_pelanggan . "";?> </p>
    </div>
  </div>

  <div class="column">
    <div class="card2">
      <h2>Jumlah Stok Barang</h2>
      <p class="icon"><i class="fa fa-shopping-bag"></i></p>
      <p class="icon"><?php echo "". $barang ['total']. "";?> </p>
    </div>
  </div>
  
  <div class="column">
    <div class="card3">
      <h2>Jumlah admin</h2>
      <p class="icon"><i class="fa fa-fw fa fa-user-circle-o"></i></p>
      <p class="icon"><?php echo "". $jumlah_admin . "";?> </p>

    </div>
  </div>
  
  <div class="column">
    <div class="card4">
      <h2>Total Penjualan</h2>
      <p class="icon"><i class="fa fa-fw fa-tags"></i></p>
      <p class="icon"><?php echo "". $jumlah_penjualan . "";?> </p>
    </div>
  </div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

  </div>
</body>
</html>
