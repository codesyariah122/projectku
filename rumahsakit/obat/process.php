<?php  
require_once '../_config/config.php';
require_once '../_assets/libs/vendor/autoload.php';


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])):
	$uuid = Uuid::uuid4()->toString();
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama_obat']));
	$ket = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
	$query = "INSERT INTO tb_obat (id_obat, nama_obat, keterangan) VALUES('$uuid', '$nama', '$ket')";
	mysqli_query($con, $query) or die (mysqli_error($con));
	echo "
		<script>
			window.location='data.php';
		</script>
	";
?>



<?php 
	elseif(isset($_POST['edit'])): 
		$id_obat = $_POST['id_obat'];
		$nama = $_POST['nama_obat'];
		$keterangan = $_POST['keterangan'];
		$sql = "UPDATE tb_obat SET nama_obat='$nama', keterangan='$keterangan' WHERE id_obat='$id_obat'";
		mysqli_query($con, $sql) or die(mysqli_error($con));
		echo "
			<script>
				window.location.href='data.php';
			</script>
		";
?>

<?php endif; ?>