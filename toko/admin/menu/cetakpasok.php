<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<center>
 
		<h2>DATA LAPORAN PASOK</h2>
 
	</center>
	<?php 
	include 'koneksi.php';
	?>
<div class="row">
<div class="col-md-8">
<h3>Pasok Pembelian Buku</h3>
	<?php 
		$qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_pasok");
		$jumlah = mysqli_num_rows($qjumlah);
	 ?>
	<button class="btn btn-sm btn-default">Jumlah Data <span class="badge"><?php echo $jumlah; ?></span></button>
	<a class="btn btn-sm btn-primary" href="?menu=data_pemasukan">Refresh / Tampil all data</a>
	</div>


	<div class="col-xs-6 col-md-4">
		<form method="post">
		<div class="input-group">
			<input name="inputan" type="text" class="form-control" placeholder="Cari...">
			<span class="input-group-btn">
				<input name="cari" class="btn btn-default" value="Cari" type="submit">
			</span>
		</div>
	</form>
	</div>
</body>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Distributor</th>
			<th>Judul Buku</th>
			<th>Jumlah</th>
			<th>Tanggal</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no =1;
		$inputan = $_POST['inputan'];
		if ($_POST['cari']) {
			if ($inputan=="") {
			$q = mysqli_query($koneksi,"SELECT tb_buku.*,tb_distributor.*,tb_pasok.* FROM tb_pasok INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku");
			}
			else if ($inputan!="") {
				$q = mysqli_query($koneksi,"SELECT tb_buku.*,tb_distributor.*,tb_pasok.* FROM tb_pasok INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku WHERE nama_distributor LIKE '%$inputan%' OR judul LIKE '%$inputan%'");
			}
		}
		else {
			$q = mysqli_query($koneksi,"SELECT tb_buku.*,tb_distributor.*,tb_pasok.* FROM tb_pasok INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku
");
		}

			$cek = mysqli_num_rows($q);

			if ($cek < 1) {
				?>
				<tr>
					<td colspan="7">
						<center>
						Data yang anda cari tidak tersedia
						<a href="" class="btn btn-success"><span class="
							glyphicon glyphicon-refresh"></span></a>
						</center>
					</td>
				</tr>
				<?php 
			}
			else {
		
		while ($data = mysqli_fetch_array($q)) {
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama_distributor']; ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['tanggal']; ?></td> 
		</tr>
		<?php } } ?>
	</tbody>
</table>
<script>
		window.print();
	</script>
</body>
</html>