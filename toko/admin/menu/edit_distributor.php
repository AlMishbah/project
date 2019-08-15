	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>
			<?php 
				$id = $_GET['id_distributor'];
				$query = mysqli_query($koneksi, "SELECT * FROM tb_distributor WHERE  id_distributor='$id'");
				$data = mysqli_fetch_array($query);
			 ?>
			<div class="row">
				<h3>Edit Data Distributor</h3>
					<div class="col-md-8">
				
						<form method="post" action="">
						  <div class="form-group">
						    <label>Nama</label>
						    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_distributor']; ?>">
						  </div>

						  <div class="form-group">
						    <label">Alamat</label>
						    <textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
						  </div>

						  <div class="form-group">
						    <label>Email</label>
						    <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>">
						  </div>

						  <div class="form-group">
						    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
						    <a class="btn btn-sm btn-danger" href="?menu=data_distributor">Kembali</a>
						  </div>
						</form>

						<?php 
						if (isset($_POST['fsimpan'])) {
							$nama = $_POST['nama'];
							$alamat = $_POST['alamat'];
							$email = $_POST['email'];

							$q = "UPDATE tb_distributor SET nama_distributor='$nama', alamat='$alamat', email='$email' WHERE id_distributor='$id' ";

							mysqli_query($koneksi,$q);
							?>
							<script type="text/javascript">
								alert('Berhasil merubah Distributor');
								document.location.href="?menu=data_distributor";
							</script>
							<?php 
						}

						 ?>
					</div>
			</div>
		</body>
	</html>