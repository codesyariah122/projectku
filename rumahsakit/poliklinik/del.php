<?php 
require_once '../_config/config.php';

$chk = $_POST['checked'];	
if(!isset($chk)):
	echo "
		<script>
			alert('Tidak ada data yang dipilih');
			window.location='data.php';
		</script>
	";
else:
	// echo $chk; 
	foreach($chk as $id):
		$sql = mysqli_query($con, "DELETE FROM tb_poli WHERE id_poli = '$id'") or die (mysql_error($con));
		if($sql):
			echo "
				<script>
					alert('".count($chk)." Data berhasil di delete')
					window.location='data.php'
				</script>
			";
		else:
			echo "
				<script>
					alert('Gagal hapus data')
					window.location='data'.php'
				</script>
			";
		endif;
	endforeach;
endif;
?>

