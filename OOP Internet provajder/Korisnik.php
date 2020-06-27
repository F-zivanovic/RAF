<?php

include('IzradaListinga.php');

abstract class Korisnik implements IzradaListinga
{
    protected $InternetProvajder;
    protected $ime;
    protected $prezime;
    protected $adresa;
    protected $brojUgovora;
    public $tarifniPaket;
    public $tarifniDodatak;
    public $korisnikoviDodaci = [];
    public $listingUnos = [];



    public function __construct(InternetProvajder $InternetProvajder, string $ime, string $prezime, string $adresa, string $brojUgovora, TarifniPaket $tarifniPaket, TarifniDodatak $tipDodatka)
    {
        $this->InternetProvajder = $InternetProvajder;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->adresa = $adresa;
        $this->brojUgovora = $brojUgovora;
        $this->tarifniPaket = $tarifniPaket;
        $this->tarifniDodatak = $tipDodatka;
//        $this->prekoracenje = $prekoracenje;
    }


    public function dodalListingUnos(ListingUnos $listingUnos)
    {
        foreach ($this->listingUnos as $listing)
        {
            if ($listing->getUrl() == $listingUnos->getUrl())
            {
                $listingUnos->dodajMegabajte($listingUnos->getMegabajti());
                echo "Url vec postoji u listi, dodali smo mu samo {$listingUnos->getMegabajti()} mb
                i sada ima MB:<br>";
                return;
            }
        }
        array_push($this->listingUnos, $listingUnos);
        echo "Listing unos je uspesno dodat u listu<br>";

    }


    public function napraviListing() :String
    {

    }


   public abstract function surfuj(string $url, int $magabajti ) :bool;

    public abstract function dodajTarifniDodatak(TarifniDodatak $tarifniDodatak);

    public function getInternetProvajder(): InternetProvajder
    {
        return $this->InternetProvajder;
    }

    public function getBrojUgovora()
    {
        return $this->brojUgovora;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function getPrezime()
    {
        return $this->prezime;
    }


    public function getTarifniPaket(): TarifniPaket
    {
        return $this->tarifniPaket;
    }








}