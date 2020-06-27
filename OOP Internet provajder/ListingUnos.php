<?php


class ListingUnos
{

    protected $url;
    protected $megabajti;

    public function __construct(string $url, int $megabajti)
    {
        $this->url = $url;
        $this->megabajti = $megabajti;
    }


    public function dodajMegabajte(int $mb)
    {
        $this->megabajti = $mb;

    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMegabajti()
    {
        return $this->megabajti;
    }



}