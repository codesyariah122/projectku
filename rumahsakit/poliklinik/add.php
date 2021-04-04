<?php 
require_once '../_header.php';
?>

<div class="box">
	<h1>Poliklinik</h1>
	<h4>
		<small>Data Poliklinik</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-default btn-xs">
				Data
			</a>
			<a href="generate.php" class="btn btn-primary btn-xs"> 
				Tambah data lagi
			</a>
		</div>
	</h4>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<form action="process.php" method="post">
				<input type="hidden" name="total" value="<?=$_POST['count_add'];?>">
				<table class="table">
					<tr>
						<th>#</th>
						<th>Nama Poliklinik</th>
						<th>Gedung</th>
					</tr>
					<?php  for($i=1; $i<=$_POST['count_add']; $i++):?>
						<tr>
							<td><?=$i;?></td>

							<td>
								<input type="text" name="nama_poli-<?=$i;?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="gedung-<?=$i;?>" class="form-control" required>
							</td>
						</tr>
					<?php endfor; ?>
				</table>
				<div class="form-group pull-right">
					<button type="submit" name="add" class="btn btn-info">Simpan Semua</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require_once '../_footer.php'; ?>