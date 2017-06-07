<?php namespace App\comanda;

use App\Model\Comenzi;


class Comanda_suc {
    public function functionSuc() {
     
        $host = "localhost";
        $pass = "";
        $dberror="damn";
        $user="root";


        $conn=mysqli_connect($host, $user, $pass,'clienti') or die($dberror);
        


        $query= "select cantitate from produse where denumire='suc'";
        $result = mysqli_query ($conn, $query) or exit();
        $row = mysqli_fetch_assoc($result);

       if($row["cantitate"]!=0) {
        echo "produs disponibil";
        Comenzi::comanda('suc');
        $query1="update produse set cantitate=cantitate-1 where denumire='suc'";
        $result = mysqli_query ($conn, $query1) or exit();

       } else {

            echo "Produsul nu este in stoc";
       }
    }
}