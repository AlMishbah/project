	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>

			<div class="row">
				<h3>Tambah Buku</h3>
					<div class="col-md-6">
				
						<form method="post">
						  <div class="form-group">
						    <label>Judul</label>
						    <input type="text" name="judul" class="form-control" placeholder="Judul Buku" required="required">
						  </div>

						  <div class="form-group">
						    <label">Noisbn</label>
						    <input type="text" name="noisbn" class="form-control" placeholder="Noisbn" required="required">
						  </div>

						  <div class="form-group">
						    <label>Penulis</label>
						    <input type="text" name="penulis" class="form-control" placeholder="Penulis" required="required">
						  </div>

						  <div class="form-group">
						    <label>Penerbit</label>
						    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" required="required">
						  </div>

						  <div class="form-group">
						    <label>Tahun</label>
						    <input type="number" name="tahun" min="1200" max="2099" name="user" class="form-control" placeholder="Tahun" required="required">
						  </div>

					</div>

					<div class="col-md-6">
						  <div class="form-group">
						    <label>Stok</label>
						    <input type="number" name="stok" class="form-control" placeholder="Stok" required="required">
						  </div>

						  <div class="form-group">
						    <label">Harga Jual</label>
						    <input type="number" name="hargapokok" class="form-control" placeholder="Harga jual dihitung otomatis" required="required">
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
							$harga_jual = $_POST['hargajual'];

							$q = "INSERT INTO tb_buku(judul, noisbn, penulis, penerbit, tahun, stok, harga_jual) VALUES('$judul','$noisbn','$penulis','$penerbit','$tahun','$stok','$harga_jual',')";

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