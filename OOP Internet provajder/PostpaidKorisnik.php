<?php

require_once 'Korisnik.php';
require_once 'InternetProvajder.php';
require_once 'TarifniPaket.php';
require_once 'TarifniDodatak.php';
require_once 'ListingUnos.php';


class PostpaidKorisnik extends Korisnik
{
    protected $prekoracenje;

        public function __construct(InternetProvajder $InternetProvajder, string $ime, string $prezime, string $adresa,
                                string $brojUgovora, TarifniPaket $TarifniPaket,TarifniDodatak $tarifniDodatak, int $prekoracenje)
    {
        parent::__construct($InternetProvajder, $ime, $prezime, $adresa, $brojUgovora, $TarifniPaket, $tarifniDodatak);

        if($this->prekoracenje > 0)
        {
            $this->prekoracenje = 0;
        }
        $this->prekoracenje = $prekoracenje;
    }

    public function ukupnoZaNaplatu()
    {
        $cenaPaketa = 0 + $this->prekoracenje;
        foreach ($this->korisnikoviDodaci as $cene)
        {
            $temp = $cene->cena;
            $cenaPaketa += $temp;
        }
        echo "<br>Tvoj ukupan iznos za naplatu je {$cenaPaketa}<br> ";
    }

   public function surfuj(String $url,int $megabajti) : bool
   {
       if ($this->tarifniPaket->getNeogranicenSaobracaj() == true) {

//           $this->InternetProvajder->zabeleziSaobracaj($this, $url, $megabajti);
           $unos = new ListingUnos($url, $megabajti);
           $this->dodalListingUnos($unos);
           echo "Imas neogranicen saobracaj<br>";
           return true;
       }
       if (strpos($url, $this->tarifniDodatak->tipDodatka) > -1) {
//           $this->InternetProvajder->zabeleziSaobracaj($this, $url, $megabajti);
           $unos = new ListingUnos($url, $megabajti);
           $this->dodalListingUnos($unos);
           echo "Imas dodatak za besplatan surf na ovom url:{$url}<br>";
           return true;
       }
       if ($this->tarifniPaket->getMegabajtil() >= $megabajti) {

           $mb = $this->tarifniPaket->getMegabajtil() - $megabajti;
           echo "Megabajti u paketu su ti umanjeni za broj iskoriscenih megabajta sada imas 
                {$mb} MB<br>";

       }
       else
           {
           $pocetnoPrekoracenje = $this->prekoracenje;
           $oduzimanjemb = $this->tarifniPaket->getMegabajtil() - $megabajti;
           $mbudin = $oduzimanjemb  * $this->tarifniPaket->getCenaPoMegabajtu() - $pocetnoPrekoracenje;
           $this->prekoracenje = $mbudin;
           echo "Doslo je do pekoracenja MB, prekoracenje iznosi {$this->prekoracenje} dinara <br>";
       }

       $unos = new ListingUnos($url, $megabajti);
       $this->dodalListingUnos($unos);
       return true;
       }

    public function generisiRacun()
    {
        echo "Broj ugovora je  $this->brojUgovora  ime  $this->ime  prezime $this->prezime";
        foreach ($this->korisnikoviDodaci as $item) {
            echo "<br>Ime dodatka: {$item->tipDodatka} " . "Cena dodatka: {$item->cena}";

        }
        echo "Iznos prekoracenja: {$this->prekoracenje},<br>  {$this->ukupnoZaNaplatu()}<br>";
    }
    public function dodajTarifniDodatak(TarifniDodatak $tarifniDodatak)
    {
        if ($this->tarifniPaket->getNeogranicenSaobracaj() == true
            && $tarifniDodatak->tipDodatka == 'IPTV' || $tarifniDodatak->tipDodatka == 'FIKSNA_TELEFONIJA')
        {
            array_push($this->korisnikoviDodaci, $tarifniDodatak);
          echo "Tarifni dodatak je uspesno dodatj u listu tarifnih dodataka<br>";
          return;
        }
        elseif($this->tarifniPaket->getNeogranicenSaobracaj() == false)
        {
            array_push($this->korisnikoviDodaci, $tarifniDodatak);
            echo "Tarifni dodatak je uspesno dodatj u listu tarifnih dodataka<br>";
            return;
        }
        echo "Tip dodatka mora biti IPTV ili Fiksna telefonija. <br>";

    }
}