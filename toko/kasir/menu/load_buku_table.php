<h2>Pilih Buku</h2>
	<br>
		<div class="col-md-6">

			<form action="" class="form-inline" method="post">
				<input class="form-control" type="text" name="carian" placeholder="Cari Buku..."><input class="btn btn-sm btn-info" type="submit" name="cari" value="cari">
				<a class="btn btn-sm btn-success" href="?menu=load_buku">Refresh / Tampil All</a>
			</form>
			<br>
			<table class="table table-bordered">
				<?php
					$inputan = $_POST['carian'];
					if (isset($_POST['cari'])) {
					 	if ($inputan=="") {
							$buku = mysqli_query($koneksi,"SELECT * FROM tb_buku"); 		
					 	}
					 	elseif ($inputan !="") {
					 		$buku = mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE judul LIKE '%$inputan%'");
					 	}
					 }
					 else {
					 	$buku = mysqli_query($koneksi,"SELECT * FROM tb_buku");
					 }
					$cek = mysqli_num_rows($buku);
					if ($cek < 1) {
						?>
							<tr>
								<td> Tidak ada data <a class="btn btn-sm btn-success" href="?menu=load_buku">Refresh</a></td>
							</tr>
						<?php
					}else{
					while ($data = mysqli_fetch_array($buku)) {
				 ?>
				 
				 <tr>
				 	<td><?php echo $data['judul']; ?></td>
				 	<td><?php echo $data['stok']; ?></td>
				 	<td>Rp.<?php echo $data['harga_jual']?></td>
				 	<td><a class="btn btn-sm btn-block btn-warning" href="?menu=input_penjualan&id_buku=<?php echo $data['id_buku']; ?>">Pilih</a></td>
				 </tr>
				<?php }  }?>
			</table>
		</div>