<?php  
$jml = $_GET['jml'];
echo "<table border=1>\n";
for($a=$jml; $a > 0; $a --){
	for($c=10; $c > $a; $c --){
		$total = $c;
	}
	echo "<tr>";
		echo "<th style='text-align:left;' colspan='10'>TOTAL : ".$total." </th>";
	echo "</tr>";

	echo "<tr>\n";
	for($b=$a; $b > 0; $b --){
		echo "<td width='100' height='100'>$b</td>";
	}
	echo "</tr>\n";
}
echo "</table>";
?>
