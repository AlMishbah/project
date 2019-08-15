<?php 
	$id_buku = $_GET['id_buku'];
	$qbuku = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku ='$id_buku'");
	$buku = mysqli_fetch_array($qbuku);

	//Kode Otomatis
	$qkode = mysqli_query($koneksi,"SELECT max(id_jual) FROM tb_jual");
	$kode =  mysqli_fetch_array($qkode);
	if ($kode) {
		$nilai = $kode[0];
		$nilai = substr($nilai, 3);
		$nilai = (int)$nilai;
		$kodebaru = $nilai +1;
		$kode_otomatis = "KD".str_pad($kodebaru,4,"0",STR_PAD_LEFT);

	}else{
		$kode_otomatis = "KD001";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<h4>Input Penjualan</h4>
	<form action="" class="form-inline" method="post">
		<a href="?menu=load_buku" class="btn btn-info">Load Buku</a>
		<input type="text" placeholder="Pilih Buku" readonly="readonly" required="required" value="<?php echo $buku['judul'] ?>" class="form-control">
		<input type="number" max="<?php echo $buku['stok']; ?>" name="jumlah" placeholder="Jumlah beli max <?php echo $buku['stok']; ?>" class="form-control">
		<input type="submit" name="tambah" value="Tambah ke keranjang" class="btn btn-primary">
	</form>	
	<?php 
	if (isset($_POST['tambah'])) {
		$jumlah = $_POST['jumlah'];
		$id_kasir = $profil['id_kasir'];
		$jumlah_harga = $buku['harga_jual'] * $jumlah;

		// Cek
		$sql = mysqli_query($koneksi,"SELECT * FROM tb_keranjang JOIN tb_buku ON tb_buku.id_buku=tb_keranjang.id_buku WHERE tb_keranjang.id_buku='$id_buku'");
		// Cek Jumlah
		$jml = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
		if($jml === 0){
			$sql = mysqli_query($koneksi,"INSERT INTO tb_keranjang(id_buku,id_kasir,jumlah,jumlah_harga)values('$id_buku','$id_kasir','$jumlah','$jumlah_harga')")or die(mysql_error($koneksi));			
		}else{
			// Hitung
			$jumlah_buku = $data['jumlah'] + $jumlah;
			$jumlah_harga = $data['harga_jual'] * $jumlah_buku;
			$id_keranjang = $data['id_keranjang'];
			$sql = mysqli_query($koneksi,"UPDATE tb_keranjang SET jumlah='$jumlah_buku', jumlah_harga='$jumlah_harga' WHERE id_buku='$id_buku'");	
		}
		$query = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
		$data_stock = mysqli_fetch_assoc($query);
		$stock = $data_stock['stok']-$jumlah;

		$update = mysqli_query($koneksi, "UPDATE tb_buku SET stok='$stock' WHERE id_buku='$id_buku'");

		if($sql){
		
	?>
		<div class="alert alert-success">
			Berhasil tambah keranjang !
		</div>
		<meta http-equiv="refresh" content="1; url='?menu=input_penjualan'">
	<?php
		}else{
			echo mysqli_error($koneksi);
		}

	} 
	 ?>
	<hr>
	<h4><span class="glyphicon glyphicon-shopping-cart"></span>Keranjang</h4>
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Buku</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Jumlah Harga</th>
			<th>Action</th>
		</tr>
		<?php
			$no = 1;
			$qker = mysqli_query($koneksi,"SELECT tb_buku.*,tb_kasir.*,tb_keranjang.* FROM tb_keranjang INNER JOIN tb_buku ON tb_buku.id_buku=tb_keranjang.id_buku INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_keranjang.id_kasir");
			while ($data = mysqli_fetch_array($qker)) {
			
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td>Rp.<?php echo $data['harga_jual']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td>Rp.<?php echo $data['jumlah_harga']; ?></td>
			<td>
				<a onclick="return confirm('Anda yakin akan mengahapus buku <?php echo $data['judul'] ?> dari keranjang ?')" href="?menu=hapus_ker&id_keranjang=<?php echo $data['id_keranjang']; ?>&id_buku=<?php echo $data['id_buku']; ?>&jumlah=<?php echo $data['jumlah'] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>

			</td>
		</tr>
		<?php } ?>
		<tr>
			<th class="text-right" colspan="4">Total Harga</th>
			<td colspan="2">
				Rp.
				<?php 
					$qtotal = mysqli_query($koneksi,"SELECT SUM(jumlah_harga) AS total FROM tb_keranjang");
					$total = mysqli_fetch_array($qtotal);
					echo number_format($total['total'],2);
				 ?>
			</td>
		</tr>
	</table>
	<hr>
	<?php 
		$qk = mysqli_query($koneksi,"SELECT * FROM tb_keranjang");
		$cek = mysqli_num_rows($qk);
		if ($cek > 0) {
			
	 ?>
	<div class="col-md-4">
		<h1><small>Harga Total</small><br>
			Rp.<?php echo number_format($total['total'],2) ?>
		</h1>
		<form action="" class="form-inline" method="post">
			<input type="number" name="uang" placeholder="Masukan uang pembeli" class="form-control">
			<input type="submit" name="proses" value="proses" class="btn btn-success">
		</form>
	</div>
	<div class="col-md-4">
		<?php 
			if (isset($_POST['proses'])) {
				$uang = $_POST['uang'];
				$kembali = $uang - $total['total'];

				$tanggal = date('Y-m-d');
				mysqli_query($koneksi,"INSERT INTO tb_penjualan(id_buku,jumlah,jumlah_harga,id_jual) SELECT id_buku,jumlah,jumlah_harga,'$kode_otomatis' FROM tb_keranjang");

				// Masukan data ke tb_jual
				mysqli_query($koneksi,"INSERT INTO tb_jual(id_jual,total,uang,kembali,id_kasir,tanggal) VALUES('$kode_otomatis','$total[total]','$uang','$kembali','$profil[id_kasir]','$tanggal')");


			?> 
				<blockquote>
					<h3>
						<small>Uang Pembeli</small>
						Rp. <?php echo number_format($uang,2); ?>
					</h3>
					<h2>
						<small>Uang kembali</small>
						Rp. <?php echo number_format($kembali,2); ?>
					</h2>
				</blockquote>
		</div>
		<div class="col-md-4">
			<br><br>
			<a href="?menu=selesai" class="btn btn-success">Selesai dan Bersihkan keranjang</a>
		</div>
	<?php } } ?>
</body>
</html>