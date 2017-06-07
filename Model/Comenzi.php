<?php namespace App\Model;

class Comenzi {
    public static function comanda($comanda) {
        $userData = json_decode($_COOKIE['userCookieData'], true);
        $userData['comenzi'][$comanda]++;
        setcookie('userCookieData', json_encode($userData), 0, '/', null);
    }
    public static function getAll() {
        $userData = json_decode($_COOKIE['userCookieData'], true);
        return $userData['comenzi'];
    }
}
