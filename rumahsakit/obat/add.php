<?php  
require_once '../_header.php';

?>

<div class="box">
	<h1>Obat</h1>
	<h4>
		<small>Tambah Data Obat</small>
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
					<label for="nama_obat">Nama Obat</label>
					<input type="text" name="nama_obat" class="form-control" required id="nama_obat">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan : </label>
					<textarea name="keterangan" id="keterangan" class="form-control" required>
					</textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="add" class="btn btn-success">Add</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require_once '../_footer.php'; ?>