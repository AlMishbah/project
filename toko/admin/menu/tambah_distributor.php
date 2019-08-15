	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>

			<div class="row">
				<h3>Tambah Distributor</h3>
					<div class="col-md-8">
				
						<form method="post">
						  <div class="form-group">
						    <label>Nama</label>
						    <input type="text" name="nama" class="form-control" placeholder="Nama Distributor" required="required">
						  </div>

						  <div class="form-group">
						    <label">Alamat</label>
						    <textarea class="form-control" name="alamat" placeholder="Alamat Distributor" required="required"></textarea>
						  </div>

						  <div class="form-group">
						    <label>Email</label>
						    <input type="text" name="email" class="form-control" placeholder="Masukan Email" required="required">
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

							$q = "INSERT INTO tb_distributor(nama_distributor, alamat, email) VALUES('$nama','$alamat','$email')";

							mysqli_query($koneksi,$q);
							?>
							<script type="text/javascript">
								alert('Berhasil menambahkan distributor');
								document.location.href="?menu=data_distributor";
							</script>
							<?php 
						}

						 ?>
					</div>
			</div>
		</body>
	</html>