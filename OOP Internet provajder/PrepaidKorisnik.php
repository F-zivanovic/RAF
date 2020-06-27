<?php

require_once 'Korisnik.php';
require_once 'InternetProvajder.php';
require_once 'TarifniDodatak.php';
require_once 'TarifniPaket.php';

 class PrepaidKorisnik extends Korisnik
{
    protected $kredit;

   public function __construct(InternetProvajder $InternetProvajder, string $ime, string $prezime, string $adresa,
                               string $brojUgovora, TarifniPaket $TarifniPaket,TarifniDodatak $tarifniDodatak, float $kredit)
   {
       parent::__construct($InternetProvajder, $ime, $prezime, $adresa, $brojUgovora, $TarifniPaket, $tarifniDodatak);
       $this->kredit = $kredit;
   }

    public function dopuniKredit(float $kredit)
    {
       $this->kredit += $kredit;
       echo "<br>Tvoj kredit je sada{$this->kredit}";

    }

     public function  surfuj(String $url,int $magabajti) : bool
     {
             if (strpos($url, $this->tarifniDodatak->tipDodatka) > -1)
             {
//                 $this->InternetProvajder->zabeleziSaobracaj($this, $url, $magabajti);
                 $unos= new ListingUnos($url, $magabajti);
                 $this->dodalListingUnos($unos);
                 echo "Imas besplatan surf na ovom url: {$url}<br>";
                 return true;
             }

         $potrosenKredit = $magabajti * $this->tarifniPaket->getCenaPoMegabajtu();
             echo "<br>Nemas dodatak za bepslatan surf<br>";

         if ($this->kredit >= $potrosenKredit)
         {
            $kreda =  $this->kredit - $potrosenKredit;
             echo "Tvoj kredit je sada {$kreda}<br> ";
//             $this->InternetProvajder->zabeleziSaobracaj($this, $url, $magabajti);
             $unos = new ListingUnos($url, $magabajti);
             $this->dodalListingUnos($unos);
//             echo "Tvoj kredit je sada {$kreda}<br> ";
             $this->kredit = $kreda;
             return true;
         }
         else{
             echo "Nemas dovoljno kredita<br>";
             return false;
         }

     }


     public function dodajTarifniDodatak(TarifniDodatak $tarifniDodatak)
     {
         if ($tarifniDodatak->tipDodatka != "IPTV" AND $tarifniDodatak->tipDodatka != "FIKSNA_TELEFONIJA" AND $this->kredit >= $tarifniDodatak->getCena())
         {
            $kreda = $this->kredit - $tarifniDodatak->getCena();
             array_push($this->korisnikoviDodaci, $tarifniDodatak);
             echo "Tarifni dodatak je dodat u listu tarifnih dodataka, tvoj kredit je sada {$kreda}";
             $this->kredit = $kreda;
         }
         else{
             echo "<span style='color: red'><h3>Tip dodatka ne sme biti IPTV ni Fiksna TLEFONIJA ili nemate dovoljno kredita</h3></span><BR>";
         }


     }


     public function getKredit(): float
     {
         return $this->kredit;
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

     public function getTarifniDodatak(): TarifniDodatak
     {
         return $this->tarifniDodatak;
     }



 }