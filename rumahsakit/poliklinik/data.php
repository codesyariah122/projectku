<?php 
require_once '../_config/config.php';
require_once '../_header.php'; 
$sql = "SELECT * FROM tb_poli ORDER BY nama_poli ASC";
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<div class="box">
	<h1>Poliklinik</h1>
	<h4>
		<small>Data Poliklinik</small>
		<div class="pull-right">
			<a href="" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-refresh"></i>
				Refresh
			</a>
			<a href="generate.php" class="btn btn-default btn-xs">
				<i class="glyphicon glyphicon-plus"></i> Tambah Data
			</a>
		</div>
	</h4>
</div>

<form method="post" name="process">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Poli</th>
					<th>Gedung</th>
					<th class="text-center">
						<center>
							<input type="checkbox" id="select_all">
						</center>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if(mysqli_num_rows($query) > 0): ?>
					<?php $no=1; while($data = mysqli_fetch_array($query)): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$data['nama_poli'];?></td>
						<td><?=$data['gedung'];?></td>
						<td>
							<center>
								<input type="checkbox" name="checked[]" class="check" value="<?=$data['id_poli'];?>">
							</center>
						</td>
					</tr>
				<?php endwhile; ?>
				<?php else: ?>
					<tr>
						<td colspan="4">Data belum tersedia</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>	
</form>

<div class="box pull-right">
	<button class="btn btn-warning btn-sm" onclick="edit()">
		<i class="glyphicon glyphicon-edit"></i>	Edit
	</button>
	<button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		const checkAll = $('#select_all')
		const check = $('.check')
		checkAll.on('click', function(){
			if(this.checked){
				check.each(function() {
					this.checked = true
				})
			}else{
				check.each(function() {
					this.checked = false
				})
			}
		})

		check.on('click', function(){
			if($('.check:checked').length == $('.check')){
				$('#select_all').props('checked', true)
			}else{
				$('#select_all').props('checked', false)
			}
		})
	})

	function edit(){
		document.process.action = 'edit.php'
		document.process.submit()
	}

	function hapus(){

		let confir = confirm('Yakin akan menghapus ? ')
		if(confir){
			document.process.action = 'del.php'
			document.process.submit()
		}
	}
</script>

<?php require_once '../_footer.php'; ?>