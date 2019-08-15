	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>

			<?php 
			if ($_GET['id_buku']=="") {
				header('location:?menu=data_buku');
			}
			$id_buku = $_GET['id_buku'];
			$qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
			$dbuku = mysqli_fetch_array($qbuku);
			 ?>

			<div class="row">
				<h3>Tambah Pasok Buku</h3>
					<div class="col-md-8">
				
						<form method="post">
						  <div class="form-group">
						    <label>Buku</label>
						    <input type="text" name="buku" class="form-control" value="<?php echo $dbuku['judul'] ?>" required="required" readonly>
						  </div>

						  <div class="form-group">
						    <label>Pilih Distributor</label>
						    <select name="id_distributor" class="form-control">
						    	<?php 
						    		$qdis = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
						    		while ($ddis = mysqli_fetch_array($qdis)) {
						    		
						    	 ?>
						    	<option value="<?php echo $ddis['id_distributor']; ?>">
						    		<?php echo $ddis['nama_distributor']; ?>
						    	</option>
						    <?php } ?>
						    </select>
						  </div>

						  <div class="form-group">
						    <label>Stok awal buku</label>
						    <input name="stok" type="text" class="form-control" value="<?php echo $dbuku['stok']; ?>" required="required" readonly>
						  </div>

						  <div class="form-group">
						    <label>Jumlah</label>
						    <input name="jumlah" type="text" class="form-control" placeholder="Jumlah Pasok" required="required">
						  </div>

						  <div class="form-group">
						    <label>Tanggal</label>
						    <input type="text" name="tanggal" class="form-control" value="<?php echo date('d-m-Y'); ?>" required="required" readonly>
						  </div>

						  <div class="form-group">
						    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan" <?php header('location:admin/index.php?menu=data_pegawai'); ?>>
						    <a class="btn btn-sm btn-danger" href="?menu=data_buku">Kembali</a>
						  </div>
						</form>

						<?php 
						if (isset($_POST['fsimpan'])) {
							$id_distributor = $_POST['id_distributor'];
							$jumlah = $_POST['jumlah'];
							$tanggal = $_POST['tanggal'];
							$stokupdate = $jumlah + $dbuku['stok'];

							$q = "INSERT INTO tb_pasok(id_distributor, id_buku, jumlah, tanggal) VALUES('$id_distributor','$id_buku','$jumlah','$tanggal')";

							mysqli_query($koneksi,$q);
							mysqli_query($koneksi,"UPDATE tb_buku SET stok='$stokupdate' WHERE id_buku='$id_buku'");
							?>
							<script type="text/javascript">
								alert('Berhasil input pemasukan');
								document.location.href="?menu=data_pemasukan";
							</script>
							<?php 
						}

						 ?>
					</div>
			</div>
		</body>
	</html>