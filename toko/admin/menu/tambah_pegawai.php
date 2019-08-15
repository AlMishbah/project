	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>

			<div class="row">
				<h3>Tambah Pegawai</h3>
					<div class="col-md-8">
				
						<form method="post">
						  <div class="form-group">
						    <label>Nama</label>
						    <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" required="required">
						  </div>

						  <div class="form-group">
						    <label">Alamat</label>
						    <textarea class="form-control" name="alamat" placeholder="Alamat Pegawai" required="required"></textarea>
						  </div>

						  <div class="form-group">
						    <label>Telepon</label>
						    <input type="number" name="telp" class="form-control" placeholder="Nomer Telepon" required="required">
						  </div>

						  <div class="form-group">
						    <label>Status User</label>
						    <select name="status" class="form-control" required="required">
						    	<option value="Aktif">Aktif</option>
						    	<option value="Tidak Aktif">Tidak Aktif</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label>User untuk pegawai</label>
						    <input type="text" name="user" class="form-control" placeholder="username" required="required">
						  </div>

						  <div class="form-group">
						    <label>Password</label>
						    <input type="password" name="pass" class="form-control" placeholder="password" required="required">
						  </div>

						  <div class="form-group">
						    <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan" <?php header('location:admin/index.php?menu=data_pegawai'); ?>>
						    <a class="btn btn-sm btn-danger" href="?menu=data_pegawai">Kembali</a>
						  </div>
						</form>

						<?php 
						if (isset($_POST['fsimpan'])) {
							$nama = $_POST['nama'];
							$alamat = $_POST['alamat'];
							$telp = $_POST['telp'];
							$status = $_POST['status'];
							$user = $_POST['user'];
							$pass = $_POST['pass'];
							$akses = "kasir";

							$q = "INSERT INTO tb_kasir(nama, alamat, telepon, status, username, password, akses) VALUES('$nama','$alamat','$telp','$status','$user','$pass','$akses')";

							mysqli_query($koneksi,$q);
							?>
							<script type="text/javascript">
								alert('Berhasil menambahkan pegawai');
								document.location.href="?menu=data_pegawai";
							</script>
							<?php 
						}

						 ?>
					</div>
			</div>
		</body>
	</html>