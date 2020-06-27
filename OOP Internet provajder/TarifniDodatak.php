<?php


class TarifniDodatak
{
    public $cena;
    public $tipDodatka;


    public function __construct(int $cena, string $tipDodatka)
    {
        if ($tipDodatka != "Facebook" AND $tipDodatka != "Instagram" AND $tipDodatka != "Twitter" AND $tipDodatka != "Viber" AND $tipDodatka != "IPTV" AND $tipDodatka != "Fiksna_Telefonija")
        {
            echo "<span style='color: red'><h3>Tip dodatka nije ispravan</h3></span><br>";
            return;
        }

        $this->cena=$cena;
        $this->tipDodatka=$tipDodatka;

    }

    public function getTipDodatka()
    {
        return $this->tipDodatka;
    }


    public function getCena()
    {
        return $this->cena;
    }






}