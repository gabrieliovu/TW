<?php namespace App\Controller;

use App\BaseController;
use App\Model\ModelOne;
use App\Model\ModelTwo;
use App\comanda\Comanda_suc;
use App\comanda\Comanda_cafea;
use App\comanda\Comanda_apa;
use App\comanda\Comanda_gogosi;
use App\comanda\Comanda_teme;
use App\comanda\Comanda_zacusca;
use App\comanda\Comanda_nota;
use App\comanda\Comanda_iesire;
use App\comanda\Comanda_alcool;
use App\comanda\Comanda_droguri;
use App\comanda\Meniu;
use App\comanda\Afiseaza;
use App\comanda\Intrare;


class IndexController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->setLayout('views/layout.php', [
			'title' => 'Website Title'
		]);
	}
	public function index() {
        $modelTwo = new ModelTwo;
        $modelTwo->functionTwo();
		$this->respond('views/home.php', [
			'pageName' => 'Home'
		]);
	}

        public function intrare() {
        $intrare = new Intrare;
        $intrare->functionIntrare();
       
    }

    public function afiseaza() {
        $afis = new Afiseaza;
        $afis->functionAfiseaza();
        
    }

	public function meniu() {
        $meniu1=new Meniu;
        $meniu1->functionMeniu();

	}

    public function comanda_suc() {
        $comanda_suc=new Comanda_suc;
        $comanda_suc->functionSuc();
        
    }

    public function comanda_apa() {
        $comanda_apa=new Comanda_apa;
        $comanda_apa->functionApa();
        
    }

    public function comanda_cafea() {
        $comanda_cafea=new Comanda_cafea;
        $comanda_cafea->functionCafea();
    }


    public function comanda_teme() {
        $comanda_teme=new Comanda_teme;
        $comanda_teme->functionTeme();
    }


    public function comanda_gogosi() {
        $comanda_gogosi=new Comanda_gogosi;
        $comanda_gogosi->functionGogosi();
    }


    public function comanda_zacusca() {
        $comanda_zacusca=new Comanda_zacusca;
        $comanda_zacusca->functionZacusca();
    }

    public function comanda_alcool() {
        $comanda_alcool=new Comanda_alcool;
        $comanda_alcool->functionAlcool();
    }

    public function comanda_droguri() {
        $comanda_droguri=new Comanda_droguri;
        $comanda_droguri->functionDroguri();
    }


    public function nota() {
        $comanda_nota=new Comanda_nota;
        $comanda_nota->functionNota();
        $this->respond('views/contact.php', [
            'pageName' => 'Nota'
        ]);

    }


    public function iesire() {
        $comanda_iesire=new Comanda_iesire;
        $comanda_iesire->functionIesire();
    }









	public function pageNotFound() {
		$this->respond('views/page-not-found.php');
	}
}

