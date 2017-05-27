<?php namespace App\Controller;
// acum face si la controller namespace

// use namespace\class
use App\BaseController;
use App\Model\ModelOne;
// ctrl+shift+d duplica randul
use App\Model\ModelTwo;
use App\comanda\Comanda_suc;
use App\comanda\Comanda_cafea;
use App\comanda\Comanda_apa;
use App\comanda\Comanda_gogosi;
use App\comanda\Comanda_teme;
use App\comanda\Comanda_zacusca;
use App\comanda\Comanda_nota;
use App\comanda\Comanda_iesire;
use App\comanda\Meniu;
use App\comanda\Afiseaza;
use App\comanda\Intrare;

// so no more inclusion, but registered namespace autoloaders ;D
// ai inteles?
// - raspyunudep cu da sau da  Y:UP)))
// ok

// noob way
// include_once 'BaseController.php';

// asta va fi App\Controller\IndexController;
// acum o sa dea eroare la index
class IndexController extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->setLayout('views/layout.html', [
			'title' => 'Website Title'
		]);
	}
	public function index() {
        $modelTwo = new ModelTwo;
        $modelTwo->functionTwo();
		$this->respond('views/home.html', [
			'pageName' => 'AAAA'
		]);
	}

        public function intrare() {
        $intrare = new Intrare;
        $intrare->functionIntrare();
        $this->respond('views/home.html', [
            'pageName' => 'AAAA'
        ]);
    }

    public function afiseaza() {
        $afis = new Afiseaza;
        $afis->functionAfiseaza();
        $this->respond('views/afisare.html', [
            'pageName' => 'AAAA'
        ]);
    }


	public function meniu() {
        $meniu1=new Meniu;
        $meniu1->functionMeniu();
		$this->respond('views/contact.html', [
			'name' => 'Ghost Busters'
		]);
	}

        public function comanda_suc() {
        $comanda_suc=new Comanda_suc;
        $comanda_suc->functionSuc();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }

           public function comanda_apa() {
        $comanda_apa=new Comanda_apa;
        $comanda_apa->functionApa();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }

             public function comanda_cafea() {
        $comanda_cafea=new Comanda_cafea;
        $comanda_cafea->functionCafea();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }


             public function comanda_teme() {
        $comanda_teme=new Comanda_teme;
        $comanda_teme->functionTeme();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }


             public function comanda_gogosi() {
        $comanda_gogosi=new Comanda_gogosi;
        $comanda_gogosi->functionGogosi();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }


             public function comanda_zacusca() {
        $comanda_zacusca=new Comanda_zacusca;
        $comanda_zacusca->functionZacusca();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }


             public function nota() {
        $comanda_nota=new Comanda_nota;
        $comanda_nota->functionNota();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }


             public function iesire() {
        $comanda_iesire=new Comanda_iesire;
        $comanda_iesire->functionIesire();
        $this->respond('views/contact.html', [
            'name' => 'Ghost Busters'
        ]);
    }









	public function pageNotFound() {
		$this->respond('views/page-not-found.html');
	}
}

// sql autonom register
//fct procedurala si metoda a unei clase