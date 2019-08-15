<?php
$dbConnect = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
$sql = 'SELECT * FROM student WHERE id=:id';
$id = $_GET['id'];
$statement = $dbConnect->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch();
if (isset($_POST['submit'])) {
  $name 	= $_POST['nama'];
$nik 	= $_POST['nik'];
$alamat = $_POST['alamat'];
$telepon = $_POST['no_telp'];

$data = [
  'name' => $name,
  'nik' => $nik,
  'alamat' => $alamat,
  'telepon' => $telepon,
  'id' => $id
];
$sql = "UPDATE student SET nama=:name, nik=:nik, alamat=:alamat, no_telp=:telepon  WHERE id=:id";
$dbConnect = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
  $statement = $dbConnect->prepare($sql);
  $statement->execute($data);
  header('location:view.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="halaman_utama.php">Registrasi <span class="sr-only">(current)</span></a>
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
	<h1>Update Data Siswa</h1>
</p>

<form action="" method="post" class="form-group">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $person['nama']; ?> ">
  </div>
  <div class="form-group">
	<label>NIK</label>
  <input type="text" name="nik"  class="form-control" value="<?= $person['nik']; ?>">
  </div>
  <div class="form-group">
  <label>Alamat</label>
  <input type="text" name="alamat"  class="form-control" value="<?= $person['alamat']; ?>">
  </div>
  <div class="form-group">
  <label>Telepon</label>
  <input type="text" name="no_telp"  class="form-control" value="<?= $person['no_telp']; ?>"> 
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit Data</button>
  
</form>