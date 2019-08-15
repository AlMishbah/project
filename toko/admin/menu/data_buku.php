<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
<div class="col-md-8">
<h3>Data Buku</h3>
	<?php 
		$qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_buku");
		$jumlah = mysqli_num_rows($qjumlah);
	 ?>
	<a class="btn btn-sm btn-success" href="?menu=tambah_buku">Tambah Data</a>
	<button class="btn btn-sm btn-default">Jumlah Data <span class="badge"><?php echo $jumlah; ?></span></button>
	<a class="btn btn-sm btn-primary" href="?menu=data_buku">Refresh / Tampil all data</a>
	</div>

	<div class="col-xs-6 col-md-4">
		<form method="post">
		<div class="input-group">
			<input name="inputan" type="text" class="form-control" placeholder="cari buku...">
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
			<th>Judul</th>
			<th>Noisbn</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Tahun</th>
			<th>Stok</th>
			<th>Harga Jual</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no =1;
		$inputan = $_POST['inputan'];
		if ($_POST['cari']) {
			if ($inputan=="") {
			$q = mysqli_query($koneksi,"SELECT * FROM tb_buku");
			}
			else if ($inputan!="") {
				$q = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE judul LIKE '%$inputan%' ");
			}
		}
		else {
			$q = mysqli_query($koneksi,"SELECT * FROM tb_buku");
		}

			$cek = mysqli_num_rows($q);

			if ($cek < 1) {
				?>
				<tr>
					<td colspan="12">
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
			<td><?php echo $data['judul']; ?></td>
			<td><?php echo $data['noisbn']; ?></td>
			<td><?php echo $data['penulis']; ?></td>
			<td><?php echo $data['penerbit']; ?></td>
			<td><?php echo $data['tahun']; ?></td>
			<td><?php echo $data['stok']; ?></td>
			<td>Rp.<?php echo $data['harga_jual']; ?></td>
			<td>

				<a class="btn btn-sm btn-info" title="Edit" href="?menu=edit_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				|
				<a class="btn btn-sm btn-danger onclick="return confirm('Anda yakin menghapusnya')" title="Hapus" href="?menu=hapus_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

				<a class="btn btn-xs btn-warning" title="Pasok Buku" href="?menu=input_pemasukan&id_buku=<?php echo $data['id_buku']; ?>" aria-hidden="true">Pasok</span></a>
			</td>
		</tr>
		<?php } } ?>
	</tbody>

</table>
</body>
</html>