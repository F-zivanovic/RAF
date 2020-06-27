<?php


class TarifniPaket
{
    protected $maxBrzina;
    protected $cenaPaketa;
    protected $neogranicenSaobracaj;
    protected $megabajtil;
    protected $cenaPoMegabajtu;


    public function __construct(int $maxBrzina,int $cenaPaketa, bool $neogranicenSaobracaj,int $megabajtil,int $cenaPoMegabajtu)
    {
        $this->maxBrzina = $maxBrzina;
        $this->cenaPaketa = $cenaPaketa;
        $this->neogranicenSaobracaj = $neogranicenSaobracaj;
        $this->megabajtil = $megabajtil;
        $this->cenaPoMegabajtu = $cenaPoMegabajtu;
    }

    public function getCenaPaketa()
    {
        return $this->cenaPaketa;
    }

    public function getNeogranicenSaobracaj()
    {
        return $this->neogranicenSaobracaj;
    }

    public function getMegabajtil()
    {
        return $this->megabajtil;
    }

    public function getCenaPoMegabajtu()
    {
        return $this->cenaPoMegabajtu;
    }

    public function getMaxBrzina(): int
    {
        return $this->maxBrzina;
    }







}