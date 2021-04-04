<?php require_once '../_header.php'; ?>

	<div class="box">
		<h1>Obat</h1>
		<h4>
			<small>Data Obat</small>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs">
					<i class="glyphicon glyphicon-refresh"></i> Refresh
				</a>
				<a href="add.php" class="btn btn-default btn-xs">
					<i class="glyphicon glyphicon-plus"></i> Tambah Data
				</a>
			</div>
		</h4>
	</div>

			<div style="margin-bottom: 15px;">
				<form class="form-inline" action="" method="POST">
					<div class="form-group">
						<input type="text" name="pencarian" class="form-control" placeholder="Pencarian data">
					</div>
					<div class="form-group">
						<button type="submit" name="cari" class="btn btn-primary">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</div>
				</form>
			</div>

			<div class="table">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Keterangan</th>
							<th class="text-center">
								<i class="glyphicon glyphicon-cog"></i>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php 
							$batas = 3;
							$hal = @$_GET['hal'];
							if(empty($hal)){
								$posisi = 0;
								$hal = 1;
							}else{
								$posisi = ($hal - 1) * $batas;
							}
							$no = 1;
							// echo $_POST['pencarian'];
							if($_SERVER['REQUEST_METHOD'] == "POST"){
								$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
								// echo $pencarian;
								if($pencarian !== ''){
									$sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%'";
									$query = $sql;
									$queryJml = $sql;
								}else{
									$query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
									$queryJml = "SELECT * FROM tb_obat";
									$no = $posisi + 1;
								}
							}else{
								$query = "SELECT * FROM tb_obat ORDER BY id_obat DESC LIMIT $posisi, $batas";
								$queryJml = "SELECT * FROM tb_obat";
								$no = $posisi + 1;
							}
							$obat=mysqli_query($con, $query) or die (mysqli_error($con));
							if(mysqli_num_rows($obat) > 0):
							?>
							<?php 
								while($row = mysqli_fetch_array($obat)):
							?>
							<tr>
								<td><?=$no++;?></td>
								<td><?=$row['nama_obat'];?></td>
								<td><?=$row['keterangan'];?></td>
								<td style="text-align: center;">
									<a href="edit.php?id=<?=$row['id_obat'];?>" class="btn btn-info">
										<i class="glyphicon glyphicon-edit"></i>
									</a>

									<a href="del.php?id=<?=$row['id_obat'];?>" class="btn btn-danger" onclick="return confirm('Yakin data akan di hapu ? ')">
										<i class="glyphicon glyphicon-trash"></i>
									</a>
								</td>
							</tr>
							<?php endwhile;?>
							<?php else: ?>
								<tr>
									<td colspan="6">
										Data tidak tersedia
									</td>
								</tr>
							<?php endif; ?>
						</tr>
					</tbody>
				</table>
			</div>	
			<?php if(isset($_POST['cari'])):  ?>
				<?php if ($_POST['pencarian'] !== ''): ?>
					<div style="float: left;">
						<?php $jml = mysqli_num_rows(mysqli_query($con, $queryJml));?>
						Data Hasil Pencarian : <b><?=$jml;?>
					</div>
				<?php endif ?>
				<?php else: ?>
					<div style="float: left;">
					<?php 
					$jml = mysqli_num_rows(mysqli_query($con, $queryJml));
					// echo $jml;
					?>
					Jumlah Data : <b><?=$jml;?></b>
				</div>
				<div style="float:right;">
					<ul class="pagination pagination-sm" style="margin:0;">
						<?php 
						$jml_hal = ceil($jml / $batas); 
						for($i=1; $i <= $jml_hal; $i++):
							if($i != $hal):
								?>
								<li>
									<a href="?hal=<?=$i;?>"><?=$i;?></a>
								</li>
								<?php else: ?>
									<li class="active" style="cursor: progress;">
										<a><?=$i;?></a>
									</li>
								<?php endif; endfor; ?>
							</ul>
						</div>
			<?php endif; ?>
		</h4>
	</div>		

<?php require_once '../_footer.php'; ?>