<?php 

include_once('meniu.php');
$host = "localhost";
$user = "root";
$pass = "";
$dberror="damn";

$conn=mysqli_connect($host, $user, $pass,'clienti') or die ($dberror);
if(!$conn) {return 0;}

$query= "select * from clienti";
//sql prin care sa iei produsele comandate la masa in momentul respectiv, + pret
$result = mysqli_query ($conn, $query) or exit("The query could not be performed");

//if(isset($_SERVER['HTTP_REFERER'])) {
   //echo '	<br>';
  //echo $_SERVER['HTTP_REFERER'];}

  $resultsArray = [];
  while ($row=$result->fetch_assoc())
  {
	  array_push($resultsArray,$row);
  }
  echo '<script>data = '.json_encode($resultsArray).';</script>';
  
?>
<div class="container">
	<h2 align=center>Masa</h2>
	<div class="row tables">
		<div class="col-sm-3" id="1">Masa 1</div>
		<div class="col-sm-3" id="2">Masa 2</div>
		<div class="col-sm-3" id="3">Masa 3</div>
		<div class="col-sm-3" id="4">Masa 4</div>
	</div>
	<div class="row tables">
		<div class="col-sm-3" id="5">Masa 5</div>
		<div class="col-sm-3" id="6">Masa 6</div>
		<div class="col-sm-3" id="7">Masa 7</div>
		<div class="col-sm-3" id="8">Masa 8</div>
	</div>
</div>


<ul class="hours">
	<h2>Intervarul orar</h2>
	<li><a href="javascript:showHour(8);">08:00</a></li>
	<li><a href="javascript:showHour(9);">09:00</a></li>
	<li><a href="javascript:showHour(10);">10:00</a></li>
	<li><a href="javascript:showHour(11);">11:00</a></li>
	<li><a href="javascript:showHour(12);">12:00</a></li>
	<li><a href="javascript:showHour(13);">13:00</a></li>
	<li><a href="javascript:showHour(14);">14:00</a></li>
	<li><a href="javascript:showHour(15);">15:00</a></li>
	<li><a href="javascript:showHour(16);">16:00</a></li>
	<li><a href="javascript:showHour(17);">17:00</a></li>
	<li><a href="javascript:showHour(18);">18:00</a></li>
	<li><a href="javascript:showHour(19);">19:00</a></li>
</ul>

<ul class="days">
	<h2>Ziua</h2>
	<li class="active">1</li>
	<li>2</li>
	<li>3</li>
	<li>4</li>
	<li>5</li>
	<li>6</li>
	<li>7</li>
	<li>8</li>
	<li>9</li>
	<li>10</li>
	<li>11</li>
	<li>12</li>
	<li>13</li>
	<li>14</li>
	<li>15</li>
	<li>16</li>
	<li>17</li>
	<li>18</li>
	<li>19</li>
	<li>20</li>
	<li>21</li>
	<li>22</li>
	<li>23</li>
	<li>24</li>
	<li>25</li>
	<li>26</li>
	<li>27</li>
	<li>28</li>
	<li>29</li>
	<li>30</li>

</ul>

<script>
	$(document).ready(function(){
		$('.days li').click(function(e){
			$('.days li').removeClass('active');
			$(this).addClass('active');
		});
	});
	function showHour(hour){
		var i=0;
		var selectedDate = $('.days li.active').html();
		$('.tables .col-sm-3').removeClass('active');
		if (!data[i]) return;
		
		while (data[i])
		{
			var oraIntrareClient = new Date(data[i].data_intrare);
			var ziuaIntrareClient = oraIntrareClient.getDate();
			
			oraIntrareClient = oraIntrareClient.getHours();
			var oraIesireClient = new Date(data[i].data_iesire);
			var masaClient = data[i].id_masa;
			oraIesireClient = oraIesireClient.getHours();
			if (hour>=oraIntrareClient  && hour <=oraIesireClient && ziuaIntrareClient==selectedDate)
			{
				$('.tables #'+masaClient).addClass('active');
				//$('.tables #'+masaClient).append('Comanda:'+data[i].produse_comandate);
				//$('.tables #'+masaClient).append('Comanda:'+data[i].total);
			}
			i++;
		}
	}
</script>