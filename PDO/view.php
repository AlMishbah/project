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
  
<?php
$sqlReadData = "SELECT * FROM student";
$dbConnect = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
$statementReadData = $dbConnect->prepare($sqlReadData);
		$statementReadData->execute();
    $getData = $statementReadData->fetchAll(PDO::FETCH_ASSOC);

?>
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>NIK</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Action</th>
			</tr>
		<?php foreach ($getData as $key => $data) { ?>
				<tr>
					<td><?= $data['id'] ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['nik'] ?></td>
          <td><?= $data['alamat'] ?></td>
          <td><?= $data['no_telp'] ?></td>
          <td>
              <a href="update.php?id=<?= $data['id'] ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Anda yakin akan menghapusnya?')" href="delete.php?id=<?= $data['id'] ?>" class='btn btn-danger'>Delete</a>
            </td>
				</tr>
			
    <?php }
?>
<div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://www.instagram.com/roihanmish_28/"> Roihan Mishbahul Anam</a>
  </div>
  </body>
</html>