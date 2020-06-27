<?php

require_once 'Korisnik.php';
require_once 'PostpaidKorisnik.php';
require_once 'PrepaidKorisnik.php';
require_once 'TarifniDodatak.php';
require_once 'TarifniPaket.php';

class InternetProvajder
{
    protected $ime;
    protected $listaKorisnika = [];
    protected $saobracaj = [];

    public function __construct(string $ime)
    {
        $this->ime = $ime;
    }

    public function generisiRacune()
    {
        foreach ($this->listaKorisnika as $postKorisnici)
        {
            if ($postKorisnici instanceof PostpaidKorisnik)
            {
                $postKorisnici->generisiRacun();
            }
        }
    }

    public function zabeleziSaobracaj(Korisnik $korisnik, string $url, int $mb)
    {
        $sesija = "Broj ugovora je {$korisnik->getBrojUgovora()}, url je {$url}, i broj potrosenih MB
         je {$mb}.<br>";
        array_push($this->saobracaj, $sesija);

        foreach ($this->saobracaj as $beleziSaobracaj)
        {
            echo $beleziSaobracaj;
        }
    }

    public function prikazPrepaidKorisnika()
    {
        echo "Lista prepaid korisnika:<br>";

        foreach ($this->listaKorisnika as $preKorisnici)
        {

            if ($preKorisnici instanceof PrepaidKorisnik)
            {
                echo "Broj ugovora je {$preKorisnici->getBrojUgovora()}, ime je {$preKorisnici->getIme()},
                prezime je {$preKorisnici->getPrezime()}, stanje kredita je {$preKorisnici->getKredit()}, 
                tarifni dodatka je {$preKorisnici->tarifniDodatak->getTipDodatka()} i njegova cena je {$preKorisnici->tarifniDodatak->getCena()} <br>";
            }
        }
    }

    public function prikazPostpaidKorisnika()
    {
        echo "Lista postpaid korisnika:<br>";

        foreach ($this->listaKorisnika as $postKorisnici)
        {
            if ($postKorisnici instanceof PostpaidKorisnik)
            {
                echo "Broj ugovora je {$postKorisnici->getBrojUgovora()}, ime je {$postKorisnici->getIme()},
                prezime je {$postKorisnici->getPrezime()},tarifni dodatak je {$postKorisnici->tarifniDodatak->getTipDodatka()} 
                a njegova cena je {$postKorisnici->tarifniDodatak->getCena()},  tarifni paket je:<br>
                max brzina {$postKorisnici->tarifniPaket->getMaxBrzina()}<br>
                cena paketa:{$postKorisnici->tarifniPaket->getCenaPaketa()}<br>
                neogranicen saobracaj:{$postKorisnici->tarifniPaket->getNeogranicenSaobracaj()}<br>
                megabajti{$postKorisnici->tarifniPaket->getMegabajtil()}<br>
                cena po megabajtu {$postKorisnici->tarifniPaket->getCenaPoMegabajtu()}<br><br>";
            }

        }

    }
    public function dodajKorisnika(Korisnik $korisnik)
    {
            foreach ($this->listaKorisnika as $korisnici)
            {
                if ($korisnik->getBrojUgovora() == $korisnici->getBrojUgovora())
                {
                    echo "Korisnik sa ovim ugovorom {$korisnik->getBrojUgovora()} vec postoji<br>";
                    return;
                }
            }
            array_push($this->listaKorisnika, $korisnik);
           echo "Korisnik  je dodat u listu korisnika uspesno<br>";
    }

}