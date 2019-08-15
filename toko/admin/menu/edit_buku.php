	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>
			
			<?php 
				$id = $_GET['id_buku'];
				$qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
				$data = mysqli_fetch_array($qbuku);
			 ?>

			<div class="row">
				<h3>Edit Buku</h3>
					<div class="col-md-6">
				
						<form method="post">
						  <div class="form-group">
						    <label>Judul</label>
						    <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required="required">
						  </div>

						  <div class="form-group">
						    <label">Noisbn</label>
						    <input type="text" name="noisbn" class="form-control" value="<?php echo $data['noisbn']; ?>" required="required">
						  </div>

						  <div class="form-group">
						    <label>Penulis</label>
						    <input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>"required="required">
						  </div>

						  <div class="form-group">
						    <label>Penerbit</label>
						    <input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>" required="required">
						  </div>

						  <div class="form-group">
						    <label>Tahun</label>
						    <input type="number" name="tahun" min="1200" max="2099" name="user" class="form-control" value="<?php echo $data['tahun']; ?>" required="required">
						  </div>

					</div>

					<div class="col-md-6">
						  <div class="form-group">
						    <label>Stok</label>
						    <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']; ?>" required="required" readonly>
						  </div>

						  <div class="form-group">
						    <label">Harga Jual</label>
						    <input type="number" name="hargapokok" class="form-control" value="<?php echo $data['harga_pokok']; ?>" required="required">
						  </div>

						  
					</div>

					<div class="form-group">
						    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan" <?php header('location:admin/index.php?menu=data_buku'); ?>>
						    <a class="btn btn-sm btn-danger" href="?menu=data_buku">Kembali</a>
						  </div>
						</form>

						<?php 
						if (isset($_POST['fsimpan'])) {
							$judul = $_POST['judul'];
							$noisbn = $_POST['noisbn'];
							$penulis = $_POST['penulis'];
							$penerbit = $_POST['penerbit'];
							$tahun = $_POST['tahun'];
							$stok = $_POST['stok'];
							$hargajual = $_POST['hargajual'];

							$q = "UPDATE tb_buku SET judul='$judul', noisbn='$noisbn', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok',harga_jual='$hargajual' WHERE id_buku='$id'";

							mysqli_query($koneksi,$q);
							?>
							<script type="text/javascript">
								alert('Berhasil menambahkan Buku');
								document.location.href="?menu=data_buku";
							</script>
							<?php 
						}

						 ?>

			</div>
		</body>
	</html>