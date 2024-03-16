<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM TAMBAH PERJALANAN</title>
    <link rel="stylesheet" href="css/formperjalanan.css">
</head>

<body>

    <h2>TAMBAHKAN DATA PERJALANAN ANDA</h2>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
<div class="col-25">
<label for="tanggal">TANGGAL</label>
</div>
<div class="col-75">
<input type="date" id="tanggal" name="tanggal" required>
</div>
</div>
<div class="row">
<div class="col-25">
<label for="hari">HARI</label>
</div>
<div class="col-75">
    <select id="hari" name="hari">
        <option value="">Silahkan Pilih Hari</option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
    </select>
</div>
</div>
    <div class="row">
        <div class="col-25">
        <label for="bulan">BULAN</label>
        </div>
        <div class="col-75">
        <select id="bulan" name="bulan">
        <option value="">Silahkan Pilih Bulan</option>
        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option> <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September" >September</option>
        <option value="Oktober">Oktober</option>
    <option value="November" >November</option>
    <option value="Desember">Desember</option>
</select>
</div>
</div>
<div class="row">
    <div class="col-25">
    <label for="kegiatan">ESTIMASI KEGIATAN</label>
    </div>
    <div class="col-75">  
    <input type="text" id="kegiatan" name="kegiatan" required></input>
    </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="tempat">LOKASI KEGIATAN</label>
        </div>
        <div class="col-75">
        <input type="text" id="tempat" name="tempat" required></input>
</div>
</div>
<div class="row">
    <div class="col-25">
    <label for="biaya">BIAYA PERJALANAN</label>
    </div>
    <div class="col-75">
    <input type="text" id="biaya" name="biaya" required></input>
    </div>
    </div>
    <div class="row">
    <div class="col-25">
    <label for="gambar">FOTO KEGIATAN</label>
    </div>
    <div class="col-75">
    <input type="file" id="gambar" name="gambar" ></input>
    </div>
    </div>
    <br>
    <div class="row">
    <button type="submit" name="submit">TAMBAH CATATAN</button>
    <button type="text" style="float: left;"><a href="dataperjalanan1.php">BATAL TAMBAH</a></button>
</div>
</form>
</div>
</body>
</html>
<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $hari = $_POST['hari'];
    $bulan = $_POST['bulan']; 
    $kegiatan = $_POST['kegiatan'];
    $tempat = $_POST['tempat'];
    $biaya = $_POST['biaya'];
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp_name, "foto/" . $gambar);

    $query = mysqli_query($koneksi, "INSERT into perjalanan (tanggal, hari, bulan, kegiatan, tempat, biaya, gambar)
    VALUES ('$tanggal', '$hari', '$bulan', '$kegiatan', '$tempat', '$biaya', '$gambar')");

if ($query) {
    //pesan berhasil
?>
<script>
    alert('Catatan Berhasil Ditambahkan');
    window.location = "dataperjalanan1.php";
    </script>
    <?php
}else{
    //pesan warning jika terjadi kesalahan
    ?>
    <script>
    document.querySelector('.warning').innerHTML = 'Gagal menambahkan catatan perjalanan. Silakan coba lagi.';
</script>
<?php
}
}