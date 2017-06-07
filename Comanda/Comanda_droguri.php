<?php namespace App\comanda;
use App\Model\Comenzi;
// ce pui la namespace??
// namespace functioneaza doar cu class
// sa verif. daca exista in stoc si sa o atribui
class Comanda_droguri {
    public function functionDroguri() {
        http_response_code(403);
        echo "403 - Forbidden";
    }
}