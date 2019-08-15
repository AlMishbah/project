	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>
			<?php 
				$id = $_GET['id_pegawai'];
				$query = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE  id_kasir='$id'");
				$data = mysqli_fetch_array($query);
			 ?>
			<div class="row">
				<h3>Edit Data Pegawai</h3>
					<div class="col-md-8">
				
						<form method="post" action="">
						  <div class="form-group">
						    <label>Nama</label>
						    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
						  </div>

						  <div class="form-group">
						    <label">Alamat</label>
						    <textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
						  </div>

						  <div class="form-group">
						    <label>Telepon</label>
						    <input type="number" name="telp" class="form-control" value="<?php echo $data['telepon']; ?>">
						  </div>

						  <div class="form-group">
						    <label>Status User</label>
						    <select name="status" class="form-control">
						    	<option value="aktif" <?php if($data['status']=="aktif"){ echo "selected"; } ?>>Aktif</option>
						    	<option value="nonaktif" <?php if($data['status']=="nonaktif"){ echo "selected"; } ?>>Tidak Aktif</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
						    <a class="btn btn-sm btn-danger" href="?menu=data_pegawai">Kembali</a>
						  </div>
						</form>

						<?php 
						if (isset($_POST['fsimpan'])) {
							$nama = $_POST['nama'];
							$alamat = $_POST['alamat'];
							$telp = $_POST['telp'];
							$status = $_POST['status'];

							$q = "UPDATE tb_kasir SET nama='$nama', alamat='$alamat', telepon='$telp', status='$status' WHERE id_kasir='$id' ";

							mysqli_query($koneksi,$q);
							?>
							<script type="text/javascript">
								alert('Berhasil merubah pegawai');
								document.location.href="?menu=data_pegawai";
							</script>
							<?php 
						}

						 ?>
					</div>
			</div>
		</body>
	</html>