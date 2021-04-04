<?php  
require_once '../_config/config.php';
require_once '../_header.php';
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'");
$data = mysqli_fetch_assoc($query);

?>

<div class="box">
	<h1>Obat</h1>
	<h4>
		<small>Edit Data Obat</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-chevron-left"></i>
			</a>
		</div>
	</h4>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="process.php" method="post">
				<div class="form-group">
					<input type="hidden" name="id_obat" value="<?=$data['id_obat'];?>">
					<label for="nama_obat">Nama Obat</label>
					<input type="text" name="nama_obat" class="form-control" required id="nama_obat" value="<?=$data['nama_obat'];?>">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan : </label>
					<textarea name="keterangan" id="keterangan" class="form-control" required>
						<?=$data['keterangan'];?>
					</textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="edit" class="btn btn-success">Update</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require_once '../_footer.php'; ?>