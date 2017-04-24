<?php
if (!isset($_GET['produs'])) return 0;

echo 'SSSS';
$host = "localhost";
$user = "root";
$pass = "";
$dberror="fuck";

$conn=mysqli_connect($host, $user, $pass,'clienti') or die ($dberror);
if($conn== true) {
echo "Succes";
}
$produs = $_GET['produs'];

$result = $conn->query('SELECT * FROM produse WHERE denumire="'.$produs.'"');
if (!$result->num_rows) return 0;

$result = $conn->query('INSERT INTO comenzi()');
	
	
	
	
?>