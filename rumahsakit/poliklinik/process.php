<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once '../_config/config.php';
require_once '../_assets/libs/vendor/autoload.php';


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])):
	$total = $_POST['total'];
	for($i=1; $i<=$total; $i++){
		$uuid = Uuid::uuid4()->toString();
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama_poli-'.$i]));
		$gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-'. $i]));

		$query = "INSERT INTO tb_poli (id_poli, nama_poli, gedung) VALUES('$uuid', '$nama', '$gedung')";
		mysqli_query($con, $query) or die (mysqli_error($con));
	}

	if($query){
		echo "
		<script>
		alert('".$total." data ditambahkan');
		window.location='data.php';
		</script>
		";
	}else{	
		echo "
			<script>
			alert('Gagal menambahkan data');
			window.location='generate.php';
			</script>
			";
	}
?>



<?php 
	elseif(isset($_POST['edit'])):
		// var_dump(count($_POST['id_poli'])); die;
		for($i=0; $i <= count($_POST['id_poli']); $i++):
			$id = $_POST['id_poli'][$i]; 
			$nama = $_POST['nama_poli'][$i];
			$gedung = $_POST['gedung'][$i];
			mysqli_query($con, "UPDATE tb_poli SET nama_poli='$nama', gedung='$gedung' WHERE id_poli= '$id'");
			echo "
				<script>
					alert('Data berhasil di update');
					window.location='data.php';
				</script>
			";
		endfor;
?>

<?php endif; ?>