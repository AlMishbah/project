<?php
  include "../inc/koneksi.php"; 

  $qprofil = mysqli_query($koneksi,"SELECT * FROM tb_kasir WHERE id_kasir='$_SESSION[userweb]'");
  $profil = mysqli_fetch_array($qprofil);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Selamat Datang <?php echo $profil['nama']; ?></h3>
<h2>Dashboard Aplikasi Toko Buku Skinfa</h2>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading"> Data Pegawai</div>
			<div class="panel-body">
				<center>
					<h3>
					<span class="glyphicon glyphicon-user"></span>
					<?php 
						$qpeg = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE akses='kasir'");
						$jmlah = mysqli_num_rows($qpeg);
						echo $jmlah;
					 ?>
					</h3>
				</center>
			</div>
		</div>
	</div>

		<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading"> Data Penjualan</div>
			<div class="panel-body">
				<center>
					<h3>
					<span class="glyphicon glyphicon-export"></span>
					<?php 
						$qpen = mysqli_query($koneksi, "SELECT * FROM tb_jual");
						$jmpen = mysqli_num_rows($qpen);
						echo $jmpen;
					 ?>
					</h3>
				</center>
			</div>
		</div>
	</div>

		<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading"> Data Distributor</div>
			<div class="panel-body">
				<center>
					<h3>
					<span class="glyphicon glyphicon-user"></span>
					<?php 
						$qdis = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
						$jmdis = mysqli_num_rows($qdis);
						echo $jmdis;
					 ?>
					</h3>
				</center>
			</div>
		</div>
	</div>

		<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading"> Data Buku</div>
			<div class="panel-body">
				<center>
					<h3>
					<span class="glyphicon glyphicon-book"></span>
					<?php 
						$qbu = mysqli_query($koneksi, "SELECT * FROM tb_buku");
						$jmbu = mysqli_num_rows($qbu);
						echo $jmbu;
					 ?>
					</h3>
				</center>
			</div>
		</div>
	</div>

		<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading"> Riwayat pemasukan</div>
			<div class="panel-body">
				<center>
					<h3>
					<span class="glyphicon glyphicon-import"></span>
					<?php 
						$qriw = mysqli_query($koneksi, "SELECT * FROM tb_pasok");
						$jmriw = mysqli_num_rows($qriw);
						echo $jmriw;
					 ?>
					</h3>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>