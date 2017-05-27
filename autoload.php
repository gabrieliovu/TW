<?php

// here we register our namepsace inclusion procedure
// our app namespace will begin with "App". this way we
// will avoid namespace collusion
function appAutoload($class) {
    //$class === use App\BaseController (exemplu)
    // \\ aici treia sa fie App\  daasr t\ e char special si il comentam ca sa il folosim in string
    // spune-  a, oki
    if (substr($class, 0, 4) === 'App\\') {
        $class = substr($class, 4, strlen($class) - 1);
        // ne-a ramas BaseController
        // tre sa includem 'BaseController.php'

        // aici intra namespace-ul
        // App\ se sterge.
        // ar ramane Model\ModelOne
        // rezulta: include_once 'Model\ModelOne.php'
        // cand dai use se duce fix aici cu ce scrii
        // use App\Model\ModelOne - asta intra la parametru $class
        // acum ai inteles?\Model ce e?
        // App\Model e namespace
        // ModelOne e clasa. cuvnatul dupa ultimu slash e clasa. restu e namespace-ul
        // Intelegi?
        // Si in functie de namespace, tu faci o regula aici sa incluzi fisieru oki
        // e simplu, nu e nimic complicat, doar iti intra namespace la parametru si spui tu ce se intampla
        // in cazul nostru includem fisierul din namespace, pt ca stabilim ca regula ca namespaace-ul se va
        // potrivii cu path-ul fisierelor dupa ce eliminam App\ din ecuatie.
        // daca schimbi numele la model nu mai merge

        // acum o sa mai facem o chestie
        // tu dai aici include Model\ModelOne.php
        // doar ca asta merge doar pe windows
        // trebe Model/ModelOne.php sa mearga pe toate OS
        // asa ca o sa inlocuim \ cu /

        $class = str_replace('\\', '/', $class);
        // nu s-a produs nicio schimbare doar ca acum ar merge si daca ai tine
        // site-ul pe linux, asa cum se tin toate
        include_once $class . '.php';

        // acum eliminam App\ din namespace pt ca asta a fost adaugat doar sa nu aiba conflict cu alte namespace-uri de la
        // third party libraries pe care le-ai putea folosi.
        // intelegi?

        //not really nu era //?

        // pai tu dai ce nume vrei la namespace
        // ReallyNiceApp/controllers/models/etc
        // si scrie un baiat o clasa pe care vrei s-o folosesti in aplicatia ta
        // si el se gandeste tot la numele asta
        // ReallyNiceApp/altceva
        // aici o sa incarce gresit fisierele. un fisiser undeva o sa se strice
        // acum intelkegi? da, dar lasa comentariile astea
        // pai am lasat gen si ce vorbim acum
        // ok :)) ramane asta
    }
}
// just type the name of the autoload function to register it
spl_autoload_register('appAutoload');
