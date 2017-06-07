<?php namespace App\comanda;
use App\Model\Comenzi;
// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Comanda_zacusca {
    public function functionZacusca() {
        $host = "localhost";
        $pass = "";
        $dberror="damn";
        $user="root";


        $conn=mysqli_connect($host, $user, $pass,'clienti') or die($dberror);

        $query= "select cantitate from produse where denumire='zacusca'";
        $result = mysqli_query ($conn, $query) or exit();
        $row = mysqli_fetch_assoc($result);

        if($row["cantitate"]!=0) {
        echo "Produs disponibil";
        Comenzi::comanda('zacusca');
        $query1="update produse set cantitate=cantitate-1 where denumire='zacusca'";
        $result = mysqli_query ($conn, $query1) or exit();

       } else {

            echo "Produsul nu este in stoc";
       }

    }
}