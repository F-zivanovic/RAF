<?php


$host = "localhost";
$user = "root";
$pass = "";
$bazapodataka = "masine";

$konekcija = new PDO("mysql:host=$host; dbname=$bazapodataka", $user, $pass);

$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//var_dump($konekcija);