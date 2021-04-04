<?php 
require_once '../_header.php';
?>

<div class="box">
	<h1>Poliklinik</h1>
	<h4>
		<small>Tambah Data Poliklinik</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-chevron-left"></i> Data
			</a>
		</div>
	</h4>

	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="add.php" method="post">
				<div class="form-group">
					<label for="count_add">Banyak Record yang ditambahkan</label>
					<input type="text" name="count_add" id="count_add" max-length="2" pattern="[0-9]+" class="form-control" required>
				</div>
				<div class="form-group pull-right">
					 <button type="submit" name="generate" class="btn btn-primary">Generate</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require_once '../_footer.php'; ?>