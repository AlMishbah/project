	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
		<body>

			<div class="row">
				<h3>Rubah informasi tentang anda</h3>
					<div class="col-md-8">
				
						<form method="post">
						  <div class="form-group">
						    <label>Nama</label>
						    <input type="text" name="nama" class="form-control" value="<?php echo $profil['nama']; ?>">
						  </div>

						  <div class="form-group">
						    <label">Alamat</label>
						    <textarea class="form-control" name="alamat"> <?php echo $profil['alamat']; ?></textarea>
						  </div>

						  <div class="form-group">
						    <label>Telepon</label>
						    <input type="text" name="telp" class="form-control" value="<?php echo $profil['telepon']; ?>" ">
						  </div>
					<div class="form-group">
				    <input type="submit" name="edit_profil" class="btn btn-sm btn-success" value="Simpan">
				    <a class="btn btn-sm btn-danger" href="?menu=profil">Batal</a>
				    <?php 
				    if (isset($_POST['edit_profil'])) {
				    	$nama = $_POST['nama'];
				    	$alamat = $_POST['alamat'];
				    	$telp = $_POST['telp'];
				    	mysqli_query($koneksi,"UPDATE tb_kasir SET nama='$nama', alamat='$alamat', $telepon='$telp' WHERE id_kasir'$profil[id_kasir]'");
				     ?>
				     <script type="text/javascript">
				     	alert('Perubahan telah tersimpan');
				     	document.location.href="?menu=profil";
				     </script>
				     <?php
				     } 
				      ?>
				 </div>
					</form>
					</div>
			</div>
		</body>
	</html>