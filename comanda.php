<?php
/*if (!isset($_GET['produs'])) return 0;


$host = "localhost";
$user = "root";
$pass = "";
$dberror="fuck";

$conn=mysqli_connect($host, $user, $pass,'clienti') or die ($dberror);

$produs = $_GET['produs'];
echo $produs;

 switch($produs)
 {
 case 'alcool':
  {
 http_response_code(403);
die('Forbidden');
}
 break;
 case 'drugs':
  echo 'not found';
  exit;
 break;
 }
 


$query = mysqli_query($conn, "SELECT cantitate FROM produse WHERE denumire='$produs'");
$cantitate = mysqli_fetch_assoc($query)['cantitate'];

if($cantitate > 0 )
 echo 'Poti Cumpara';
else
 echo 'Nu e pe stoc, o sa aducem.';




 
 declare
v_nume varchar2(100);
begin
execute immediate 'begin '||'insert_autori('||:1||');'||' end;' using v_nume;
end;*/

 
 
?>