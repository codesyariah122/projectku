<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
class App {
	public $host, $user, $pass, $db;

	public function __construct(){
		$this->host;
		$this->user;
		$this->pass;
		$this->db;
	}

	public function connectDB(){
		$this->host = DB_HOST;
		$this->user = DB_USER;
		$this->pass = DB_PASS;
		$this->db = DB_NAME;
		try{
			$conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo "Connection successfully<br/>";
			return $conn;
		}catch(PDOException $e){
			echo "Connection failed ". $e->getMessage();
		}
	}

	public function createTB($tbname){
		$sql = "CREATE TABLE IF NOT EXISTS ". $tbname ."(
			id INT(11) AUTO_INCREMENT PRIMARY KEY, 
			product_name VARCHAR(50) NOT NULL, 
			price VARCHAR(50) NOT NULL, 
			category VARCHAR(50) NOT NULL, 
			description VARCHAR(50) NOT NULL 
			)";
		try{
			$this->connectDB()->exec($sql);
			// echo "Table ".$tbname." created successfully";
		}catch(PDOException $e){
			echo $sql . "<br/>" . $e->getMessage();
		}
	}


	public function addProduct($data, $table){
		$dbh = $this->connectDB();
		$id = '';
		$productName = @$data['product_name'];
		$productPrice = @$data['product_price'];
		$productCategory = @$data['product_category'];
		$productDesc = @$data['product_description'];

		$insertProduct = $dbh->prepare("INSERT INTO `$table` (id, product_name, price, category, description) VALUES (NULL, ?, ?, ?, ?)");

		$insertProduct->bindParam(1, $productName);
		$insertProduct->bindParam(2, $productPrice);
		$insertProduct->bindParam(3, $productCategory);
		$insertProduct->bindParam(4, $productDesc);

		$insertProduct->execute();

		return $insertProduct->rowCount();
		
	}


	public function showProduct($query){
		$dbh = $this->connectDB();
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

}