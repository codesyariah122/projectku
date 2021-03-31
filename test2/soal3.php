<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'test2');

function connect(){
	$dbhost = DB_HOST;
	$dbname = DB_NAME;
	$dbuser = DB_USER;
	$dbpass = DB_PASS;

	try{
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Ok Connection";
		return $conn;
	}catch(PDOException $e){
		echo "Connection failed " . $e->getMessage();
	}
}

function showData($query){
	$dbh = connect();
	try{
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = $dbh->query($query);
		$rows = [];

		while($row = $sql->fetch(PDO::FETCH_ASSOC)):
			$rows[] = $row;
		endwhile;
		return $rows;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function insertData($data, $table1, $table2){
	$dbh = connect();
	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$hobi = $data['hobi'];

	$insert1 = $dbh->prepare("INSERT INTO `$table1` (id, nama, alamat) VALUES (null, ?, ?)");
	$insert1->bindParam(1, $nama);
	$insert1->bindParam(2, $alamat);
	$insert1->execute();
	$lastId = $dbh->lastInsertId();
		// echo $lastId;
	$insert2 = $dbh->prepare("INSERT INTO `$table2` (id, person_id, hobi) VALUES (NULL, ?, ? )");
	$insert2->bindParam(1, $lastId);
	$insert2->bindParam(2, $hobi);
	$insert2->execute();
	return $insert1->rowCount();
}

function searchData($keyword){
	$query = "SELECT * FROM person AS p INNER JOIN hobi AS h ON p.id=h.person_id 
		WHERE `nama` LIKE '%$keyword' OR `alamat` LIKE '%$keyword' OR `hobi` LIKE '%$keyword'";

	return showData($query);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test2</title>
</head>
<body>
	<?php 
		if(isset($_POST['enter'])){
			if(empty($_POST['nama']) || empty($_POST['alamat']) || empty($_POST['hobi'])){
				$alert = true;
			}
			if(insertData($_POST, 'person', 'hobi') > 0):
				$success = true;
			endif;
		}
	 ?>

	<fieldset>
		<legend>Insert data </legend>
		<?php if(isset($success)): ?>
			<p>Data berhasil di tambahkan</p>
		<?php endif; ?>

		<?php if(isset($alert)): ?>
			<p>Form input harus di isi dengan benar</p>
		<?php endif; ?>

		<form action="" method="post">
			<label for="nama">Nama : </label>
			<input type="text" name="nama" id="nama">
			<br>
			<label for="alamat">Alamat : </label>
			<textarea name="alamat" id="alamat"></textarea>
			<br>
			<label for="hobi">Hobi : </label>
				<input type="text" name="hobi" id="hobi">
				<br>
			<button type="submit" name="enter">Add Person</button>
		</form>

	</fieldset>


	<fieldset>
		<legend>Table Data : </legend>
		 <form action="" method="post" style="margin-bottom: 2rem;">
		 	<label for="search">Cari Data</label>
		 	<input type="text" placeholder="cari data ... " name="keyword">
		 	<button type="submit" name="cari">Search</button>
		 </form>
		<?php 
		if(isset($_POST['cari'])):
			$keyword = @$_POST['keyword'];
			$dataPerson = searchData($keyword);
			// var_dump($dataPerson);
		?>
		<table border="1" width="400" height="200" style="text-align:center;">
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Hobi</th>
			</tr>
		<?php //echo count($dataPerson); 
			if(count($dataPerson) === 0):
		?>
			<tr>
				<td colspan="4" style="color:red; font-weight: 900;">
					Maaf data belum ada
				</td>
			</tr>
		<?php endif; ?>

				<?php foreach($dataPerson as $person): ?>
					<tr>
						<td><?=$person['nama'];?></td>
						<td><?=$person['alamat'];?></td>
						<td><?=$person['hobi'];?></td>
					</tr>

				<?php endforeach; ?>
		</table>
		<?php 
		else:
			$dataPerson = showData("SELECT * FROM person AS p INNER JOIN hobi AS h ON p.id=h.person_id");
			
			// echo "<pre>";
			// var_dump($dataPerson);
			// echo "</pre>";
		 ?>
		<table border="1" width="400" height="200" style="text-align:center;">
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Hobi</th>
			</tr>
				<?php foreach($dataPerson as $person): ?>
					<tr>
						<td><?=$person['nama'];?></td>
						<td><?=$person['alamat'];?></td>
						<td><?=$person['hobi'];?></td>
					</tr>
				<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</fieldset>

</body>
</html>