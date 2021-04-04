<?php 
if(!isset($_POST['checked'])):
	echo "
		<script>
			alert('Tidak ada data yang dipilih');
			window.location='data.php'
		</script>
	";
else:
$chk = $_POST['checked'];
require_once '../_header.php';

?>

<div class="box">
	<h1>Poliklinik</h1>
	<h4>
		<small>Data Poliklinik</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-default btn-xs">
				Kembali
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
					<?php 
						$no = 1;
						foreach($chk as $id):
							$sql_poli = mysqli_query($con, "SELECT * FROM tb_poli WHERE id_poli = '$id'") or die(mysqli_error($con));
					?>
					<?php  while($data = mysqli_fetch_array($sql_poli)):?>
						<tr>
							<td><?=$no++;?></td>

							<td>
								<input type="hidden" name="id_poli[]" value="<?=$data['id_poli'];?>">
								<input type="text" name="nama_poli[]" value="<?=$data['nama_poli'];?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="gedung[]" value="<?=$data['gedung'];?>" class="form-control" required>
							</td>
						</tr>
					<?php endwhile; endforeach; ?>
				</table>
				<div class="form-group pull-right">
					<button type="submit" name="edit" class="btn btn-info">Simpan Semua</button>
				</div>
			</form>
		</div>
	</div>

</div>


<?php require_once '../_footer.php'; ?>

<?php endif; ?>