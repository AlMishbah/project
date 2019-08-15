<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENJUALAN</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kasir</th>
			<th>Total</th>
			<th>Uang Pembeli</th>
			<th>Uang kembali</th>
			<th>Tanggal</th>
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
			$q = mysqli_query($koneksi,"SELECT tb_jual.*,tb_kasir.* FROM tb_jual INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir");
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