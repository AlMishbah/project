<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
	<div class="col-md-8">
	<h3>Data Penjualan</h3>
		<?php 
		
			$qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_jual");
			$jumlah = mysqli_num_rows($qjumlah);
			
		 ?>
	</div>
</div>
</body>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kasir</th>
			<th>Total</th>
			<th>Uang Pembeli</th>
			<th>Uang kembali</th>
			<th>Buku</th>
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
			$q = mysqli_query($koneksi,"SELECT tb_jual.*,tb_kasir.* FROM tb_jual INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir
");
			}
			else if ($inputan!="") {
				$q = mysqli_query($koneksi,"SELECT tb_jual.*,tb_kasir.* FROM tb_jual INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir WHERE nama LIKE '%$inputan%' ");
			}
		}
		else {
			$q = mysqli_query($koneksi,"SELECT * FROM tb_jual 
				INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir 
				JOIN tb_penjualan ON tb_penjualan.id_jual = tb_jual.id_jual
				JOIN tb_buku ON tb_buku.id_buku = tb_penjualan.id_buku");
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
			<td><?php echo $data['nama']; ?></td>
			<td>Rp.<?php echo $data['total']; ?></td>
			<td>Rp.<?php echo $data['uang']; ?></td>
			<td>Rp.<?php echo $data['kembali']; ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['tanggal']; ?></td> 
			<td>
				<a class="btn btn-xs btn-success" href="?menu=cetak" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
			</td>

		</tr>
		<?php } } ?>
	</tbody>

</table>
</body>
</html>