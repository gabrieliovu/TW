<?php namespace App\comanda;

// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Intrare {
    public function functionIntrare() {
        
        $host = "localhost";
        $pass = "";
        $dberror="damn";
        $user="root";
        error_reporting(0);

        $conn=mysqli_connect($host, $user, $pass,'clienti') or die($dberror);
        
        $var=1;
        while($var<9) {
        $query= "select id_masa as MASA from clienti where (select max(data_iesire) from clienti where id_masa=".$var.") < sysdate() and id_masa=".$var." LIMIT 1 " ;
       
        $result = mysqli_query ($conn, $query) or exit();
        

        $masa=$result->fetch_object()->MASA;
        if(is_null($masa))
            $var++;
        else
            break;

        }


         if(is_null($masa))
            echo "Nu mai sunt mese disponibile";
         else
            { 
            $query1= "insert into clienti(data_intrare, data_iesire, id_masa) values(sysdate(), sysdate()+600,".$masa.")" ;
       
            $result = mysqli_query ($conn, $query1) or exit();
        }


    }
}