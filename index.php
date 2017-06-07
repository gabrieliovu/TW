<?php

// also <?php nu se inchide

ini_set('error_reporting', -1);
ini_set('display_errors', true);

include 'autoload.php';
include 'config.php';

// define routes
$routes = [
    '/index' => 'IndexController@index',
    '/intrare'=>'IndexController@intrare',
    '/afiseaza' => 'IndexController@afiseaza',
    '/meniu'=>'IndexController@meniu',
    '/comanda/suc'=>'IndexController@comanda_suc',
    '/comanda/cafea'=>'IndexController@comanda_cafea',
    '/comanda/apa'=>'IndexController@comanda_apa',
    '/comanda/gogosi'=>'IndexController@comanda_gogosi',
    '/comanda/teme'=>'IndexController@comanda_teme',
    '/comanda/zacusca'=>'IndexController@comanda_zacusca',
    '/comanda/alcool' =>'IndexController@comanda_alcool',
    '/comanda/droguri' =>'IndexController@comanda_droguri',
    '/nota'=>'IndexController@nota',
    '/iesire'=>'IndexController@iesire'
];

// set default action and page not found action
$defaultAction = 'IndexController@index';
$pageNotFoundAction = 'IndexController@pageNotFound';

// start app via front controller pattern
include 'bootstrap.php';
