<?php namespace App\comanda;

// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Afiseaza {
    public function functionAfiseaza() {


include_once('front.php');
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
   //echo '    <br>';
  //echo $_SERVER['HTTP_REFERER'];}

  $resultsArray = [];
  while ($row=$result->fetch_assoc())
  {
      array_push($resultsArray,$row);
  }
  echo '<script>data = '.json_encode($resultsArray).';</script>';


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
    }
}