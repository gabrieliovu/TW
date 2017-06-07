<?php namespace App\comanda;

// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Meniu {
    public function functionMeniu() {
        $host = "localhost";
        $pass = "";
        $dberror="damn";
        $user="root";

        $conn=mysqli_connect($host, $user, $pass,'clienti') or die ($dberror);
        

        $query= "select denumire,pret from produse";
       
        $result = mysqli_query ($conn, $query) or exit();
        echo "Meniul este:<br>";
        while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s:pret-%s<br>", $row["denumire"], $row["pret"]);}
    }
}