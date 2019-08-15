<!doctype html>
<html lang="en">
  <head>
    <title>Input Data Siswa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="ricon.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
  <a class="navbar-brand">Simple CRUD<span class="sr-only">(current)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="halaman_utama.php">Registrasi </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">Check Data Anda  </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
      
      
    </ul>
  </div>
</nav>
  
<p>
	<h1>Input data siswa</h1>
</p>

<form action="" method="post" class="form-group">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control">
  </div>
  <div class="form-group">
	<label>NIK</label>
  <input type="text" name="nik" placeholder="Masukkan Nik" class="form-control">
  </div>
  <div class="form-group">
  <label>Alamat</label>
  <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
  </div>
  <div class="form-group">
  <label>Telepon</label>
  <input type="text" name="no_telp" placeholder="Masukkan telepon" class="form-control">
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit Data</button>
  
</form>
<?php

if(isset($_POST['submit'])){

	$name 	= $_POST['nama'];
	$nik 	= $_POST['nik'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['no_telp'];

	$sql = "INSERT INTO student (nama, nik, alamat, no_telp) VALUES (?, ?, ?, ?)";
	
	$dbConnect = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
	$statement = $dbConnect->prepare($sql);
	$statement->execute([($name), ($nik), ($alamat),($telepon)]);
  header("Location: view.php");
}
?>

<div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://www.instagram.com/roihanmish_28/"> Roihan Mishbahul Anam</a>
  </div>
  </body>
</html>